<?php

namespace App\Livewire;

use App\Models\Institution;
use Livewire\Component;
use Livewire\WithPagination;

class PlantelesTable extends Component
{
    use WithPagination;

    public $search = ''; // búsqueda

    public function updatingSearch()
    {
        $this->resetPage(); // resetea paginación cuando buscas
    }

    public function render()
    {

        $planteles = Institution::with('codigo_postal.municipio')
            // ->where('nombre_plantel', 'like', '%'.$this->search.'%')
            // ->orWhere('cct', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.planteles-table', compact('planteles'));

    }
}
