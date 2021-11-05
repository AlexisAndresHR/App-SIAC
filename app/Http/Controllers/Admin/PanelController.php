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

}
