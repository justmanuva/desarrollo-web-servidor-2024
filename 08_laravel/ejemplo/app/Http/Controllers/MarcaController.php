<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    //Este el GET
    public function index()
    {
        /* $marcas = [
            "Mazda",
            "Peugeot",
            "Ford",
            "Mitsubishi",
            "Jaguar",
            "ByD"
        ]; */

        //Con esto cogemos TODO de la base de datos y lo metemos en el array
        $marcas = Marca::all();

        //Para devolver los valores con clave valor
        return view("marcas/index", ["marcas" => $marcas]);
    }

    public function create()
    {
        return view('marcas/create');
    }

    //Cogemos la información del formulario, (Al darle a enviar nos envia al .store que es esto)
    public function store(Request $request)
    {
        $marca = new Marca;
        $marca -> marca = $request -> input("marca");
        $marca -> ano_fundacion = $request -> input("ano_fundacion");
        $marca -> pais = $request -> input("pais");
        $marca -> save(); //Crea el objeto con los parámetros que les hemos indicado

        return redirect('/marcas'); //Cuando se inserta, nos manda al index
    }

    //Para ver la información en detalle
    public function show(string $id)
    {
        $marca = Marca::find($id);

        return view('marcas/show', ["marca" => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
