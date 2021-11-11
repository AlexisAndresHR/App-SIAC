<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PanelController extends Controller
{
    
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('adminrole');
    }

    /**
     * Method to show the main Admin view (Dashboard)
     */
    public function showPanel() {
        return view('admin.dashboard');
    }

    /**
     * Function to show the content and actions of submenu 'Solicitudes'
     */
    public function getSolicitudesActions() {
        return view('menu.solicitudes.page');
    }

    /**
     * Function to show the content and actions of submenu 'Secretarías'
     */
    public function getSecretariasActions() {
        return view('menu.secretarias.page');
    }

}
