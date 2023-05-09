<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container col-md-4 mt-4">
    <p><strong>
            Are you sure you want to delete the class?
        </strong></p>
    <form method="POST" action="<?php echo route_to('deleteclass'); ?>">

        <?= csrf_field() ?>
        <div class="form-group block d-flex justify-content-between">

            <button type="submit" class="btn btn-danger">Yes</button>

            <input type="hidden" class="form-control ml-auto" id="class_id" name="class_id" value="<?= $class_id ?>"
                required>
            <button class="btn btn-primary">No</button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>