<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container col-md-4 mt-4">
    <h1>Add New Class</h1>
    <form method="POST" action="<?php echo route_to('addclass'); ?>">

        <?= csrf_field() ?>
        <div class="form-group">
            <label for="class_name">Class Name:</label>
            <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
</div>

<?= $this->endSection() ?>