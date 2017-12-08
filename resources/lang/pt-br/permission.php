<?php

return [

    'route' => [

        // Configurações da aplicação
        'admin' => [

            'user' => [
                // Usuários
                'index' => 'Lista as contas de usuários.',
                'create' => 'Formulário de cadastro de novos usuários.',
                'store' => 'Grava os dados de um novo usuário.',
                'edit' => 'Formulário de alteração dos dados de um usuário.',
                'update' => 'Altera os dados de um usuário.',

                // Papéis de usuário (grupos)
                'role' => [
                    'index' => 'Lista os papéis cadastrados.',
                ],
            ]
        ],
    ],
];
