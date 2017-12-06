<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Regras para validação dos cadastros.
      |--------------------------------------------------------------------------
     */
    'user' => [
        'name' => [
            'max' => 100,
        ],
        'email' => [
            'max' => 100,
        ],
        'password' => [
            'max' => 15,
            // Expressão regular (sem espaço em branco no início e fim da string)
            'regex'     => '/^\S.+\S$/',
            'jsRegex'   => '^\\S.+\\S$',
        ],
    ],
];
