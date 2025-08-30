<?php

namespace App\Filament\Resources\StockCarsResource\Pages;

use App\Filament\Resources\StockCarsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStockCars extends EditRecord
{
    protected static string $resource = StockCarsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeDelete(): void
    {
        if ($this->record->gallery) {
            foreach ($this->record->gallery as $file) {
                \Storage::disk('public')->delete($file);
            }
        }

        if ($this->record->specification_file) {
            \Storage::disk('public')->delete($this->record->specification_file);
        }
    }
}
