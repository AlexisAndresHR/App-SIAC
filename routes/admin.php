<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PanelController;


Route::prefix('admin')->group(function(){

    Route::get('/', [PanelController::class, 'showPanel'])->name('admin-panel');

});
