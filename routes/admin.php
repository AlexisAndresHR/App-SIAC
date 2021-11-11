<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;


Route::prefix('admin')->group(function(){

    Route::get('/', [PanelController::class, 'showPanel'])->name('admin-panel');

    // For 'Solicitudes' submenu actions
    Route::get('/solicitudes', [PanelController::class, 'getSolicitudesActions'])->name('get-solicitudes');


    // For 'Secretarías' submenu actions
    Route::get('/secretarias', [PanelController::class, 'getSecretariasActions'])->name('get-secretarias');

});
