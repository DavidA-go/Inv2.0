<?php

namespace App\Filament\Resources\ProveedoresResource\Pages;

use App\Filament\Resources\ProveedoresResource;
use App\Models\Proveedores;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListProveedores extends ListRecords
{
    protected static string $resource = ProveedoresResource::class;

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
                ->badge(Proveedores::count()),

            'archived' => Tab::make()
                ->label('Archived')
                ->badge(Proveedores::onlyTrashed()->count())
                ->query(fn($query) => $query->onlyTrashed())
        ];
    }
}
