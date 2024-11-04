<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->maxLength(100)
                ->required(),
                Forms\Components\Select::make('category')
                ->options([
                    'makanan utama' => 'makanan utama',
                    'minuman' => 'minuman',
                    'makanan penutup' => 'makanan penutup',])
                ->searchable()
                ->native(false),
                Forms\Components\TextInput::make('price')
                ->label('Price')
                ->required()
                ->numeric()
                ->minValue(0)
                ->step(0.01),
                Forms\Components\Toggle::make('availability')
                ->label('Availability')
                ->required()
                ->default(false),
                Forms\Components\DatePicker::make('created_at')
                ->label('Created At')
                ->default(now()),
                Forms\Components\DatePicker::make('updated_at')
                ->label('Updated At')
                ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('availability')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
