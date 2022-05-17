<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>home page</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">WebLog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="auth/register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="auth/login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>WebLog</h1>
                        <span class="subheading">A Blog Theme by Mahdi parvizi</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- page comment -->
    <div class="container align-items-center">
        <div class="row  justify-content-center">
            <?php foreach ($comments as $comment) { ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header">comment by : <?php echo htmlspecialchars($comment['name']); ?></h4>
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo htmlspecialchars($comment['email']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($comment['comment']); ?></p>
                            <p class="card-text">created at : <?php echo ($comment['date']); ?></p>
                            <form action="index.php"method="POST">
                                <input type="hidden"name="id_delete"value="<?php echo ($comment['id']); ?>">
                                <input class="btn btn-danger brand z-depth-0" type="submit" name="delete" value="Delete">
                            </form>
                        </div>
                    </div>
                <?php } ?>
                </div>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/{{https://www.instagram.com/p/CMhnF2zjHW98zjWpxyoZ5XA0Chqq0F0fYkjpYs0/?igshid=YmMyMTA2M2Y=}}" title="Instagram">
                                <span class="fa-stack fa-lg" aria-hidden="true">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="mailto:{{ mahdiparvizi77@yahoo.com }}" title="Email me">
                                <span class="fa-stack fa-lg" aria-hidden="true">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                                </span>
                                <span class="sr-only">Email me</span>
                            </a>
                        </li>
                    </ul>
                        <div class="small text-center text-muted fst-italic">design by mahdi parvizi</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
</body>

</html>