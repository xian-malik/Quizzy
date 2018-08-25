<?php
    session_start();
    if( isset($_SESSION["username"]) ) {
        header('Location: dashboard.php');
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Quizzy</title>

    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/css/stylesheet.css">
</head>
<body>
    <div class="page-wrapper">
        <header></header>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                <h1 class="text-center">Quizzy</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="loginform">
                        <h2 class="text-center">Login</h2>
                        <input type="text" name="username" id="form_username" placeholder="Username" autocomplete="off">
                        <input type="password" name="password" id="form_password" placeholder="Password">
                        <input type="submit" name="submit" id="form_submit" value="Login">
                        <h6 class="text-center">Forgot your <a href="#">Username/Password?</a></h6>
                    </form>
                    <?php
                        require_once "scripts/dbconnector.php";
                        if( isset($_POST['submit']) ){
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $sql = "SELECT * from users WHERE username='$username' AND password='$password'";
                            $query = $conn->query($sql);
                            $count = $query->num_rows;
                            $result = $query->fetch_row();
                            if( $count = 1 ) {
                                $_SESSION["username"] = $result[0];
                                echo "Name: " . $_SESSION["username"];
                                    header('Location: dashboard.php');
                            } else {
                                echo "Invalid Username/Password";
                            }
                        }
                     ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
