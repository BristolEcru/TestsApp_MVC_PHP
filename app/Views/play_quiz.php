<?php $this->extend('layout\studentlayout') ?>

<?= $this->section('content') ?>
<div class="container"><br>
    <h1>
        <?= $quiz_name ?> quiz
    </h1>
    <form action="<?php echo route_to('checkresult'); ?>" method="post">
        <div class="form-group">

            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id->quiz_id ?>">
            <input type="hidden" name="assignment_id" value="<?php echo $assignment_id ?>">



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

<?php

function calculateCorrectAnswers($quiz, $choices, $result, $quizname, $student_id, $quiz_assigned_id)
{
    $correctAnswers = 0;
    $max_points = count($quiz);

    foreach ($quiz as $que) {
        $isQuestionCorrect = true;

        foreach ($choices as $choice) {
            if ($choice->question_number == $que->question_number && $choice->choice_is_correct == 1) {
                if (!isset($result[$que->question_number]) || $result[$que->question_number] != $choice->choice_id) {
                    $isQuestionCorrect = false;
                    break;
                }
            }
        }

        if ($isQuestionCorrect) {
            $correctAnswers++;
        }
    }

    $points = $correctAnswers;
    $data = [
        'student_id' => $student_id,
        'quiz_assigned_id' => $quiz_assigned_id,
        'points' => $points,
        'max_points' => $max_points,
        'quiz_name' => $quizname
    ];
    $myresultsmodel = new MyResultsModel();
    $myresultsmodel->add_result($student_id, $quiz_assigned_id, $points, $max_points, $quizname);

    return $correctAnswers;
}


?>