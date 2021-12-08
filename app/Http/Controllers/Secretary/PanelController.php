<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PanelController extends Controller
{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('secretaryrole');
    }

    /**
     * Method to show the main Secretary view (Dashboard)
     */
    public function showPanel() {
        return view('secretary.page');
    }


    /**
     * Function to show the content and actions of submenu 'Solicitudes'
     */
    public function getSolicitudesActions() {
        return view('menu.solicitudes.page');
    }

    /**
     * To register a new Solicitud
     */
    public function newSolicitud() {
        return view('menu.solicitudes.register');
    }

}
