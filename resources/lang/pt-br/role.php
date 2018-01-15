<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Papéis (grupos) de usuário
      |--------------------------------------------------------------------------
 */

    'field' => [
        'name' => 'Papel',
        'short_name' => 'Identificador',
        'description' => 'Descrição',
        'users' => 'Usuários',
        'manage_permissions' => 'Gerenciar permissões',
    ],

    'text' => [
        'role_definition' => 'Um papel é uma coleção de permissões definida para todo o sistema que você pode atribuir a usuários específicos em contexto específicos.',
        'confirm_destroy' => 'Você tem certeza que deseja excluir o papel <b><i>:name</i></b>?',
    ],

    'response' => [
        'error' => [
            'destroy' => 'O papel <b><i>:name</b></i> não pode ser removido porque existem usuários relacionados.',
        ],
        'success' => [
            'create' => 'Papel criado com sucesso.',
            'update' => 'Papel alterado com sucesso.',
            'destroy' => 'Papel removido com sucesso.',
        ],
    ],
];
