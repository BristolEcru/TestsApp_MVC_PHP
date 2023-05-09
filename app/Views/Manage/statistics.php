<?php $this->extend('layout\teacherlayout') ?>

<?= $this->section('content') ?>


<div class="container mt-4">
    <h2>Students statistics</h2><br>


    <table class="table">
        <thead>
            <tr>

                <th>Quiz Name</th>

                <th>Assigned to:</th>
                <th>Points</th>
                <th>Max Points</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statistics as $result): ?>
                <tr>

                    <td>
                        <?php echo $result['quiz_name']; ?>
                    </td>
                    <td>
                        <?php echo $result['quiz_assigned_student_id']; ?>
                    </td>

                    <td>
                        <?php echo $result['points']; ?>
                    </td>
                    <td>
                        <?php echo $result['max_points']; ?>
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