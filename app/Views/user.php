<div class="container mt-4">
    <h1>Students</h1>
    <?php foreach ($students as $class_name => $class_students): ?>
    <h2>
        <?= $class_name ?>
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Quizzes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            Users
        </tbody>
    </table>
    <?php endforeach; ?>
</div>