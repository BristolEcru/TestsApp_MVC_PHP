<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Class Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Class Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/students">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quizzes</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Class List -->

    <div class="container mt-4">
        <h1>Students Grouped by Class</h1>
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
                        <?php echo $student['quiz_assigned_id']; ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('edit_student/' . $student['id']); ?>">Edit</a>
                        <a href="<?php echo base_url('delete_student/' . $student['id']); ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>



    <footer class="bg-light text-center py-3">
        <p>&copy; 2023 Quiz App</p>
    </footer>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNjn" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    </div>