<?php

use App\Http\Middleware\RolMiddleware;
use App\Livewire\CctsTable;
use App\Livewire\CodigosTable;
use App\Livewire\MunicipiosTable;
use App\Livewire\PlantelesTable;
use App\Models\Cct;
use App\Models\Institution;
use App\Models\Level;
use App\Models\Municipality;
use App\Models\Postcode;
use App\Models\Shift;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->municipio = Municipality::create(['nombre_municipio' => 'TOLUCA DE LERDO']);
    $this->codigo = Postcode::create([
        'municipio_id' => $this->municipio->id, 'codigo_postal' => '00123',
        'localidad' => 'CENTRO', 'tipo' => 'COLONIA', 'zona' => 'URBANA',
    ]);
    $this->plantel = Institution::create([
        'postcode_id' => $this->codigo->id, 'nombre_plantel' => 'BENITO JUAREZ',
        'latitud' => '19.28', 'longitud' => '-99.65',
    ]);
    $nivel = Level::forceCreate(['nombre_nivel' => 'PRIMARIA']);
    $turno = Shift::forceCreate(['nombre_turno' => 'MATUTINO']);
    $this->cct = Cct::create([
        'plantel_id' => $this->plantel->id, 'nivel_id' => $nivel->id,
        'turno_id' => $turno->id, 'clave_cct' => '15EPR1234A',
    ]);

    $otroMunicipio = Municipality::create(['nombre_municipio' => 'METEPEC']);
    $otroCodigo = Postcode::create([
        'municipio_id' => $otroMunicipio->id, 'codigo_postal' => '52140',
        'localidad' => 'SAN MIGUEL', 'tipo' => 'PUEBLO', 'zona' => 'RURAL',
    ]);
    $otroPlantel = Institution::create([
        'postcode_id' => $otroCodigo->id, 'nombre_plantel' => 'MIGUEL HIDALGO',
        'latitud' => '19.25', 'longitud' => '-99.60',
    ]);
    Cct::create([
        'plantel_id' => $otroPlantel->id, 'nivel_id' => $nivel->id,
        'turno_id' => $turno->id, 'clave_cct' => '15EPR5678B',
    ]);
});

it('searches partial words and related data across the catalog', function ($component, $collection, $search, $record) {
    Livewire::test($component)
        ->set('search', $search)
        ->assertViewHas($collection, fn ($rows) => $rows->total() === 1 && $rows->first()->id === $this->{$record}->id);
})->with([
    'municipality words in any order' => [MunicipiosTable::class, 'municipios', '  lerdo   tolu  ', 'municipio'],
    'postal code with leading zeros' => [CodigosTable::class, 'codigos', '001', 'codigo'],
    'postcode municipality and zone' => [CodigosTable::class, 'codigos', 'urbana toluca', 'codigo'],
    'postcode locality and type' => [CodigosTable::class, 'codigos', 'centro colonia', 'codigo'],
    'institution name and municipality' => [PlantelesTable::class, 'planteles', 'juarez toluca', 'plantel'],
    'institution CCT' => [PlantelesTable::class, 'planteles', '15epr123', 'plantel'],
    'institution postal code and locality' => [PlantelesTable::class, 'planteles', '00123 centro', 'plantel'],
    'CCT code' => [CctsTable::class, 'ccts', '15epr123', 'cct'],
    'CCT municipality, level and shift' => [CctsTable::class, 'ccts', 'toluca primaria matutino', 'cct'],
    'CCT institution and locality' => [CctsTable::class, 'ccts', 'benito centro', 'cct'],
    'CCT postal code' => [CctsTable::class, 'ccts', '00123', 'cct'],
]);

it('resets its own pagination and restores results when cleared', function ($component, $collection, $pageName, $record) {
    for ($i = 0; $i < 13; $i++) {
        $copy = $this->{$record}->replicate();
        $copy->save();
    }

    Livewire::test($component)
        ->call('setPage', 2, $pageName)
        ->assertSet("paginators.{$pageName}", 2)
        ->set('search', 'sin coincidencias')
        ->assertSet("paginators.{$pageName}", 1)
        ->assertViewHas($collection, fn ($rows) => $rows->total() === 0)
        ->call('clearSearch')
        ->assertSet('search', '')
        ->assertSet("paginators.{$pageName}", 1)
        ->assertViewHas($collection, fn ($rows) => $rows->total() === 15);
})->with([
    [MunicipiosTable::class, 'municipios', 'municipios_page', 'municipio'],
    [CodigosTable::class, 'codigos', 'codigos_page', 'codigo'],
    [PlantelesTable::class, 'planteles', 'planteles_page', 'plantel'],
    [CctsTable::class, 'ccts', 'ccts_page', 'cct'],
]);

it('handles whitespace, literal wildcard characters and the string zero', function () {
    Municipality::create(['nombre_municipio' => 'DISTRITO 0']);
    $literal = Municipality::create(['nombre_municipio' => 'ZONA 100%_!']);

    Livewire::test(MunicipiosTable::class)
        ->set('search', '   ')
        ->assertViewHas('municipios', fn ($rows) => $rows->total() === 4)
        ->set('search', '0')
        ->assertViewHas('municipios', fn ($rows) => $rows->total() === 2)
        ->set('search', '%_!')
        ->assertViewHas('municipios', fn ($rows) => $rows->total() === 1 && $rows->first()->id === $literal->id)
        ->set('search', "' OR 1=1 --")
        ->assertViewHas('municipios', fn ($rows) => $rows->total() === 0);
});

it('initializes each search from its own URL parameter', function ($component, $parameter) {
    Livewire::withQueryParams([$parameter => 'toluca'])
        ->test($component)->assertSet('search', 'toluca');
})->with([
    [MunicipiosTable::class, 'search'],
    [CodigosTable::class, 'search_codigos'],
    [PlantelesTable::class, 'search_planteles'],
    [CctsTable::class, 'search_ccts'],
]);

it('renders both catalog lists on index and edit pages', function () {
    $this->actingAs(User::factory()->create(['id_rol' => null, 'id_municipio' => $this->municipio->id]))
        ->withoutMiddleware(RolMiddleware::class);

    foreach ([
        route('catalogos'), route('codigos.index'),
        route('catalogos.edit', $this->municipio), route('codigos.edit', $this->codigo),
    ] as $url) {
        $this->get($url)->assertOk()->assertSee('Buscar municipios')->assertSee('Buscar códigos postales');
    }

    $this->get(route('ccts'))->assertOk()->assertSee('Buscar planteles')->assertSee('Buscar C.C.T.');
});
