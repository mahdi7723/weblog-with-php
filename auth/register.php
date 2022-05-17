<?php
include '../db/db.php';
$name = $email = $password = $re_pass = '';
$error = array('name' => '', 'email' => '', 'password' => '', 're_pass' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST["name"])) {
        $error['name'] = 'requier name';
    } else {
        $name = $_POST['name'];
    }
    if (empty($_POST["email"])) {
        $error['email'] = "Email is required";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email format";
        }
    }
    if (empty($_POST["password"])) {
        $error['password'] = 'requier password';
    } else {
        $password = $_POST['password'];

        $number = preg_match('@[0-9]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);

        if (strlen($password) < 8 || !$number || !$lowercase) {
            echo "Password must be at least 8 characters in length and must contain at least one number, one lower case letter and one.";
        } else {
            $password=$_POST['password'];
        }
    }
    if (empty($_POST["re_pass"])) {
        $error['re_pass'] = 'requier confirm password';
    } else {
        if ($_POST["password"] === $_POST["re_pass"]) {
            $error['re_pass'] = 'success!';
        } else {
            $error['re_pass'] = 'failed :(';
        }
    }
    if (!array_filter($error)) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $re_pass = mysqli_real_escape_string($conn, $_POST['re_pass']);
    }
    $register=mysqli_query($conn,"INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");
        if($register)
        {
            header('location: index.php');
        }else{
            echo 'Query Error'.mysqli_errno($conn);
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
    <title>register page</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/assets/css/styles.css" rel="stylesheet" />

</head>

<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black bg-info border-radius border-5 border-warning">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="login.php" method="POST" class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                                                <div class="text-danger"><?php echo $error['name']; ?></div>
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                                                <div class="text-danger"><?php echo $error['email']; ?></div>
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="password" value="<?php echo htmlspecialchars($password); ?>" />
                                                <div class="text-danger"><?php echo $error['password']; ?></div>
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control" name="re_pass" value="<?php echo htmlspecialchars($re_pass); ?>" />
                                                <div class="text-danger"><?php echo $error['re_pass']; ?></div>
                                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" class="btn btn-primary btn-lg" value="Register" name="submit"></input>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="/assets/js/scripts.js"></script>
</body>

</html>