<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\TernaryFilter;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-envelope';
    protected static string | \UnitEnum | null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Messages';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Message Details')->schema([
                TextInput::make('name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('subject')->disabled(),
                Textarea::make('message')->disabled()->rows(5),
                Toggle::make('is_read'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_read')->boolean()->label('Read'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('subject')->limit(40)->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_read')->label('Read Status'),
            ])
            ->actions([ViewAction::make()])
            ->bulkActions([DeleteBulkAction::make()])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
