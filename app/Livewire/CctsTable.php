<?php

namespace App\Livewire;

use App\Models\Cct;
use App\Support\TableSearch;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CctsTable extends Component
{
    use WithPagination;

    #[Url(as: 'search_ccts', except: '')]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage('ccts_page');
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage('ccts_page');
    }

    public function render()
    {
        $ccts = TableSearch::apply(Cct::with(['plantel.codigo_postal.municipio', 'nivel', 'turno']), $this->search, [
            'clave_cct', 'plantel.nombre_plantel', 'turno.nombre_turno', 'nivel.nombre_nivel',
            'plantel.codigo_postal.municipio.nombre_municipio',
            'plantel.codigo_postal.codigo_postal', 'plantel.codigo_postal.localidad',
        ])->orderBy('clave_cct')->orderBy('id')
            ->paginate(10, ['*'], 'ccts_page');

        return view('livewire.ccts-table', [
            'ccts' => $ccts,
        ]);
    }
}
