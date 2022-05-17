<?php
include 'db/db.php';
$email = $name = $comment = '';
$error = array('name' => '', 'email' => '', 'comment' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $error['name'] = "Name is required";
    } else {
        $name = ($_POST['name']);
    }
    echo '<br>';
    if (empty($_POST['email'])) {
        $error['email'] = "Email is required";
    } else {
        $email = ($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email format";
        }
    }
    echo '<br>';
    if (empty($_POST['comment'])) {
        $comment = "";
    } else {
        $comment = ($_POST['comment']);
    }
    if (!array_filter($error)) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $text = mysqli_real_escape_string($conn, $_POST['comment']);
        $sql = "INSERT INTO comments(name,email,comment)VALUES('$name','$email','$comment')";

        if (mysqli_query($conn, $sql)) {
            header('location: index.php');
        } else {
            echo 'Query Error' . mysqli_errno($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>contact page</title>
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
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">
                        <form action="contact.php" method="POST">
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="pwd" placeholder="Enter name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                                <div class="text-danger"><?php echo $error['name'];  ?></div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                <div class="text-danger"><?php echo $error['email'];  ?></div>
                            </div>
                            <label for="comment">Comments:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment" value="<?php echo htmlspecialchars($comment); ?>"></textarea><br>
                            <input type="submit" name="submit" value="Send" class="btn btn-primary"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
                    <div class="small text-center text-muted fst-italic">design by : mahdi parvizi</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>