<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static string | \UnitEnum | null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Testimonial')->schema([
                Grid::make(2)->schema([
                    TextInput::make('customer_name')->required()->maxLength(255),
                    Select::make('rating')->options(array_combine(range(1, 5), range(1, 5)))->default(5)->required(),
                ]),
                Textarea::make('content')->required()->rows(4),
                FileUpload::make('image')->image()->directory('testimonials')->avatar(),
                Grid::make(2)->schema([
                    TextInput::make('sort_order')->numeric()->default(0),
                    Toggle::make('is_active')->default(true),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('customer_name')->searchable()->sortable(),
                TextColumn::make('content')->limit(50),
                TextColumn::make('rating')->sortable(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->actions([EditAction::make(), DeleteAction::make()])
            ->bulkActions([DeleteBulkAction::make()])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
