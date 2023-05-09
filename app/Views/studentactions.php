<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <hr>
            <h2>Student</h2>
            <h1>
                <?= $user_data['name'] ?>
            </h1>
            <hr><br>
            <h2> Index nr
                <?= $user_id ?>
            </h2>
            <br>
            <h2> Class
                <?= isset($class_data['class_name']) ? $class_data['class_name'] : '-' ?>
            </h2>
            <hr><br>

            <br>


            <table>
                <thead>

                    <div class="d-flex flex-column">
                        <div class="block">
                            <form action="<?php echo route_to('assignquiztostudentform'); ?>" method="POST">
                                <button type="submit" class="btn btn-warning btn-lg btn-block mb-3" type="button" id="">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    Assign individual quiz to the student
                                </button>
                            </form>
                        </div>
                        <div class="block">
                            <form action="<?php echo route_to('changeclassform'); ?>" method="POST">
                                <button type="submit" class="btn btn-primary btn-lg btn-block mb-3" type="button" id="">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <?php $class_name = isset($class_data['class_name']) ? $class_data['class_name'] : '-' ?>
                                    <input type="hidden" name="class_name" value="<?= $class_name ?>">
                                    Enrol student to new class (or change class)
                                </button>
                            </form>
                        </div>
                        <div class="block">
                            <form action="<?php echo route_to('removestudentfromclass'); ?>" method="POST">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block mb-3" type="button"
                                    id="">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <?php $class_name = isset($class_data['class_name']) ? $class_data['class_name'] : '-' ?>
                                    <input type="hidden" name="class_name" value="<?= $class_name ?>">
                                    Remove Student from the class
                                </button>
                            </form>
                        </div>
                        <div class="block">
                            <form action="<?php echo route_to('deletestudent'); ?>" method="POST">
                                <button type="submit" class="btn btn-danger btn-lg btn-block mb-3" type="button" id="">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    Delete Student
                                </button>
                            </form>
                        </div>
                    </div>



                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection() ?>