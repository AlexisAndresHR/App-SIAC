<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Secretary\PanelController;


Route::prefix('secretary')->group(function(){

    Route::get('/', [PanelController::class, 'showPanel'])->name('secretary-panel');

});

/*
// Routes group for 'Solicitudes' submenu actions
Route::prefix('solicitudes')->group(function(){

    Route::get('/', [PanelController::class, 'getSolicitudesActions'])->name('get-solicitudes');
    Route::get('/new', [PanelController::class, 'newSolicitud'])->name('new-solicitud');

});

// Routes group for 'Secretarías' submenu actions
Route::prefix('secretarias')->group(function(){

    Route::get('/', [PanelController::class, 'getSecretariasActions'])->name('get-secretarias');

});
*/
