<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticasAdminController extends Controller
{
    public function index(){

        return view('admin.estadisticas.index');
    }
}
