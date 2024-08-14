<?php
require "../../../bootstrap.php";

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

if (isEmpty()) {
    flash('message', 'Fill up all fields');

    return redirect("update_user&id=".$id);
}

$validate = validate([
    'firstName' => 's',
    'lastName' => 's',
    'email' => 'e',
]);

$updated = update('users', $validate, ['id', $id]);

if ($updated)
{
    flash('message', 'Successfully updated', 'success');

    return redirect("update_user&id=".$id);
}
    flash('message', 'An error occurred while updating the information');
    redirect("update_user&id=".$id);