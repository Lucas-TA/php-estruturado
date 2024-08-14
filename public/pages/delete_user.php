<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//dd($id);
$deleted = delete('users', 'id', $id);

if ($deleted) {
    return redirect();
}
flash('message', 'An error occurred, try again.');
redirectToHome();