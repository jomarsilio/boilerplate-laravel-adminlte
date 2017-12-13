<?php

/*
  |--------------------------------------------------------------------------
  | Regras para validação dos cadastros.
  |--------------------------------------------------------------------------
 */
return [

    // Usuários
    'user' => [
        'name' => [
            'max' => 100,
        ],
        'email' => [
            'max' => 100,
        ],
        'username' => [
            'max' => 50,
        ],
        'password' => [
            'max' => 15,
            // Expressão regular (sem espaço em branco no início e fim da string)
            'regex'     => '/^\S.+\S$/',
            'jsRegex'   => '^\\S.+\\S$',
        ],
    ],

    // Papéis (grupos)
    'role' => [
        'name' => [
            'max' => 30,
        ],
        'displayName' => [
            'max' => 100,
        ],
        'description' => [
            'max' => 255,
        ],
    ],
];
