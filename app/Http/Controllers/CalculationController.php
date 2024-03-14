<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;
use App\Services\MultiplosCalculator;
use Illuminate\Support\Facades\Log;


class CalculationController extends Controller
{
    public function calcularMultiplos(Request $request)
    {
        $request->validate([
            'number' => 'required'
        ]);

        $number = $request->input('number');

        $calculation = new MultiplosCalculator();

        $multiplos = $calculation->calcularMultiplos($number);

        $calculation = new Calculation([
            'number' => $number,
            'result' => $multiplos
        ]);

        return response()->json($multiplos);
    }

    public function guardarResultados(Request $request)
    {
        try {
            $request->validate([
                'number' => 'required',
            ]);
            $number = $request->input('number');
            $result = $request->input('result');
            $resultadoModel = new Calculation();
            $resultadoModel->number = $number;
            $resultadoModel->result = $result;
            $resultadoModel->save();
    
            return response()->json(['message' => 'Resultados guardados exitosamente']);
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());
    
            // Return a 500 error response
            return response()->json(['error' => 'Server error'], 500);
        }
    }

}
