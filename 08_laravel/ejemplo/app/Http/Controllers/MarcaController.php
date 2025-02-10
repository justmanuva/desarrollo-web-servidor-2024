<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index() {
        $marcas = [
            "Nike",
            "Adidas",
            "Siksilk",
            "Asturiana",
            "Pascual",
            "Medac",
            "Gucci"
        ];
        
        return view('marcas', ['marcas' => $marcas]);
    }
}
