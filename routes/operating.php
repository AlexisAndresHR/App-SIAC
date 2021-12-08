<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operating\PanelController;


Route::prefix('operating')->group(function(){

    Route::get('/', [PanelController::class, 'showPanel'])->name('operating.panel');


    // Routes group for 'Solicitudes' submenu actions
    Route::prefix('solicitudes')->group(function(){

        Route::get('/', [PanelController::class, 'getSolicitudesActions'])->name('get.solicitudes.op');
        Route::get('/new', [PanelController::class, 'newSolicitud'])->name('new.solicitud.op');

    });

});
