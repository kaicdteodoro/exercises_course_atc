<?php

namespace App\Service;

class CalculadoraService
{
    public function sum($num1, $num2): array
    {
        try {
            $result = $num1 + $num2;
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Erro ao fazer soma'
            ];
        }

        return [
            'success' => true,
            'message' => 'Soma feita com sucesso',
            'data' => $result
        ];
    }

    public function div($num1, $num2)
    {
        try {
            if (!$num2) {
                return [
                    'success' => false,
                    'message' => 'Divisão por zero'
                ];
            }
            $result = $num1 / $num2;
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => 'Erro ao fazer div'
            ];
        }
        return [
            'success' => true,
            'message' => 'Div feita com sucesso',
            'data' => $result
        ];
    }
}
