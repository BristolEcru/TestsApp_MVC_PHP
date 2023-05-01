<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<body>
    <div class="container mt-4">
        <h1>Edit Class</h1>
        <form action="<?= site_url('classes') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="class_name">Class Name:</label>
                <input type="text" class="form-control" id="class_name" name="class_name"
                    value="<?= $class['class_name'] ?>">
            </div><br>
            <hr>
            <button type="submit" class="btn btn-primary">Update Class</button>
        </form>
    </div>


    <?= $this->endSection() ?>