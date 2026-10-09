<?php

namespace App\Livewire;

use App\Models\Institution;
use App\Support\TableSearch;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PlantelesTable extends Component
{
    use WithPagination;

    #[Url(as: 'search_planteles', except: '')]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage('planteles_page');
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage('planteles_page');
    }

    public function render()
    {

        $planteles = TableSearch::apply(Institution::with('codigo_postal.municipio'), $this->search, [
            'nombre_plantel', 'codigo_postal.codigo_postal', 'codigo_postal.localidad',
            'codigo_postal.municipio.nombre_municipio', 'ccts.clave_cct',
        ])->orderBy('nombre_plantel')->orderBy('id')
            ->paginate(10, ['*'], 'planteles_page');

        return view('livewire.planteles-table', compact('planteles'));

    }
}
