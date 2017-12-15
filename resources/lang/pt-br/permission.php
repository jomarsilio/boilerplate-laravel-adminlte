<?php

return [

    'field' => [
        'action' => 'Ação',
        'permission' => 'Permissão',
    ],

    // Grupos de permissões
    'group' => [
        'admin_user' => 'Usuários',
        'admin_user_role' => 'Papéis (grupos)',
        'admin_user_role_permission' => 'Permissões',
    ],

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
                    'create' => 'Formulário de cadastro de novos papéis.',
                    'store' => 'Grava os dados de um novo papel.',
                    'edit' => 'Formulário de alteração dos dados de um papel.',
                    'update' => 'Altera os dados de um papel.',
                    'destroy' => 'Remove os dados de um papel.',

                    // Permissões de acesso
                    'permission' => [
                        'index' => 'Lista todas as permissões.',
                        'update' => 'Altera o relacionamento de uma permissão com um papel.',
                    ]
                ],
            ]
        ],
    ],
];
