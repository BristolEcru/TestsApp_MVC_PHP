<?php $this->extend('layout\studentlayout') ?>

<?= $this->section('content') ?>
<div class="container"><br>
    <h1>
        <?= $quizname->quiz_name ?> quiz
    </h1>
    <form action="<?php echo route_to('checkresult'); ?>" method="post">
        <div class="form-group">

            <input type="hidden" name="quiz_id" value="<?= $quiz_id->quiz_id ?>">

            <?php shuffle($quiz); ?>

            <?php foreach ($quiz as $que) { ?>
                <label for="question<?= $que->question_number ?>">
                    <h5 class="card-title">
                        <hr> <br>
                        <?= $que->question_text ?>
                    </h5>
                </label>
                <?php shuffle($choices); ?>
                <?php foreach ($choices as $choice) { ?>
                    <?php if ($que->question_number == $choice->question_number) { ?>
                        <div class="custom-control custom-radio">

                            <input type="radio" id="choice<?= $choice->choice_id ?>" name="question<?= $que->question_number ?>"
                                class="custom-control-input" value="<?= $choice->choice_id ?>" required>
                            <label class="custom-control-label" for="choice<?= $choice->choice_id ?>">
                                <?= $choice->choice_text ?>
                            </label>
                            <!-- <input type="hidden" name="choice<?= $que->question_number ?>"
                        value="<?= $choice->choice_is_correct ?>"> -->
                            <input type="hidden" name="<?= $que->question_number ?>" value="<?= $que->question_number ?>">
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div><br>
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?= $this->endSection() ?>