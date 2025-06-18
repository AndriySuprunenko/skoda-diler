<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModelsResource\Pages;
use App\Models\Models;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;

class ModelsResource extends Resource
{
    protected static ?string $model = Models::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(Models::class, 'name', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('power')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gear_box')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('engine_capacity')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fuel_consumtion')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('complectation')
                    ->nullable(),
                Repeater::make('images')
                    ->relationship()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->maxSize(204800) // 20 MB
                            ->directory('models')
                            ->required(),
                    ])
                    ->collapsible()
                    ->label('Галерея моделі'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListModels::route('/'),
            'create' => Pages\CreateModels::route('/create'),
            'edit' => Pages\EditModels::route('/{record}/edit'),
        ];
    }
}
