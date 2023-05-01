<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
</head>

<body>
    <h1>Create User</h1>
    <form action="<?= site_url('user/store'); ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="student_class_id">Student Class ID:</label>
        <input type="text" name="student_class_id" id="student_class_id">
        <br>
        <label for="user_type">User Type:</label>
        <input type="text" name="user_type" id="user_type">
        <br>
        <label for="quiz_assigned_id">Quiz Assigned ID:</label>
        <input type="text" name="quiz_assigned_id" id="quiz_assigned_id">
        <br>
        <input type="submit" value="Create">
    </form>
</body>

</html>