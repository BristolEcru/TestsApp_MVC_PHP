<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <h1>Teacher Account</h1>
            <hr><br>
            <h4>

                <?= $user_name ?>
            </h4>

            <br>
            <!-- View: questions_list.php -->


            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>



        </div>
    </div>
</div>
<?= $this->endSection() ?>