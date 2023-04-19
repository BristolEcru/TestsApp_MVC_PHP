<!DOCTYPE html>
<html>

<head>
    <title>Java Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <br>
        <br>
        <h1>Java Quiz</h1>
        <form method="" action="<?php echo base_url(); ?>home.php/Questions/quizzesToChose">
            <div class="form-group">
                <label for="question1">
                    <hr> <br>

                    <h4>1. What is Java?</h4> <br>
                </label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="q1a" name="question1" class="custom-control-input" value="a">
                    <label class="custom-control-label" for="q1a">A programming language</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="q1b" name="question1" class="custom-control-input" value="b">
                    <label class="custom-control-label" for="q1b">An operating system</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="q1c" name="question1" class="custom-control-input" value="c">
                    <label class="custom-control-label" for="q1c">A web browser</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="q1d" name="question1" class="custom-control-input" value="d">
                    <label class="custom-control-label" for="q1d">A database</label>
                </div>

            </div> <br>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>