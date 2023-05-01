<?php $this->extend('layout\studentlayout') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4"><br>
            <h4>Hello
                <?= $student_name ?>
            </h4>
            <br>

            <hr><br>
            <h4>Choose a quiz to do:</h4>


            <br>
            <?php foreach ($quizzes as $row) { ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $row->quiz_name ?>
                        </h5>
                        <a href="<?php echo route_to('quiztoload', $row->quiz_id); ?>" class="btn btn-primary">Start
                            Quiz</a>

                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</div>

<?= $this->endSection() ?>