<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center ">
    <div class="col-md-8 mt-5 shadow-lg p-3 mb-5 bg-body rounded    ">
        <div class="card bg-dark text-white mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <br>
                <h1 class="text-center">
                    <?= $user_name ?>
                </h1>
                <br>
                <h3 class="text-center"></h3>
                <hr class="mb-4">
                <h2 class="text-center">
                    Teacher Account <span class="fas fa-coffee"></span></i></h2>
            </div>
            <br>
        </div>
    </div>
</div>



</div>
</div>
</div>
<?= $this->endSection() ?>