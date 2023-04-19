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
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Class List -->
    <div class="container mt-4">
        <h1>Classes</h1>
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
                <?php foreach ($classes as $class): ?>
                <tr>
                    <th scope="row">
                        <?= $class['class_id']; ?>
                    </th>
                    <td>
                        <?= $class['class_name']; ?>
                    </td>
                    <td>
                        <?php if ($class['quiz_name']): ?>
                        <?= $class['quiz_name']; ?>
                        <?php else: ?>
                        No quiz assigned
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($class['users']): ?>
                        <?= implode(', ', $class['users']); ?>
                        <?php else: ?>
                        No student enrolled
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('classes/edit/' . $class['class_id']); ?>"
                            class="btn btn-primary btn-sm mr-2">Edit</a>
                        <a href="<?= site_url('classes/delete/' . $class['class_id']); ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>


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