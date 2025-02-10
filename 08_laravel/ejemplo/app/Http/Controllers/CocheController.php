<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Se ha creado con el comando de php make:controller
class CocheController extends Controller
{
    public function index() {
        return view('coches');
    }
}
