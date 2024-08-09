<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Information;

class InformationController extends Controller
{

    public function index()
    {


        return view('admin.information.index');
    }

    //mostrar informacion en inicio e-commerce
    public function information()
    {
        $information = Information::find(1);

        if ($information) {
            $description = $information->description;
        } else {
            $description = "No hay información para mostrar";
        }

        return view('information', compact('description'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'description' => 'required|string',
        ]);

        // Busca o crea el registro (si solo hay un registro, puedes usar id 1 o similar)
        $information = Information::updateOrCreate(
            ['id' => 1], // Cambia esto si estás utilizando un criterio diferente
            ['description' => $request->input('description')]
        );

        // Retorna la información actualizada como respuesta JSON
        return response()->json($information);
    }

    public function show()
    {
        $information = Information::find(1);
        if ($information) {
            return response()->json([
                'description' => $information->description
            ]);
        } else {
            return response()->json([
                'description' => "No hay información para mostrar"
            ]);
        }
    }
}
