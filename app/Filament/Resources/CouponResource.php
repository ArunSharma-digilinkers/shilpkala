<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-ticket';
    protected static string | \UnitEnum | null $navigationGroup = 'Shop';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Coupon Details')->schema([
                Grid::make(2)->schema([
                    TextInput::make('code')->required()->maxLength(50)->unique(ignoreRecord: true),
                    Select::make('type')->options(['percentage' => 'Percentage', 'fixed' => 'Fixed Amount'])->required(),
                ]),
                Grid::make(3)->schema([
                    TextInput::make('value')->numeric()->required()->prefix('₹/%'),
                    TextInput::make('min_order_amount')->numeric()->prefix('₹'),
                    TextInput::make('max_uses')->numeric(),
                ]),
                Grid::make(2)->schema([
                    DateTimePicker::make('expires_at'),
                    Toggle::make('is_active')->default(true),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->searchable()->sortable(),
                TextColumn::make('type')->badge(),
                TextColumn::make('value')->sortable(),
                TextColumn::make('used_count')->label('Uses')->sortable(),
                TextColumn::make('max_uses')->label('Max'),
                TextColumn::make('expires_at')->dateTime()->sortable(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->actions([EditAction::make(), DeleteAction::make()])
            ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
