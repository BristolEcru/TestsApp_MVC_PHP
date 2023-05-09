<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Quiz App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/Home">Home <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Register</h5>
                        <form action="<?php echo base_url('/register'); ?>" method="post">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= set_value('email') ?>">
                                <?php if (isset($validation)): ?>
                                    <small class="text-danger">
                                        <?= $validation->getError('email') ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <?php if (isset($validation)): ?>
                                    <small class="text-danger">
                                        <?= $validation->getError('password') ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password">
                                <?php if (isset($validation)): ?>
                                    <small class="text-danger">
                                        <?= $validation->getError('confirm_password') ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" id="name" name="name"
                                    value="<?= set_value('name') ?>">
                                <?php if (isset($validation)): ?>
                                    <small class="text-danger">
                                        <?= $validation->getError('name') ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Register Now</button>
                                <p class="text-center">Have already an account <a
                                        href="<?php echo base_url('/login'); ?>">Login here</a>
                                <p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2023 Quiz App</p>
    </footer>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSbNjn" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmV
</body></html>
</body>

</html>