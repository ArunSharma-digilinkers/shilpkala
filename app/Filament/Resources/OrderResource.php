<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\SelectFilter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static string | \UnitEnum | null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('order_number')
                                ->disabled()
                                ->dehydrated(false),
                            Select::make('status')
                                ->options([
                                    'pending' => 'Pending',
                                    'processing' => 'Processing',
                                    'shipped' => 'Shipped',
                                    'delivered' => 'Delivered',
                                    'cancelled' => 'Cancelled',
                                ])
                                ->required(),
                            Select::make('payment_status')
                                ->options([
                                    'pending' => 'Pending',
                                    'paid' => 'Paid',
                                    'failed' => 'Failed',
                                    'refunded' => 'Refunded',
                                ])
                                ->required(),
                        ]),
                    ]),
                Section::make('Order Totals')
                    ->schema([
                        Grid::make(4)->schema([
                            TextInput::make('subtotal')
                                ->disabled()
                                ->prefix('₹'),
                            TextInput::make('shipping_total')
                                ->disabled()
                                ->prefix('₹'),
                            TextInput::make('discount_total')
                                ->disabled()
                                ->prefix('₹'),
                            TextInput::make('grand_total')
                                ->disabled()
                                ->prefix('₹'),
                        ]),
                    ]),
                Section::make('Payment')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('payment_method')
                                ->disabled(),
                            TextInput::make('payment_id')
                                ->disabled(),
                        ]),
                    ]),
                Section::make('Billing Details')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('billing_name')
                                ->disabled(),
                            TextInput::make('billing_email')
                                ->disabled(),
                            TextInput::make('billing_phone')
                                ->disabled(),
                            TextInput::make('billing_city')
                                ->disabled(),
                            TextInput::make('billing_address_line_1')
                                ->disabled()
                                ->columnSpanFull(),
                            TextInput::make('billing_state')
                                ->disabled(),
                            TextInput::make('billing_pincode')
                                ->disabled(),
                        ]),
                    ])
                    ->collapsible(),
                Section::make('Shipping Details')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('shipping_name')
                                ->disabled(),
                            TextInput::make('shipping_phone')
                                ->disabled(),
                            TextInput::make('shipping_address_line_1')
                                ->disabled()
                                ->columnSpanFull(),
                            TextInput::make('shipping_city')
                                ->disabled(),
                            TextInput::make('shipping_state')
                                ->disabled(),
                            TextInput::make('shipping_pincode')
                                ->disabled(),
                        ]),
                    ])
                    ->collapsible(),
                Section::make('Notes')
                    ->schema([
                        Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Order #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('billing_name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->money('INR')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'primary',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('payment_status')
                    ->label('Payment')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('payment_method')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Ordered At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ]),
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
