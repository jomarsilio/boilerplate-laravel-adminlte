<?php

namespace App\Services;

abstract class Service
{
    /**
     * Construtor da classe.
     */
    public function __construct()
    {
        //
    }
    
    /**
    * Resposta padrão do serviço.
    *
    * @param array $data
    * @return object
    */
    public function response($data = [])
    {
        // Por default o error é sempre vazio.
        $default = ['error' => null];
        
        // Concatena com os dados.
        $data = array_merge($default, $data);
        
        // Converte para objeto.
        $data = (object) $data;
        
        return $data;
    }
}
