<?php

namespace App\Http\Controllers\Operating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PanelController extends Controller
{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('operatingrole');
    }

    /**
     * Method to show the main Secretary view (Dashboard)
     */
    public function showPanel() {
        //return view('operating.dashboard');
        return "... We are in the Operating panel section.";
    }

}
