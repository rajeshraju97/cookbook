<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OrderPlacedNotification extends Notification
{
    use Queueable;

    private $orderDetails;

    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails; // Save order details for later use
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Only database channel
    }



    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->orderDetails['user_id'],
            'order_ids' => $this->orderDetails['order_ids'],
            'payment_method' => $this->orderDetails['payment_method'],
            'total_amount' => $this->orderDetails['total_amount'],
            'address' => $this->orderDetails['selected_address'],
            'status' => $this->orderDetails['status'],
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
