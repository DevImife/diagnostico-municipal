<?php

namespace App\Livewire;

use App\Models\Postcode;
use App\Support\TableSearch;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CodigosTable extends Component
{
    use WithPagination;

    #[Url(as: 'search_codigos', except: '')]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage('codigos_page');
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage('codigos_page');
    }

    public function render()
    {
        $codigos = TableSearch::apply(Postcode::with('municipio'), $this->search, [
            'codigo_postal', 'localidad', 'tipo', 'zona', 'municipio.nombre_municipio',
        ])->orderBy('codigo_postal')->orderBy('localidad')->orderBy('id')
            ->paginate(12, ['*'], 'codigos_page');

        return view('livewire.codigos-table', compact('codigos'));
    }
}
