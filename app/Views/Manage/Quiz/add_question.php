<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>
<div class="container mt-8  col-md-8">">
    <h1>Dodaj nowe pytanie</h1>
    <hr><br>

    <?php if (isset($validation)): ?>
    <div style="color: red;">
        <?php echo $validation->listErrors(); ?>
    </div>
    <?php endif; ?>

    <?php echo form_open('QuizzesToLoad/addQuestion'); ?>
    <label for="question_text">Treść pytania:</label>


    <input type="text" name="question_text" id="question_text" required class="form-control"><br><br><br>

    <label for="choice_text[]">Odpowiedź 1:</label>
    <input type="radio" name="correct_choice" value="0" required>
    <input type="text" name="choice_text[]" id="choice_text[]" required class="form-control"><br>


    <label for="choice_text[]">Odpowiedź 2:</label>
    <input type="radio" name="correct_choice" value="1" required>
    <input type="text" name="choice_text[]" id="choice_text[]" required class="form-control"><br>


    <label for="choice_text[]">Odpowiedź 3:</label>
    <input type="radio" name="correct_choice" value="2" required>
    <input type="text" name="choice_text[]" id="choice_text[]" required class="form-control"><br>


    <label for="choice_text[]">Odpowiedź 4:</label>
    <input type="radio" name="correct_choice" value="3" required>
    <input type="text" name="choice_text[]" id="choice_text[]" required class="form-control"><br>

    <br>
    <input class="btn-info" type="submit" value="Dodaj pytanie">
    <?php echo form_close(); ?>
</div>

<?= $this->endSection() ?>