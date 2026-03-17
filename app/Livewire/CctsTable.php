<?php

namespace App\Livewire;

use App\Models\Cct;
use Livewire\Component;
use Livewire\WithPagination;

class CctsTable extends Component
{
    use WithPagination;

    public $search = ''; // búsqueda

    public function updatingSearch()
    {
        $this->resetPage(); // resetea paginación cuando buscas
    }

    public function render()
    {
        $ccts = Cct::with(['plantel.codigo_postal.municipio', 'nivel', 'turno'])
            // ->where(function ($q) {
            //     $q->where('clave_cct', 'like', "%{$this->search}%")
            //         ->orWhereHas('plantel', function ($q2) {
            //             $q2->where('nombre_plantel', 'like', "%{$this->search}%");
            //         });
            // })
            ->paginate(10);

        return view('livewire.ccts-table', [
            'ccts' => $ccts,
        ]);
    }
}
