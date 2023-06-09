<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Quiz App</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark  bg-success">
        <?php $session = session();
        $user_id = $session->get('id'); ?>
        <a class="navbar-brand" href="/Home">Quiz App</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('student/studentpanel/' . $user_id); ?>">Student home
                        page</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php echo route_to('myquizzes', $user_id) ?>"> My quizzes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route_to('myresults', $user_id) ?>"> My results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> </a>
                </li>
            </ul>
        </div>
        <form class="d-flex">

            <a class="nav-link bg-light" aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
        </form>
    </nav>

    <div class="container">
        <?= $this->renderSection('content'); ?>
    </div>

    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2023 Quiz App</p>
    </footer>

    <script src="<?php base_url('../public/js/script.js') ?>"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>