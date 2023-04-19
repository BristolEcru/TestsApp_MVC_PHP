<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User</h1>
    <form action="<?= site_url('user/update'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?= $user['email']; ?>">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?= $user['password']; ?>">
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user['name']; ?>">
        <br>
        <label for="student_class_id">Student Class ID:</label>
        <input type="text" name="student_class_id" id="student_class_id" value="<?= $user['student_class_id']; ?>">
        <br>
        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" id="user_type" value="<?= $user['user_type']; ?>">
        <br>
        <label for="quiz_assigned_id">Quiz Assigned ID:</label>
        <input type="text" name="quiz_assigned_id" id="quiz_assigned_id" value="<?= $user['quiz_assigned_id']; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
</body>

</html>