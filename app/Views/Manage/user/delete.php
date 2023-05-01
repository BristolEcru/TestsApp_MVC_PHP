<!DOCTYPE html>
<html>

<head>
    <title>Delete User</title>
</head>

<body>
    <h1>Delete User</h1>
    <p>Are you sure you want to delete the user <strong>
            <?= $user['name']; ?>
        </strong>?</p>
    <form action="<?= site_url('user/delete/' . $user['id']); ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Yes</button>
        <a href="<?= site_url('user/index'); ?>">No</a>
    </form>
</body>

</html>