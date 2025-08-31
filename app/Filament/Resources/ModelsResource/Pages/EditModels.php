<?php

namespace App\Filament\Resources\ModelsResource\Pages;

use App\Filament\Resources\ModelsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModels extends EditRecord
{
    protected static string $resource = ModelsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    if ($record->images) {
                        foreach ($record->images as $image) {
                            if ($image->image) {
                                \Storage::disk('public')->delete($image->image);
                            }
                        }
                    }
                }),
        ];
    }
}
