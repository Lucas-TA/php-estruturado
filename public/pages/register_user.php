<?=get('message'); ?>
<form action="../pages/forms/register_user.php" method="post">

    <div class="form-group">
        <label for="registerFirstName" class="form-text">First Name:</label>
        <input type="text" name="firstName" id="registerFirstName" placeholder="First Name" class="form-control">
    </div>

    <div class="form-group">
        <label for="registerLastName" class="form-text">Surname:</label>
        <input type="text" name="lastName" id="registerLastName" placeholder="Last name" class="form-control">
    </div>

    <div class="form-group">
        <label for="registerEmail" class="form-text">Email:</label>
        <input type="email" name="email" id="registerEmail" placeholder="e-mail" class="form-control">
    </div>

    <div class="form-group">
        <label for="registerPassword" class="form-text">Password:</label>
        <input type="password" name="password" id="registerPassword" placeholder="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Send</button>
    <a href="?page=home" class="btn btn-primary">Back</a>
</form>