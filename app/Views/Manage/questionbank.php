<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-6">
    <form action="<?= base_url('/teacher/quizzes/createquiz') ?>" method="post">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a class="btn btn-success" href="<?php echo route_to('addnewquestions') ?>">ADD NEW QUESTIONS</a>
                <hr>
                <div class="form-group">
                    <h4>Make new quiz</h4><br>
                    <p>1. Select questions from the questionbank</p>
                    <label for="quiz-name">2. Name new quiz:</label>
                    <input type="text" class="form-control" id="quiz-name" name="quiz_name" required><br>
                    <div class="block">
                        <label>3. </label>
                        <button type="submit" class="btn btn-primary">Create new quiz from selected questions</button>
                    </div>
                </div>


            </div>
            <div class="col-md-8">


                <table class="table">
                    <thead>
                        <tr>
                            <th>Select question</th>
                            <th>Question number</th>
                            <th>Question text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $question): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_questions[]"
                                        value="<?= $question->question_number ?>">

                                </td>
                                <td>
                                    <?= $question->question_number ?>
                                </td>
                                <td class=" col-md-8">
                                    <?= $question->question_text ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-warning"
                                                href="<?= site_url('/admin/edit_question/' . $question->question_number) ?>">...</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form
                                                action="<?= site_url('/quizzestoload/deletequestion/' . $question->question_number) ?>"
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this question?')">
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

        </div>
    </form>
</div>



<?= $this->endSection() ?>