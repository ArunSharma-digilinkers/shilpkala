<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\User;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static string | \UnitEnum | null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Customers';

    protected static ?string $modelLabel = 'Customer';

    protected static ?string $pluralModelLabel = 'Customers';

    protected static ?string $slug = 'customers';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', 'customer');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Customer Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255)
                                ->unique(ignoreRecord: true),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('phone')
                                ->tel()
                                ->maxLength(20),
                            TextInput::make('password')
                                ->password()
                                ->dehydrated(fn ($state) => filled($state))
                                ->required(fn (string $operation): bool => $operation === 'create')
                                ->minLength(8)
                                ->helperText('Leave empty to keep current password'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('orders_count')
                    ->label('Orders')
                    ->counts('orders')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Joined')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
