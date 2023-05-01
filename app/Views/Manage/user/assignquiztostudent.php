<?= $this->extend('layouts/teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Assign Quiz to Student</h2>
    <hr>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <form method="post" action="<?= site_url('/assignquiztostudent') ?>">
        <input type="hidden" name="student_id" value="<?= $student_id ?>">

        <div class="form-group">
            <label for="quiz_id">Select Quiz:</label>
            <select name="quiz_id" id="quiz_id" class="form-control">
                <?php foreach ($quizzes as $quiz): ?>
                    <option value="<?= $quiz['quiz_id'] ?>"><?= $quiz['quiz_title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Quiz</button>
    </form>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Quiz Title</th>
                <th>Assigned Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assigned_quizzes as $assigned_quiz): ?>
                <tr>
                    <td>
                        <?= $assigned_quiz['quiz_title'] ?>
                    </td>
                    <td>
                        <?= $assigned_quiz['assigned_date'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>