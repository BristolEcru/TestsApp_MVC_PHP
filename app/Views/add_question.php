<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dodaj nowe pytanie</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quiz Maker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/students">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quizzes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Class List -->
    <div class="container mt-4">
        <h1>Dodaj nowe pytanie</h1>

        <?php if (isset($validation)): ?>
        <div style="color: red;">
            <?php echo $validation->listErrors(); ?>
        </div>
        <?php endif; ?>

        <?php echo form_open('QuizzesToLoad/addQuestion'); ?>
        <label for="question_text">Treść pytania:</label>
        <input type="text" name="question_text" id="question_text" required><br><br>

        <label for="choice_text[]">Odpowiedź 1:</label>
        <input type="text" name="choice_text[]" id="choice_text[]" required>
        <input type="radio" name="correct_choice" value="0" required><br>

        <label for="choice_text[]">Odpowiedź 2:</label>
        <input type="text" name="choice_text[]" id="choice_text[]" required>
        <input type="radio" name="correct_choice" value="1" required><br>

        <label for="choice_text[]">Odpowiedź 3:</label>
        <input type="text" name="choice_text[]" id="choice_text[]" required>
        <input type="radio" name="correct_choice" value="2" required><br>

        <label for="choice_text[]">Odpowiedź 4:</label>
        <input type="text" name="choice_text[]" id="choice_text[]" required>
        <input type="radio" name="correct_choice" value="3" required><br>

        <br>
        <input type="submit" value="Dodaj pytanie">
        <?php echo form_close(); ?>

        <footer class="bg-light text-center py-3">
            <p>&copy; 2023 Quiz App</p>
        </footer>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNjn" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </div>