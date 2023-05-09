<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>
<div class="col-md-4 container mt-4"><br>
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo route_to('assignquiztostudent'); ?>">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">

        <div class="form-group">
            <h3> <label for="class_id">Which quiz do you want to assign to the student?</label></h3>

        </div>
        <div class="form-group"><br>
            <label for="quiz_id">Quiz:</label>
            <select name="quiz_id">
                <?php foreach ($quizzes as $quiz): ?>
                    <option value="<?= $quiz->quiz_id ?>" name="quiz_id"><?= $quiz->quiz_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <hr>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Assign quiz to class</button>
    </form>

</div>
<?= $this->endSection() ?>