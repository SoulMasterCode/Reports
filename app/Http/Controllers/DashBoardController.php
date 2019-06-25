<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(Request $request){
        $title = $request->query('title', 'Titulo no definido');
        return view('dashboard', ['title'=> $title]);
    }
}
