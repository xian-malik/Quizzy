<?php
    session_start();
    ob_start();
    if( !isset($_SESSION["username"]) ) {
        header('Location: index.php');
    }

    require_once "scripts/dbconnector.php";
    $username = $_SESSION["username"];
    $query = $conn->query("SELECT * FROM users WHERE username='$username'");
    $result = $query->fetch_row();
    $fullname = $result[1];
    $quizmarks = $result[3];
    $highestmarks = $result[4];
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

    <script src="vendors/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/jscript.js" charset="utf-8"></script>
</head>
<body>
    <div class="page-wrapper" style="background: #FFF; display: block;">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h4>
                            Hello, <?php echo $fullname; ?>
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="submit" name="logout" id="button_logout" value="Logout">
                        </form>
                        <?php
                            if( isset($_POST['logout']) ){
                                unset($_SESSION['username']);
                                ob_end_flush();
                                session_destroy();
                                header('Location: index.php');
                                exit;
                            }
                         ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="container" style="padding: 200px 0;">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="info-desc text-center">
                        <p style="margin:0">Your last quiz mark is: <?php echo $quizmarks; ?>/100</p>
                        <p>Your highest quiz mark is: <?php echo $highestmarks; ?>/100</p>
                        <a href="#" id="button_quiz">Take the Quiz</a>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="QuizForm">
                        <?php
                            $qquery = $conn->query("SELECT * FROM questions");
                            while($questions = $qquery->fetch_array()){
                                $n = $questions[0];
                        ?>
                            <div class="question--field">
                                <p>
                                    <?php echo $n . ") " . $questions[1]; ?>
                                </p>
                                <div class="ans--group">
                                    <input type="radio" id="que--<?php echo $n; ?>a" name="que--<?php echo $n; ?>" value="1" checked>
                                    <label for="que--<?php echo $n; ?>a"><?php echo $questions[2]; ?></label>
                                </div>
                                <div class="ans--group">
                                    <input type="radio" id="que--<?php echo $n; ?>b" name="que--<?php echo $n; ?>" value="2">
                                    <label for="que--<?php echo $n; ?>b"><?php echo $questions[3]; ?></label>
                                </div>
                                <div class="ans--group">
                                    <input type="radio" id="que--<?php echo $n; ?>c" name="que--<?php echo $n; ?>" value="3">
                                    <label for="que--<?php echo $n; ?>c"><?php echo $questions[4]; ?></label>
                                </div>
                                <div class="ans--group">
                                    <input type="radio" id="que--<?php echo $n; ?>d" name="que--<?php echo $n; ?>" value="4">
                                    <label for="que--<?php echo $n; ?>d"><?php echo $questions[5]; ?></label>
                                </div>
                            </div>
                        <?php } ?>
                        <a href="#" id="NextQueButton">Next Question</a>
                        <input type="submit" name="quizsubmit" value="Submit Answers" id="submitAnswers">
                    </form>
                    <?php
                        if( isset($_POST['quizsubmit']) ) {
                            $quizmarks = 0;
                            $aquery = $conn->query("SELECT correct_ans FROM questions");
                            $answers = Array();
                            while ($row = $aquery->fetch_row()) {
                                $storeArray[] =  $row[0];
                            }
                            for($i = 0; $i<10; $i++ ){
                                $no = 'que--' . ($i+1);
                                if($_POST[$no] == $storeArray[$i] ){
                                    $quizmarks+=10;
                                }
                            }
                            $query = $conn->query("UPDATE users SET quizmarks='$quizmarks' WHERE username='$username'");
                            if( $quizmarks > $highestmarks ) {
                                $query = $conn->query("UPDATE users SET highestmarks='$quizmarks' WHERE username='$username'");
                            }
                            header('Location: /dashboard.php');
                        }
                     ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
