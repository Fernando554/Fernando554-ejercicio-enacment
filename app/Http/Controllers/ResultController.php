<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class ResultController extends Controller
{
    public function guardarResultados(Request $request)
    {
        // Valida la solicitud
        $request->validate([
            'resultados' => 'required|array',
            'resultados.*' => 'integer', // Asegúrate de que cada elemento sea un número entero
        ]);

        // Guarda los resultados en la base de datos
        foreach ($request->input('resultados') as $resultado) {
            Calculation::create(['valor' => $resultado]);
        }

        // Devuelve una respuesta exitosa
        return response()->json(['message' => 'Resultados guardados exitosamente'], 200);
    }
}
