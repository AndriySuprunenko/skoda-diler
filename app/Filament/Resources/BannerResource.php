<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255),
                Select::make('button_type')
                    ->label('Оберіть тип форми')
                    ->options([
                        'price' => 'Скачати прайс',
                        'test-drive' => 'Записатися на тест-драйв',
                        'consultation' => 'Консультація',
                    ]),
                Textarea::make('description')->rows(3),
                TextInput::make('item_one')
                    ->label('Item One')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('item_two')
                    ->label('Item Two')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('item_three')
                    ->label('Item Three')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('item_four')
                    ->label('Item Four')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('item_five')
                    ->label('Item Five')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('item_six')
                    ->label('Item Six')
                    ->maxLength(50)
                    ->nullable(),
                TextInput::make('button_text')
                    ->label('Button Text')
                    ->maxLength(50)
                    ->nullable(),
                FileUpload::make('image')
                    ->directory('banners')
                    ->image()
                    ->imagePreviewHeight('250')
                    ->nullable(),
                Toggle::make('is_active')->default(true)->label('Active'),
                TextInput::make('order')
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
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('description')->limit(50)->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
                TextColumn::make('order')->sortable(),
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
            ])
            ->reorderable('order');
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
    public static function canReorder(): bool
    {
        return true;
    }

    public static function getDefaultSort(): ?array
    {
        return ['order', 'asc'];
    }
}
