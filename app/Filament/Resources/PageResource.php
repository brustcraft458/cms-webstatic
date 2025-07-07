<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationLabel = 'Pages';
    protected static ?string $slug = 'pages';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            TextInput::make('slug')->required(),

            Builder::make('blocks')
                ->label('Content Blocks')
                ->collapsible()
                ->blocks([
                    Builder\Block::make('header')
                        ->icon('heroicon-o-heading')
                        ->schema([
                            TextInput::make('text')->label('Header Title'),
                        ]),

                    Builder\Block::make('text content')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            Textarea::make('text')->label('Paragraph Text'),
                        ]),

                    Builder\Block::make('screenshot')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            TextInput::make('url')->label('Image URL'),
                        ]),

                    Builder\Block::make('profile content')
                        ->icon('heroicon-o-user')
                        ->schema([
                            TextInput::make('name')->label('Name'),
                            TextInput::make('image')->label('Profile Image URL'),
                            TextInput::make('quote')->label('Quote'),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug')->searchable(),
                TextColumn::make('updated_at')->label('Last Updated')->dateTime(),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }
}
