<?php

use App\Http\Controllers\CctsController;
use App\Http\Controllers\CodigoPostalController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PlantelesController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/grafica-encuestas', [CctsController::class, 'grafica'])->name('grafica');
Route::get('/dashboard/usuarios-activos', [CctsController::class, 'usuariosActivos'])->name('usuariosActivos');
Route::get('/dashboard/cantidad', [CctsController::class, 'dataCantidad'])->name('dataCantidad');

// Route::view('busqueda', 'busqueda')
//     ->middleware(['auth', 'verified'])
//     ->name('busqueda');

// catalogos
Route::middleware(['auth', 'verified', 'rol:1,2'])->group(function () {
    Route::view('catalogos', 'catalogos')->name('catalogos');
    Route::get('/catalogos', [MunicipiosController::class, 'index'])->name('catalogos');
    Route::post('/catalogos', [MunicipiosController::class, 'store'])->name('catalogos.store');
    Route::get('/catalogos/{id}/edit', [MunicipiosController::class, 'edit'])->name('catalogos.edit');
    Route::put('/catalogos/{id}', [MunicipiosController::class, 'update'])->name('catalogos.update');
    Route::delete('/catalogos/{id}', [MunicipiosController::class, 'destroy'])->name('catalogos.destroy');
});

// codigo postal
Route::middleware(['auth', 'verified', 'rol:1,2'])->group(function () {
    Route::get('/codigos-postales', [CodigoPostalController::class, 'index'])->name('codigos.index');
    Route::post('/codigos-postales', [CodigoPostalController::class, 'store'])->name('codigos.store');
    Route::get('/codigos-postales/{id}/edit', [CodigoPostalController::class, 'edit'])->name('codigos.edit');
    Route::put('/codigos-postales/{id}', [CodigoPostalController::class, 'update'])->name('codigos.update');
    Route::delete('/codigos-postales/{id}', [CodigoPostalController::class, 'destroy'])->name('codigos.destroy');
});
Route::get('/ccts/search', [PlantelesController::class, 'searchInstitution'])->name('instituciones.search');

// planteles
Route::middleware(['auth', 'verified', 'rol:1,2,3'])->group(function () {
    // Route::view('ccts', 'ccts')->name('ccts');
    Route::post('/planteles', [PlantelesController::class, 'store'])->name('planteles.store');
    Route::get('/planteles/{id}/edit', [PlantelesController::class, 'edit'])->name('planteles.edit');
    Route::put('/planteles/{id}', [PlantelesController::class, 'update'])->name('planteles.update');
    Route::delete('/planteles/{id}', [PlantelesController::class, 'destroy'])->name('planteles.destroy');
});

Route::get('/ccts/localidades/{codigoPostal}', [CctsController::class, 'obtenerLocalidades']);

// ccts
Route::middleware(['auth', 'verified', 'rol:1,2,3'])->group(function () {
    Route::get('/ccts', [CctsController::class, 'index'])->name('ccts');
    Route::post('/ccts', [CctsController::class, 'store'])->name('ccts.store');
    Route::get('/ccts/{id}/edit', [CctsController::class, 'edit'])->name('ccts.edit');
    Route::put('/ccts/{id}', [CctsController::class, 'update'])->name('ccts.update');
    Route::delete('/ccts/{id}', [CctsController::class, 'destroy'])->name('ccts.destroy');
    // Route::get('/ccts/localidades/{codigoPostal}', [CctsController::class, 'obtenerLocalidades']);
    Route::get('/ccts/datosGenerales/{cct}', [CctsController::class, 'mostrarDatosEncuesta']);
    Route::get('/ccts/validarRegistro/{cct}', [CctsController::class, 'validarRegistro']);
});
// encuesta
Route::middleware(['auth', 'verified', 'rol:1,2,3'])->group(function () {
    Route::view('encuesta', 'encuesta')->name('encuesta');
    Route::post('/survey', [SchoolController::class, 'store'])->name('survey.store');
    Route::get('/survey/search', [SchoolController::class, 'busquedaPlantel'])->name('survey.busqueda');
    Route::get('/busqueda', [SchoolController::class, 'escuelasRegistradas'])->name('busqueda');
    Route::get('/plantel/{id}', [SchoolController::class, 'mostrarPlantel'])->name('plantel.mostrar');
    Route::get('/exportar-encuesta/{id}', [SchoolController::class, 'exportarExcel']);
    Route::get('/exportar-encuesta-municipio', [SchoolController::class, 'exportarExcelMunicipio'])->name('encuestas.exportar.municipio');
    Route::delete('/plantel/{id}', [SchoolController::class, 'destroy']);
    // cargar las imagenes temporales
    Route::post('/survey/upload-temp', [SchoolController::class, 'uploadTemp'])->name('survey.uploadTemp');
});

// usuarios
Route::middleware(['auth', 'verified', 'rol:1'])->group(function () {
    Route::view('usuarios', 'usuarios')->name('usuarios');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/usuarios', [UsersController::class, 'create'])->name('usuarios');
    Route::post('/usuarios', [UsersController::class, 'store'])->name('usuarios.store');
    Route::delete('/usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
});

// errores

Route::get('/404', fn () => abort(404));
Route::get('/500', fn () => abort(500));

require __DIR__.'/auth.php';
