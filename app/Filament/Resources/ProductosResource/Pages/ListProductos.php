<?php

namespace App\Filament\Resources\ProductosResource\Pages;

use App\Filament\Resources\ProductosResource;
use App\Models\Productos;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListProductos extends ListRecords
{
    protected static string $resource = ProductosResource::class;

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
                ->badge(Productos::count()),

            'archived' => Tab::make()
                ->label('Archived')
                ->badge(Productos::onlyTrashed()->count())
                ->query(fn($query) => $query->onlyTrashed())
        ];
    }
}
