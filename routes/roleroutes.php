<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController as AdminController;
use App\Http\Controllers\Secretary\PanelController as SecretaryController;
use App\Http\Controllers\Operating\PanelController as OperatingController;


Route::middleware(['auth'])->group(function () {

    // Routes available for 'Administrator' user role
    Route::middleware(['adminrole'])->group(function () {

        Route::prefix('admin')->group(function(){

            Route::get('/', [AdminController::class, 'showPanel'])->name('admin.panel');

            // Routes group for 'Solicitudes' submenu actions
            Route::prefix('solicitudes')->group(function(){
                Route::get('/', [AdminController::class, 'getSolicitudesActions'])->name('get.solicitudes.adm');
                Route::get('/new', [AdminController::class, 'newSolicitud'])->name('new.solicitud.adm');
            });
            
            // Routes group for 'Secretarías' submenu actions
            Route::prefix('secretarias')->group(function(){
                Route::get('/', [AdminController::class, 'getSecretariasActions'])->name('get.secretarias.adm');
            });
        
        });
        
    });


    // Routes available for 'Secretary' user role
    Route::middleware(['secretaryrole'])->group(function () {

        Route::prefix('secretary')->group(function(){

            Route::get('/', [SecretaryController::class, 'showPanel'])->name('secretary.panel');
            
            // Routes group for 'Solicitudes' submenu actions
            Route::prefix('solicitudes')->group(function(){
                Route::get('/', [SecretaryController::class, 'getSolicitudesActions'])->name('get.solicitudes.sec');
                Route::get('/new', [SecretaryController::class, 'newSolicitud'])->name('new.solicitud.sec');
            });
            
            /*
            // Routes group for 'Secretarías' submenu actions
            Route::prefix('secretarias')->group(function(){
                Route::get('/', [SecretaryController::class, 'getSecretariasActions'])->name('get.secretarias');
            });
            */
        
        });

    });

    
    // Routes available for 'Operating' user role
    Route::middleware(['operatingrole'])->group(function () {

        Route::prefix('operating')->group(function(){

            Route::get('/', [OperatingController::class, 'showPanel'])->name('operating.panel');

            // Routes group for 'Solicitudes' submenu actions
            Route::prefix('solicitudes')->group(function(){
                Route::get('/', [OperatingController::class, 'getSolicitudesActions'])->name('get.solicitudes.op');
                Route::get('/new', [OperatingController::class, 'newSolicitud'])->name('new.solicitud.op');
            });
        
        });

    });

});
