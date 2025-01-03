<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishes;
use App\Models\DishType;
use App\Models\Order;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Fetch total visitors
        $total_visitors = Visitor::count();

        // Fetch total dish types
        $total_dish_types = DishType::count();

        // Fetch total dishes
        $total_dishes = Dishes::count();

        // Fetch total orders
        $total_orders = Order::count();

        $online_users = User::where('last_active_at', '>=', now()->subMinutes(30))->count();

        // Fetch monthly orders for the last 12 months
        $monthly_sales = Order::where('status', 'completed')
            ->whereDate('created_at', '>=', now()->subMonths(12))
            ->selectRaw('COUNT(id) as total_orders, MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Fetch daily new visitors for the last 7 days
        $daily_visitors = Visitor::whereDate('created_at', '>=', now()->subDays(7))
            ->selectRaw('COUNT(DISTINCT ip_address) as total_visitors, DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Fetch daily active users for the last 7 days
        $daily_active_users = User::whereDate('last_active_at', '>=', now()->subDays(7))
            ->selectRaw('COUNT(id) as active_users, DATE(last_active_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Ensure we have data for all 12 months
        $months = collect(range(1, 12))->map(fn($month) => [
            'month' => $month,
            'year' => now()->year,
            'total_orders' => $monthly_sales->where('month', $month)->pluck('total_orders')->first() ?? 0,
        ]);


        // Fetch monthly sales for the last 12 months
        $monthly_sales2 = Order::where('status', 'completed')
            ->whereDate('created_at', '>=', now()->subMonths(12))
            ->selectRaw('SUM(total_amount) as total_sales, MONTH(created_at) as month, YEAR(created_at) as year')
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Ensure we have data for all 12 months
        $months2 = collect(range(1, 12))->map(fn($month) => [
            'month' => $month,
            'year' => now()->year,
            'total_sales' => $monthly_sales2->where('month', $month)->pluck('total_sales')->first() ?? 0,
        ]);

        $latest_customers = User::latest()->take(5)->get();


        return view('admin.dashboard', compact(
            'total_visitors',
            'total_dish_types',
            'total_dishes',
            'total_orders',
            'online_users',
            'months', // Monthly orders
            'daily_visitors', // Daily visitors
            'daily_active_users',// Daily active users
            'months2', // Monthly visits
            'latest_customers', // Latest customers
        ));
    }



    public function razorpay_transactions()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $transactions = $api->payment->all(['count' => 100]);

            $simplifiedTransactions = collect($transactions->items)
                ->map(function ($transaction) {
                    $transaction->simplified_status = match ($transaction->status) {
                        'captured' => 'Paid',
                        'authorized' => 'Unpaid',
                        'failed' => 'Failure',
                        default => 'Unknown',
                    };

                    $transaction->customer_email = $transaction->email ?? 'Unknown';
                    $transaction->customer_phone = $transaction->contact ?? 'Unknown';

                    // Convert created_at to Asia/Kolkata timezone
                    $transaction->formatted_created_at = \Carbon\Carbon::createFromTimestamp($transaction->created_at, 'UTC')
                        ->setTimezone(config('app.timezone')) // Convert to application's timezone
                        ->format('D M d, h:i A'); // e.g., Sat Dec 21, 12:29 PM
    
                    return $transaction;
                })
                ->sortByDesc('created_at')
                ->values();

            return view('admin.razorpay_transactions', [
                'transactions' => $simplifiedTransactions,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Error fetching transactions: ' . $e->getMessage());
        }
    }

    public function showNotifications()
    {
        $admin = Auth::guard('admin')->user();

        // Mark all unread notifications as read
        $admin->unreadNotifications->markAsRead();

        $notifications = $admin->notifications; // Fetch all notifications

        return view('admin.notifications', compact('notifications'));
    }





}
