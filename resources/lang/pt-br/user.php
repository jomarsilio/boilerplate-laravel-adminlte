<?php

return [

    /*
      |--------------------------------------------------------------------------
      | Usuário
      |--------------------------------------------------------------------------
 */

    'profile' => 'Perfil',

    'field' => [
        'username' => 'Usuário (login)',
        'password' => 'Senha',
        'name' => 'Nome completo',
        'email' => 'E-mail',
        'current_password' => 'Senha atual',
        'new_password' => 'Nova senha',
        'confirm_password' => 'Confirme a nova senha',
        'active' => 'Ativo',
        'role' => 'Papel',
        'is_active' => 'Usuário ativo',
        'last_access' => 'Último acesso',
    ],
    
    'text' => [
        'to_change_password' => 'Para alterar a senha de acesso, preencha os campos abaixo.',
        'select_user_role' => 'Selecione o papel',
    ],

    'response' => [
        'error' => [
            'incorrect_password' => 'A senha informada está incorreta.'
        ],
        'success' => [
            'profile_changed' => 'Perfil alterado com sucesso.',
            'create_user_account' => 'Usuário criado com sucesso.',
            'update_user_account' => 'Usuário alterado com sucesso.',
        ],
    ],
];
