<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Classes</h1><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Class Name</th>
                <th scope="col">Quiz Assigned</th>
                <th scope="col">Students</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <div>
                <a class="btn btn-warning " type="button" id="" href="<?php echo route_to('quiztoclassform'); ?>">
                    Assign new quiz to the class
                </a>
            </div> <br>

            <?php
            foreach ($classes['classes'] as $class_id => $class_data): ?>

                <tr>
                    <th scope="row">
                        <?= $class_id; ?>
                    </th>
                    <td>

                        <?= $class_data['class_name']; ?>

                    </td>

                    <td>
                        <?php if (!empty($class_data['quizzes'])): ?>
                            <?= implode('<br>', $class_data['quizzes']); ?>
                        <?php else: ?>
                            No quiz assigned
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($class_data['students'])): ?>
                            <?= implode(', ', $class_data['students']); ?>
                        <?php else: ?>
                            No student enrolled
                        <?php endif; ?>
                    </td>

                    <td>
                        <a href="<?= site_url('classes/edit/' . $class_id); ?>" class="btn btn-primary btn-sm mr-2">Edit</a>
                        <a href="<?= site_url('classes/delete/' . $class_id); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.dropdown-item').on('click', function (event) {
                    event.preventDefault();
                    var quizId = $(this).data('quiz_id');
                    3
                    var classId = $(this).closest('tr').find('th').text();
                    $.post('<?php echo route_to('assignquiztoclass'); ?>', {
                        quiz_id: quizId,
                        class_id: classId
                    }, function (data) {
                        alert('Quiz assigned successfully!');
                    }).fail(function () {
                        alert('Error assigning quiz!');
                    });
                });
            });
        </script>

    </table>
</div>


<?= $this->endSection() ?>