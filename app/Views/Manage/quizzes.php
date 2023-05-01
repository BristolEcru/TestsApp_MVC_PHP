<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>


<div class="container mt-4">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <a href="<?php echo route_to('questionbank'); ?>" class="btn btn-warning btn-lg">Make new quiz</a>
        </div>

        <div class="col-md-4 text-right">
            <h4>Edit quiz:</h4>
            <br>
            <?php foreach ($quizzes as $row) { ?>
                <div class="card mb-3">
                    <div class="card-body ">
                        <h5 class="card-title m-2">
                            <?= $row->quiz_name ?>
                            <hr>
                        </h5>
                        <a href="./edit_quiz/<?= $row->quiz_id ?>" class="btn btn-primary">Edit Quiz</a>
                        <a href="./edit_quiz/<?= $row->quiz_id ?>" class="btn btn-danger">Delete Quiz</a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>




<?= $this->endSection() ?>