<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactsResource\Pages;
use App\Filament\Resources\ContactsResource\RelationManagers;
use App\Models\Contacts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactsResource extends Resource
{
    protected static ?string $model = Contacts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phone')
                    ->label('Номер телефону')
                    ->required()
                    ->tel(),

                Forms\Components\TextInput::make('email')
                    ->label('Електронна пошта')
                    ->required()
                    ->email(),

                Forms\Components\Fieldset::make('Графік роботи')
                    ->schema([
                        Forms\Components\TextInput::make('working_hours.Пн-Пт')
                            ->label('Пн-Пт')
                            ->placeholder('09:00–18:00'),

                        Forms\Components\TextInput::make('working_hours.Сб')
                            ->label('Субота')
                            ->placeholder('10:00–15:00'),

                        Forms\Components\TextInput::make('working_hours.Нд')
                            ->label('Неділя')
                            ->placeholder('вихідний'),
                    ])
                    ->columns(1),
                Forms\Components\Fieldset::make('Соціальні мережі')
                    ->schema([
                        Forms\Components\TextInput::make('social_medias.instagram')
                            ->label('instagram')
                            ->placeholder('посилання'),

                        Forms\Components\TextInput::make('social_medias.facebook')
                            ->label('facebook')
                            ->placeholder('посилання'),

                        Forms\Components\TextInput::make('social_medias.youtube')
                            ->label('youtube')
                            ->placeholder('посилання'),
                        Forms\Components\TextInput::make('social_medias.tiktok')
                            ->label('tiktok')
                            ->placeholder('посилання'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Пошта'),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContacts::route('/create'),
            'edit' => Pages\EditContacts::route('/{record}/edit'),
        ];
    }
}
