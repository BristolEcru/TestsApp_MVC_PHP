<div class="container mt-4">
    <h1>Add New Class</h1>
    <form action="<?= site_url('class/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="class_name">Class Name:</label>
            <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
</div>