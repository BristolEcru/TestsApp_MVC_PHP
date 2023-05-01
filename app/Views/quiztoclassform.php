<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>
<div class="col-md-4 container mt-4"><br>
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo route_to('assignquiztoclass'); ?>">
        <div class="form-group">
            <label for="class_id">Class:</label>
            <select class="form-control" id="class_id" name="class_id">
                <?php foreach ($classes['classes'] as $class_id => $class_data): ?>
                    <option value="<?= $class_id ?>"><?= $class_data['class_name'] ?></option>
                <?php endforeach; ?>


            </select>
        </div>
        <div class="form-group"><br>
            <label for="quiz_id">Quiz:</label>
            <select class="form-control" id="quiz_id" name="quiz_id">
                <?php foreach ($classes['quizzes'] as $quiz): ?>
                    <option value="<?= $quiz['quiz_id'] ?>"><?= $quiz['quiz_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <hr>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Assign quiz to class</button>
    </form>
</div>
<?= $this->endSection() ?>