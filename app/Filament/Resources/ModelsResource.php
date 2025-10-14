<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModelsResource\Pages;
use App\Models\Models;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;

class ModelsResource extends Resource
{
    protected static ?string $model = Models::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Назва моделі')
                    ->required()
                    ->unique(Models::class, 'name', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->label('Шлях')
                    ->required()
                    ->unique(Models::class, 'url', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('power')
                    ->label('Потужність двигуна')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gear_box')
                    ->label('Коробка передач')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('price')
                    ->label('Прайс-лист')
                    ->nullable()
                    ->directory('models/prices')
                    ->deletable(true)
                    ->downloadable(true)
                    ->deleteUploadedFileUsing(function ($file) {
                        \Storage::disk('public')->delete($file);
                    }),
                Forms\Components\TextInput::make('engine_capacity')
                    ->label('Обʼєм двигуна')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fuel_consumtion')
                    ->label('Витрати палива')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('complectation')
                    ->label('Комплектація')
                    ->nullable(),
                Forms\Components\CheckboxList::make('colors')
                    ->label('Кольори')
                    ->options([
                        'white' => 'Білий',
                        'black' => 'Чорний',
                        'gray' => 'Сірий',
                        'blue' => 'Синій',
                        'red' => 'Червоний',
                        'gold' => 'Золотий',
                        'bronze' => 'Бронзовий',
                        'green' => 'Зелений',
                        'orange' => 'Помаранчевий',
                    ])
                    ->columns(2),
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
                TextInput::make('order')
                    ->label('Порядок відображення')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->minValue(1)
                    ->maxValue(10)
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
                TextColumn::make('order')
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
                Tables\Actions\DeleteAction::make()
                    ->before(function (Models $record) {
                        if ($record->images) {
                            foreach ($record->images as $image) {
                                if ($image->image) {
                                    \Storage::disk('public')->delete($image->image);
                                }
                                if ($record->price) {
                                    \Storage::disk('public')->delete($record->price);
                                }
                            }
                        }
                    }),
                Tables\Actions\Action::make('clear_gallery')
                    ->label('Очистити галерею')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->action(function (Models $record) {
                        if ($record->images) {
                            foreach ($record->images as $image) {
                                if ($image->image) {
                                    \Storage::disk('public')->delete($image->image);
                                    $image->delete();
                                }
                            }
                        }
                    }),
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
