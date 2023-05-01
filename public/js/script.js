// $(document).ready(function () {
//     $('.dropdown-item').on('click', function (event) {
//         event.preventDefault();
//         var quizId = 5;
//         // $(this).data($quiz['quiz_id']);
//         var classId = "<?= $class_id ?>"; // umieszczamy w cudzysłowie
//         loadquizzes();
//     });
// });

// function loadquizzes() {
//     $.ajax({
//         url: "<?php echo route_to('assignquiztoclass'); ?>",
//         type: 'POST',
//         data: {
//             quiz_id: quizId,
//             class_id: classId
//         },
//         success: function (data) {

//             // tutaj możesz dodać kod, który zostanie wykonany po udanym dodaniu quizu do klasy
//             alert('Quiz assigned successfully!');
//         },
//         error: function (xhr, status, error) {
//             // tutaj możesz dodać kod, który zostanie wykonany w przypadku błędu
//             alert('Error assigning quiz!');
//         }
//     });
// }