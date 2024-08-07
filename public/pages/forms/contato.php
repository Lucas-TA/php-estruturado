<?php
require "../../../bootstrap.php";

    if (isEmpty())
    {
        flash('message', 'Prencha todos os campos');

        return redirect("contato");
    }

    $validate = validate([
        'name' => 's',
        'email' => 'e',
        'subject' => 's',
        'message' => 's',
    ]);

    /**
     * Defining email data
     * @var $data
     */
    $data = [
        'from' => $validate->email,
        'to'=> 'lucasteixeira.ta@gmail.com',
        'subject' => $validate->subject,
        'message' => $validate->message,
    ];
    if (send($data))
    {
        flash('message', 'Mensagem enviada com sucesso', 'success');
        return redirect("contato");
    }