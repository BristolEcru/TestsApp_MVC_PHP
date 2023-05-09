<?php $this->extend('layout\teacherlayout') ?>
<?= $this->section('content') ?>
<div class="col-md-4 container mt-4"><br>
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo route_to('changeclass'); ?>">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">

        <div class="form-group">
            <h3> <label for="">Current class
                    <?= $class_name ?>
                </label></h3>
            <h3> <label for="">Which class do you want to assign for the student?</label></h3>

        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Choose a Class</h5>
                <div class="form-group">
                    <label for="class_id">Classes:</label>
                    <select name="class_id" class="form-control">
                        <?php foreach ($classes as $class): ?>
                            <option value="<?= $class['class_id'] ?>" name="quiz_id"><?= $class['class_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Assign student to class</button>
    </form>

</div>
<?= $this->endSection() ?>