<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Se ha creado con el comando de php make:controller
class CocheController extends Controller
{
    public function index() {
        $coches = [
            ["RX7", "Mazda", 20000],
            ["CLA", "Mercedes", 35000],
            ["Mustang", "Ford", 50000],
            ["307 MS", "Peugeot", 17500],
            ["Multipla", "Fiat", 12500],
            ["C15", "Citroën", 1000],
            ["Pajero", "Mitsubichi", 25000]
        ];
        
        return view('coches', ['coches' => $coches]);
    }
}
