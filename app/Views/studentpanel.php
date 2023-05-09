<?php $this->extend('layout\studentlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <h2>Student</h2>
            <h1>
                <?= $user_name ?>
            </h1>
            <hr><br>
            <h2> Index nr
                <?= $user_id ?>
            </h2>
            <br>
            <hr><br>
            <h4>Insta Quiz for Students</h4><br>
            <br>


            <table>
                <thead>

                    <div class="row d-flex justify-content-between">
                        <div class="col ">
                            <a href="<?php echo route_to('myquizzes', $user_id); ?>"
                                class="btn btn-lg btn-warning w-100" type="submit">My quizzes</a>

                        </div>
                        <div class="col">
                            <a href="<?php echo route_to('myresults', $user_id); ?>"
                                class="btn btn-lg btn-primary w-100" type="submit">My results</a>
                        </div>
                    </div>


                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection() ?>