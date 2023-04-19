<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="\Home">Quiz App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="\Home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="\QuizzesToLoad\quizzestoload">Quizzes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Results</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <hr>
                <?php
                $numberOfCorrectAnswers = calculateCorrectAnswers($quiz, $choices, $result);
                ?>
                <h1>Your result is:
                    <?php echo "$numberOfCorrectAnswers points" ?>
                </h1>
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
                                break; // przerwij iterację pętli
                            } elseif ($chosenanswer == $row->choice_text && $chosenanswer != $correctanswer) {
                                ?>
                    <p><span style="background-color:#FF9C9E"> You gave the incorrect answer:
                            <?= $chosenanswer ?>
                        </span></p>
                    <p><span style="background-color:#ADFFB4">The right answer is:
                            <?= $correctanswer ?>
                        </span></p>
                    <?php
                                break; // przerwij iterację pętli
                            }
                        }
                        ?>

                    <?php } ?>
                </div>
            </div>



            <footer class="bg-light text-center py-3">
                <p>&copy; 2023 Quiz App</p>
            </footer>

            <!-- jQuery and Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNjn"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmV>
    </body></html><?php
    function calculateCorrectAnswers($quiz, $choices, $result)
    {
        $correctAnswers = 0;

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

        return $correctAnswers;
    }
    ?>