<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockCarsResource\Pages;
use App\Filament\Resources\StockCarsResource\RelationManagers;
use App\Models\StockCars;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockCarsResource extends Resource
{
    protected static ?string $model = StockCars::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Назва')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Статус')
                    ->options([
                        'available' => 'В наявності',
                        'sold' => 'Продано',
                        'reserved' => 'Заброньовано',
                        'hot_offer' => 'Гаряча пропозиція',
                        'in_delivery' => 'В поставці',
                    ])
                    ->required(),

                Forms\Components\Select::make('condition')
                    ->label('Стан авто')
                    ->options([
                        'new' => 'Новий',
                        'used' => 'Вживаний',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('mileage')
                    ->label('Пробіг')
                    ->numeric(),

                Forms\Components\TextInput::make('vin')
                    ->label('VIN-код'),

                Forms\Components\FileUpload::make('gallery')
                    ->label('Галерея')
                    ->multiple()
                    ->directory('cars')
                    ->deleteUploadedFileUsing(function ($file) {
                        \Storage::disk('public')->delete($file);
                    }),

                Forms\Components\TextInput::make('color')
                    ->label('Колір'),

                Forms\Components\TextInput::make('engine_power')
                    ->label('Потужність двигуна'),

                Forms\Components\TextInput::make('transmission')
                    ->label('Коробка'),

                Forms\Components\TextInput::make('engine_volume')
                    ->label('Обʼєм двигуна'),

                Forms\Components\TextInput::make('fuel_consumption')
                    ->label('Середня витрата палива'),

                Forms\Components\Textarea::make('configuration')
                    ->label('Комплектація'),

                Forms\Components\TextInput::make('price')
                    ->label('Ціна')
                    ->numeric()
                    ->required(),
                Forms\Components\FileUpload::make('specification_file')
                    ->label('Файл специфікації')
                    ->nullable()
                    ->directory('cars/specifications')
                    ->deletable(true)
                    ->downloadable(true)
                    ->deleteUploadedFileUsing(function ($file) {
                        \Storage::disk('public')->delete($file);
                    }),
                Forms\Components\RichEditor::make('description')
                    ->label('Опис')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Ціна')
                    ->money('UAH')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'available' => 'В наявності',
                        'sold' => 'Продано',
                        'reserved' => 'Заброньовано',
                        'hot_offer' => 'Гаряча пропозиція',
                    ]),

                Tables\Filters\SelectFilter::make('condition')
                    ->label('Стан')
                    ->options([
                        'new' => 'Новий',
                        'used' => 'Вживаний',
                    ]),

                Tables\Filters\Filter::make('price')
                    ->label('Ціна')
                    ->form([
                        Forms\Components\TextInput::make('from')->numeric()->label('Від'),
                        Forms\Components\TextInput::make('to')->numeric()->label('До'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn($q, $value) => $q->where('price', '>=', $value))
                            ->when($data['to'], fn($q, $value) => $q->where('price', '<=', $value));
                    }),

                Tables\Filters\Filter::make('mileage')
                    ->label('Пробіг')
                    ->form([
                        Forms\Components\TextInput::make('from')->numeric()->label('Від'),
                        Forms\Components\TextInput::make('to')->numeric()->label('До'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn($q, $value) => $q->where('mileage', '>=', $value))
                            ->when($data['to'], fn($q, $value) => $q->where('mileage', '<=', $value));
                    }),

                Tables\Filters\SelectFilter::make('transmission')
                    ->label('Коробка')
                    ->options([
                        'manual' => 'Механічна',
                        'automatic' => 'Автоматична',
                        'cvt' => 'CVT',
                        'robot' => 'Робот',
                    ]),

                Tables\Filters\SelectFilter::make('color')
                    ->label('Колір')
                    ->options(fn() => \App\Models\StockCars::query()->distinct()->pluck('color', 'color')->filter()),

                Tables\Filters\Filter::make('vin')
                    ->label('VIN-код')
                    ->form([
                        Forms\Components\TextInput::make('value')->label('VIN-код'),
                    ])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q, $vin) => $q->where('vin', 'like', "%$vin%"))),

                Tables\Filters\Filter::make('engine_volume')
                    ->label('Обʼєм двигуна')
                    ->form([
                        Forms\Components\TextInput::make('value')->label('Обʼєм'),
                    ])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q, $val) => $q->where('engine_volume', 'like', "%$val%"))),

                Tables\Filters\Filter::make('engine_power')
                    ->label('Потужність двигуна')
                    ->form([
                        Forms\Components\TextInput::make('from')->numeric()->label('Від'),
                        Forms\Components\TextInput::make('to')->numeric()->label('До'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn($q, $value) => $q->where('engine_power', '>=', $value))
                            ->when($data['to'], fn($q, $value) => $q->where('engine_power', '<=', $value));
                    }),

                Tables\Filters\Filter::make('fuel_consumption')
                    ->label('Витрата палива')
                    ->form([
                        Forms\Components\TextInput::make('value')->label('Витрата'),
                    ])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q, $val) => $q->where('fuel_consumption', 'like', "%$val%"))),

                Tables\Filters\Filter::make('configuration')
                    ->label('Комплектація')
                    ->form([
                        Forms\Components\TextInput::make('value')->label('Пошук по комплектації'),
                    ])
                    ->query(fn($query, $data) => $query->when($data['value'], fn($q, $val) => $q->where('configuration', 'like', "%$val%"))),

                Tables\Filters\Filter::make('created_at')
                    ->label('Дата створення')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Від'),
                        Forms\Components\DatePicker::make('to')->label('До'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn($q, $value) => $q->whereDate('created_at', '>=', $value))
                            ->when($data['to'], fn($q, $value) => $q->whereDate('created_at', '<=', $value));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (StockCars $record) {
                        if ($record->gallery) {
                            foreach ($record->gallery as $file) {
                                \Storage::disk('public')->delete($file);
                            }
                        }
                        if ($record->specification_file) {
                            \Storage::disk('public')->delete($record->specification_file);
                        }
                    }),
                Tables\Actions\Action::make('clear_gallery')
                    ->label('Очистити галерею')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->action(function (StockCars $record) {
                        if ($record->gallery) {
                            foreach ($record->gallery as $file) {
                                \Storage::disk('public')->delete($file);
                            }
                            $record->gallery = [];
                            $record->save();
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
            'index' => Pages\ListStockCars::route('/'),
            'create' => Pages\CreateStockCars::route('/create'),
            'edit' => Pages\EditStockCars::route('/{record}/edit'),
        ];
    }
}
