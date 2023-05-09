<?php $this->extend('layout\studentlayout') ?>


<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <?php
            $numberOfCorrectAnswers = calculateCorrectAnswers($quiz, $choices, $result, $quiz_name);
            ?>
            <h3>Your result is:
                <?php echo "$numberOfCorrectAnswers points" ?>
            </h3>
            <hr>
            <h4>
                <?php

                echo "<p>You answered $numberOfCorrectAnswers questions correctly.</p>";
                ?>
            </h4>
            <br>

            <?php $pointearned = 0; ?>


            <div class="form-group">
                <?php foreach ($quiz as $que) { ?>
                    <?php $choicessetfor1que = array(); ?>
                    <?php $choicesids = array(); ?>
                    <?php $chosenanswer = ""; ?>
                    <?php $correctanswer = ""; ?>
                    <label for="question<?= $que->question_number ?>" <h5 class="card-title">
                        <hr> <br>
                        <?= $que->question_text ?>
                        </h5>
                    </label>

                    <?php foreach ($choices as $choice) { ?>
                        <?php if ($choice->question_number == $que->question_number) {

                            if ($choice->choice_is_correct == "1") {
                                $correctanswer = $choice->choice_text;
                            }
                            if ($result[$choice->question_number] == $choice->choice_id) {
                                $chosenanswer = $choice->choice_text;
                            }

                            $choicessetfor1que[] = $choice; ?>
                        <?php } ?>
                    <?php } ?>

                    <?php
                    foreach ($choicessetfor1que as $row) {
                        if ($chosenanswer == $row->choice_text && $chosenanswer == $correctanswer) {
                            ?>
                            <p><span style="background-color:#ADFFB4">You gave the correct answer:
                                    <?= $chosenanswer ?>
                                </span>
                            </p>
                            <?php
                            break;
                        } elseif ($chosenanswer == $row->choice_text && $chosenanswer != $correctanswer) {
                            ?>
                            <p><span style="background-color:#FF9C9E"> You gave the incorrect answer:
                                    <?= $chosenanswer ?>
                                </span></p>
                            <p><span style="background-color:#ADFFB4">The right answer is:
                                    <?= $correctanswer ?>
                                </span></p>
                            <?php
                            break;
                        }
                    }
                    ?>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?php

function calculateCorrectAnswers($quiz, $choices, $result)
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
        'points' => $points,
        'max_points' => $max_points,
    ];


    return $correctAnswers;
}


?>