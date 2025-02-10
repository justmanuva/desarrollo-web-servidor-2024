<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Se ha creado con el comando de php make:controller
class CocheController extends Controller
{
    public function index() {
        $coches = [
            "Mazda M3",
            "Mercedes CLA",
            "Ford Mustang",
            "Peugeot 307 MS",
            "Fiat Multipla",
            "Citroën C15",
            "Mitsubichi Pajero"
        ];
        
        return view('coches', ['coches' => $coches]);
    }
}
