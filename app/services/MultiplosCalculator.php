<?php

namespace App\Services;

class MultiplosCalculator
{
    public function calcularMultiplos($numero)
    {
        $multiplos = [
            '3' => [],
            '5' => [],
            '7' => []
        ];

        for ($i = 1; $i <= $numero; $i++) {
            foreach ($multiplos as $divisor => &$multiplosArray) {
                if ($i % $divisor === 0) {
                    $multiplosArray[] = $i;
                }
            }
        }

        return $multiplos;
    }
}