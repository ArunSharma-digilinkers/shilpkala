<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::count())
                ->icon('heroicon-o-shopping-cart')
                ->color('primary'),
            Stat::make('Revenue', '₹' . number_format(Order::where('payment_status', 'paid')->sum('grand_total')))
                ->icon('heroicon-o-currency-rupee')
                ->color('success'),
            Stat::make('Products', Product::count())
                ->icon('heroicon-o-cube')
                ->color('info'),
            Stat::make('Customers', User::where('role', 'customer')->count())
                ->icon('heroicon-o-users')
                ->color('warning'),
        ];
    }
}
