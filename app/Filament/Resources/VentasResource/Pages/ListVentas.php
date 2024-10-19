<?php

namespace App\Filament\Resources\VentasResource\Pages;

use App\Filament\Resources\VentasResource;
use App\Models\Ventas;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListVentas extends ListRecords
{
    protected static string $resource = VentasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->label('All Customers')
                ->badge(Ventas::count()),

            'archived' => Tab::make()
                ->label('Archived')
                ->badge(Ventas::onlyTrashed()->count())
                ->query(fn($query) => $query->onlyTrashed())
        ];
    }
}
