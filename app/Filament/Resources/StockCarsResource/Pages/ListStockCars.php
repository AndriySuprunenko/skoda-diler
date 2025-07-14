<?php

namespace App\Filament\Resources\StockCarsResource\Pages;

use App\Filament\Resources\StockCarsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStockCars extends ListRecords
{
    protected static string $resource = StockCarsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
