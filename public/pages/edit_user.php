<?=get('message'); ?>

<?php
    $user = find('users', 'id', $_GET['id']);

?>
<form action="../pages/forms/edit_user.php" method="post">

    <div class="form-group">
        <label for="registerFirstName" class="form-text">First Name:</label>
        <input type="text" name="firstName" id="registerFirstName" placeholder="First Name" class="form-control" value="<?= $user['firstName'] ?>">
    </div>

    <div class="form-group">
        <input type="hidden" name="id" value="<?=$user['id']?>"
    </div>

    <div class="form-group">
        <label for="registerLastName" class="form-text">Surname:</label>
        <input type="text" name="lastName" id="registerLastName" placeholder="Last name" class="form-control" value="<?= $user['lastName']?>">
    </div>

    <div class="form-group">
        <label for="registerEmail" class="form-text">Email:</label>
        <input type="email" name="email" id="registerEmail" placeholder="e-mail" class="form-control" value="<?= $user['email']?>">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>