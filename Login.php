<?php
require "./conf.php";
session_start();
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $_SESSION['status'] = false;
    $show = "SELECT * FROM `user`";

    $res = $conn->query($show);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($row['name'] == $name && $row['pass'] == $pass) {
                echo "<script>alert('Login Successful!')</script>";
                $_SESSION['name'] = $row['name'];
                $_SESSION['pass'] = $row['pass'];
                $_SESSION['status'] = true;
                header("location:index.php");
            }
            echo "<script>alert('Username or password is wrong')</script>";
        }
    } else {
        echo "<script>alert('No data!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <small>login</small>
    <form method="post">
        <small>name </small><input type="text" name="name"><br>
        <small>pass </small><input type="text" name="pass"><br>
        <input type="submit" value="Login" name="login"><br>
        <small><a href="Signup.php">Sign up here</a></small>
    </form>
</body>

</html>