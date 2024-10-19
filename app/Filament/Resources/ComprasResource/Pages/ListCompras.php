<?php

namespace App\Filament\Resources\ComprasResource\Pages;

use App\Filament\Resources\ComprasResource;
use App\Models\Compras;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListCompras extends ListRecords
{
    protected static string $resource = ComprasResource::class;

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
                ->badge(Compras::count()),

            'archived' => Tab::make()
                ->label('Archived')
                ->badge(Compras::onlyTrashed()->count())
                ->query(fn($query) => $query->onlyTrashed())
        ];
    }
}
