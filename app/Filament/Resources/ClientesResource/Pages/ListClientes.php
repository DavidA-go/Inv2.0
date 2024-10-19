<?php

namespace App\Filament\Resources\ClientesResource\Pages;

use App\Filament\Resources\ClientesResource;
use App\Models\Clientes;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListClientes extends ListRecords
{
    protected static string $resource = ClientesResource::class;

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
                ->badge(Clientes::count()),

            'archived' => Tab::make()
                ->label('Archived')
                ->badge(Clientes::onlyTrashed()->count())
                ->query(fn($query) => $query->onlyTrashed())
        ];
    }
}
