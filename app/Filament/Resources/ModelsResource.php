<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModelsResource\Pages;
use App\Filament\Resources\ModelsResource\RelationManagers;
use App\Models\Models;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

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
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->directory('models')
                    ->image()
                    ->imagePreviewHeight('250')
                    ->nullable(),
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
