<?php

require "../../../bootstrap.php";

if (isEmpty()) {
    flash('message', 'Prencha todos os campos');

    return redirect("register_user");
}

$validate = validate([
    'firstName' => 's',
    'lastName' => 's',
    'email' => 'e',
    'password' => 's',
]);

$registered = create('users', $validate);

if ($registered)
{
    flash('message', 'Cadastro realizado com sucesso', 'success');

    return redirect("register_user");
} else {
    flash('message', 'Erro ao cadastrar', 'danger');
    return redirect("register_user");
}