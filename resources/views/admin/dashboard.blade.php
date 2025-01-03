@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

<style>
    .strike-through {
        text-decoration: line-through;
        opacity: 0.6;
    }
</style>


<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>

            </div>
            <!-- <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
            </div> -->
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Visitors</p>
                                    <h4 class="card-title">{{$total_visitors}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-solid fa-list"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dsih Types</p>
                                    <h4 class="card-title">{{$total_dish_types}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30"
                                        fill="white"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32L8.6 224C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256l457.1 0c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28l-231.5 0c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dishes</p>
                                    <h4 class="card-title">{{$total_dishes}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30"
                                        fill="white"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z" />
                                        </s>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Orders</p>
                                    <h4 class="card-title">{{$total_orders}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-solid fa-globe"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Online Users</p>
                                    <h4 class="card-title">{{$online_users}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-label-info btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Monthly Sales</div>
                        </div>
                        <div class="card-category">Last 12 Months</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2">
                            <h1>₹ {{number_format($months2->sum('total_sales'), 2)}}</h1>
                        </div>
                        <div class="pull-in">
                            <canvas id="monthlySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card card-round">
                    <div class="card-body pb-0">
                        <div class="h1 fw-bold float-end text-primary">+5%</div>
                        <h2 class="mb-2">{{ $online_users }}</h2>
                        <p class="text-muted">Users online</p>
                        <div class="pull-in sparkline-fix">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">New Customers</div>
                        </div>
                        <div class="card-list py-4">
                            @foreach($latest_customers as $customer)
                                <div class="item-list">
                                    <div class="avatar">
                                        <!-- Displaying the user's profile image if it exists, otherwise a placeholder -->
                                        @if($customer->profile_image)
                                            <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="..."
                                                class="avatar-img rounded-circle" />
                                        @else
                                            <span class="avatar-title rounded-circle border border-white bg-primary">
                                                {{ strtoupper(substr($customer->full_name, 0, 1)) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="info-user ms-3">
                                        <div class="username">{{ $customer->full_name }}</div>
                                    </div>
                                    <button class="btn btn-icon btn-link op-8 me-1">
                                        <a href="mailto:{{ $customer->email }}">
                                            <i class="far fa-envelope"></i>
                                        </a>
                                    </button>

                                    <button class="btn btn-icon btn-link btn-danger op-8">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
    <div class="title">Settings</div>
    <div class="custom-content">
        <div class="switcher">
            <div class="switch-block">
                <h4>Logo Header</h4>
                <div class="btnSwitch">
                    <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                    <br />
                    <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                </div>
            </div>
            <div class="switch-block">
                <h4>Navbar Header</h4>
                <div class="btnSwitch">
                    <button type="button" class="changeTopBarColor" data-color="dark"></button>
                    <button type="button" class="changeTopBarColor" data-color="blue"></button>
                    <button type="button" class="changeTopBarColor" data-color="purple"></button>
                    <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                    <button type="button" class="changeTopBarColor" data-color="green"></button>
                    <button type="button" class="changeTopBarColor" data-color="orange"></button>
                    <button type="button" class="changeTopBarColor" data-color="red"></button>
                    <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                    <br />
                    <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                    <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                    <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                    <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                    <button type="button" class="changeTopBarColor" data-color="green2"></button>
                    <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                    <button type="button" class="changeTopBarColor" data-color="red2"></button>
                </div>
            </div>
            <div class="switch-block">
                <h4>Sidebar</h4>
                <div class="btnSwitch">
                    <button type="button" class="changeSideBarColor" data-color="white"></button>
                    <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                    <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-toggle">
        <i class="icon-settings"></i>
    </div>
</div>
<!-- End Custom template -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("statisticsChart").getContext("2d");

        var statisticsChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ],
                datasets: [
                    {
                        label: "Orders (Monthly)",
                        borderColor: "#f3545d",
                        pointBackgroundColor: "rgba(243, 84, 93, 0.6)",
                        pointRadius: 3,
                        backgroundColor: "rgba(243, 84, 93, 0.4)",
                        legendColor: "#f3545d",
                        fill: true,
                        borderWidth: 2,
                        data: @json($months->pluck('total_orders')),
                    },
                    {
                        label: "New Visitors (Daily)",
                        borderColor: "#fdaf4b",
                        pointBackgroundColor: "rgba(253, 175, 75, 0.6)",
                        pointRadius: 3,
                        backgroundColor: "rgba(253, 175, 75, 0.4)",
                        legendColor: "#fdaf4b",
                        fill: true,
                        borderWidth: 2,
                        data: @json($daily_visitors->pluck('total_visitors')),
                    },
                    {
                        label: "Active Users (Daily)",
                        borderColor: "#177dff",
                        pointBackgroundColor: "rgba(23, 125, 255, 0.6)",
                        pointRadius: 3,
                        backgroundColor: "rgba(23, 125, 255, 0.4)",
                        legendColor: "#177dff",
                        fill: true,
                        borderWidth: 2,
                        data: @json($daily_active_users->pluck('active_users')),
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: false },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                layout: { padding: { left: 5, right: 5, top: 15, bottom: 15 } },
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                fontStyle: "500",
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                padding: 10,
                            },
                            gridLines: { drawTicks: false, display: false },
                        },
                    ],
                    xAxes: [
                        {
                            gridLines: { zeroLineColor: "transparent" },
                            ticks: { padding: 10, fontStyle: "500" },
                        },
                    ],
                },
                legendCallback: function (chart) {
                    var text = [];
                    text.push('<ul class="' + chart.id + '-legend html-legend">');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push(
                            '<li class="legend-item" data-index="' +
                            i +
                            '"><span style="background-color:' +
                            chart.data.datasets[i].legendColor +
                            '"></span>' +
                            chart.data.datasets[i].label +
                            "</li>"
                        );
                    }
                    text.push("</ul>");
                    return text.join("");
                },
            },
        });

        // Add the custom legend
        var myLegendContainer = document.getElementById("myChartLegend");
        myLegendContainer.innerHTML = statisticsChart.generateLegend();

        // Add click event listener to legend items
        var legendItems = myLegendContainer.querySelectorAll(".legend-item");
        legendItems.forEach(function (item) {
            item.addEventListener("click", function () {
                var datasetIndex = this.dataset.index;
                var meta = statisticsChart.getDatasetMeta(datasetIndex);

                // Toggle visibility of datasets
                meta.hidden = meta.hidden === null ? true : null;

                // Hide all others if visible
                statisticsChart.data.datasets.forEach((dataset, index) => {
                    if (index != datasetIndex) {
                        statisticsChart.getDatasetMeta(index).hidden = true;
                        legendItems[index].classList.add("strike-through");
                    } else {
                        legendItems[index].classList.remove("strike-through");
                    }
                });

                // Update the chart
                statisticsChart.update();
            });
        });
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var monthlySalesChart = document
            .getElementById("monthlySalesChart")
            .getContext("2d");

        var myMonthlySalesChart = new Chart(monthlySalesChart, {
            type: "line",
            data: {
                labels: [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ],
                datasets: [
                    {
                        label: "Monthly Sales",
                        fill: true,
                        backgroundColor: "rgba(255,255,255,0.2)",
                        borderColor: "#fff",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 1,
                        pointRadius: 1,
                        pointHitRadius: 5,
                        data: @json($months2->pluck('total_sales')),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                legend: { display: false },
                animation: { easing: "easeInOutBack" },
                scales: {
                    yAxes: [
                        {
                            display: false,
                            ticks: {
                                fontColor: "rgba(0,0,0,0.5)",
                                fontStyle: "bold",
                                beginAtZero: true,
                                maxTicksLimit: 10,
                                padding: 0,
                            },
                            gridLines: { drawTicks: false, display: false },
                        },
                    ],
                    xAxes: [
                        {
                            display: false,
                            gridLines: { zeroLineColor: "transparent" },
                            ticks: {
                                padding: -20,
                                fontColor: "rgba(255,255,255,0.2)",
                                fontStyle: "bold",
                            },
                        },
                    ],
                },
            },
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Here, we assume you pass the array of the last 7 days or months of active users
        // Example: Online users for the past 7 days
        var onlineUsersData = @json($daily_active_users->pluck('active_users'));

        // Using Sparkline to show the data dynamically
        $("#lineChart").sparkline(onlineUsersData, {
            type: "bar",
            height: "100",
            barWidth: 9,
            barSpacing: 10,
            barColor: "rgba(255,255,255,.3)",
        });
    });

</script>






@endsection