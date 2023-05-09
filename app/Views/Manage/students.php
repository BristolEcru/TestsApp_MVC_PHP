<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>


<div class="container mt-4">
    <h2>Students assignments</h2><br>
    <table class="table">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Class Quizzes</th>
                    <th>Individual Quizzes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $name => $student): ?>
                    <tr>
                        <td>
                            <?= $name ?>
                        </td>
                        <td>
                            <?= $student['class_name'] ?>
                        </td>

                        <td>
                            <?php foreach ($student['class_quizzes'] as $class_quiz): ?>

                                <?php foreach ($class_quiz['quiz_names'] as $quiz_name): ?>
                                    <?= $quiz_name ?><br>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($student['individual_quizzes'] as $quiz_name): ?>
                                <?= $quiz_name ?><br>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <div class="block d-flex justify-content-between">
                                <form action="<?php echo route_to('editstudent'); ?>" method="POST">
                                    <button type="submit" class=" btn-primary mr-3" type="button" id="">
                                        <input type="hidden" name="user_id" value=" <?= $student['user_id'] ?>">
                                        Edit Student
                                    </button>
                                </form>
                                <form action="<?php echo route_to('deletestudent'); ?>" method="POST">
                                    <button type="submit" class="btn-danger mr-3" type="button" id="">
                                        <input type="hidden" name="user_id" value="<?= $student['user_id'] ?>">
                                        Delete Student
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>






</div>
<script>
    $(document).ready(function () {
        $('.dropdown-item').on('click', function (event) {
            event.preventDefault();
            var quizId = $(this).data('quiz_id');
            var classId = $(this).data('class_id');

            $.ajax({
                method: 'post',
                url: "<?php echo base_url('assignquiztoclass'); ?>"
            type: 'POST',
                data: {
                    quiz_id: quizId,
                    class_id: classId
                },
                success: function (data) {
                    // tutaj możesz dodać kod, który zostanie wykonany po udanym dodaniu quizu do klasy
                    alert('Quiz assigned successfully!');
                },
                error: function (xhr, status, error) {
                    // tutaj możesz dodać kod, który zostanie wykonany w przypadku błędu
                    alert('Error assigning quiz!');
                }
            });
        })
    });
</script>

<?= $this->endSection() ?>