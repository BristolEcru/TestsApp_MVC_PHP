<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>


<div class="container mt-4">
    <h2>Students individual assignment</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Name</th>

                <th>Assigned Quizzes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $className => $classStudents): ?>

                <tr>
                    <td colspan="5"><strong>
                            <?php echo $className; ?>
                        </strong></td>
                </tr>
                <?php foreach ($classStudents as $student): ?>
                    <tr>
                        <td>
                            <?php echo $student['name']; ?>
                        </td>
                        <td>
                            <?php echo $student['email']; ?>
                        </td>
                        <td>
                            <?php echo $student['quiz_name']; ?>
                        </td>
                        <td>

                            <a href="<?php echo base_url('editstudent/' . $student['id']); ?>">Edit</a>
                            <a href="<?php echo base_url('deletestudent/' . $student['id']); ?>">Delete</a>
                            <a href="<?php echo base_url('assignquiztostudent/' . $student['id']); ?>">Assign Quiz to
                                Student</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
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