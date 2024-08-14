<a href="?page=register_user" class="btn btn-dark">Register user</a>
<h2>Home Page</h2>
<?= get('message') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $users = listAll('users');
            foreach ($users as $user):?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['firstName']; ?></td>
                <td><?= $user['lastName']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="?page=update_user&id=<?=$user['id'];?>" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a href="?page=delete_user&id=<?=$user['id'];?>" class="btn btn-danger">X</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>