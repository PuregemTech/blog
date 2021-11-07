<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog_admin';
$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error === true) {
    die('Unable to connect');
}

$errors = [];
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $errors['email_error'] = 'Email is required';
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $errors['password_error'] = 'password is required';
    } else {
        $password = $_POST['password'];
    }
    if (!$errors) {
        $result = $conn->query(
            "SELECT email, passwordd from adminblog WHERE email='$email' AND passwordd='$password'"
        );
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            header('location:admin.php');
        } else {
            $errors['result_error'] = 'Invalid details';
        }
    }
}

$password = md5('admin');
$sql = "INSERT INTO adminblog(name, email, passwordd)
values('Toheeb', 'admin@blog.com', '$password')";
if (!$conn->query($sql)) {
    echo ' Not successful' . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if ($errors) {
                    echo "<div class='alert alert-danger'>";
                    foreach ($errors as $error) {
                        echo $error . '<br/>';
                    }
                    echo '</div>';
                } ?>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                        <span style="color: red;">
                            <?php if (
                                array_key_exists('email_error', $errors)
                            ) {
                                echo $errors['email_error'];
                            } ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                        <span style="color: red;">
                            <?php if (
                                array_key_exists('password_error', $errors)
                            ) {
                                echo $errors['password_error'];
                            } ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminlte.min.js"></script>
</body>

</html>