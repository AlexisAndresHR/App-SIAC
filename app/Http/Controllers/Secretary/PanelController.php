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
        //return view('secretary.dashboard');
        return "We are in the Secretary panel section.";
    }

}
