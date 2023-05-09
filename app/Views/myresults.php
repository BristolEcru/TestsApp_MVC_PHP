<?php $this->extend('layout\studentlayout') ?>

<?= $this->section('content') ?>


<div class="container my-5">
    <h2>Your last achievements</h2><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Quiz Name</th>
                <th>Your score</th>
                <th>Max score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lastResults as $result) { ?>
                <tr>
                    <td>
                        <?= $result['quiz_name'] ?>
                    </td>
                    <td>

                        <?= $result['points'] ?>
                    </td>
                    <td>

                        <?= $result['max_points'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ?>