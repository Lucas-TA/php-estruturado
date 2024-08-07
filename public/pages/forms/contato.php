<?php
require "../../../bootstrap.php";

    $validate = validate([
        'name' => 's',
        'email' => 'e',
        'subject' => 's',
    ]);

    dd($validate -> name);