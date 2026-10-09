<?php

namespace App\Livewire;

use App\Models\Municipality;
use App\Support\TableSearch;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MunicipiosTable extends Component
{
    use WithPagination;

    #[Url(as: 'search', except: '')]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage('municipios_page');
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage('municipios_page');
    }

    public function render()
    {
        $municipios = TableSearch::apply(Municipality::query(), $this->search, ['nombre_municipio'])
            ->orderBy('nombre_municipio')->orderBy('id')
            ->paginate(12, ['*'], 'municipios_page');

        return view('livewire.municipios-table', compact('municipios'));
    }
}
