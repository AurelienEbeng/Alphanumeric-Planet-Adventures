<?php

session_start();
require_once('random_numbers.php'); 
require_once('check_order.php');


// Check if returning from Game Over screen
if (isset($_SESSION['return_from_game_over']) && $_SESSION['return_from_game_over'] === true || isset($_POST['quit'])) {
    // Set lives to 6
    $_SESSION['lives'] = 6;
    // Reset the flag
    $_SESSION['return_from_game_over'] = false;
    header("Location: ../../index.php"); // Redirect to the main login page
    exit(); 
}

if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = generateNumbers(6); 
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['refresh'])) {
        $_SESSION['numbers'] = generateNumbers(6);
        unset($_POST['refresh']);
    } else {
        $input = explode(" ", $_POST['answer']);
        if (checkAscendingNumbers($input)) { 
            header("Location: ../Msn/congratulations3.php");
            exit();
        } else {
            $message = "Numbers are not in ascending order. Please try again.";
            $_SESSION['lives']--;
                $lives = $_SESSION['lives']; 

                if ($_SESSION['lives'] <= 0) {                    
                    header("Location: ../Msn/GameOver1.php");
                    exit();
                } 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 3</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
    <style>
        body {
            background-image: url('../../assets/img/3.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        
        .login {
            width: 100%; 
            margin: 0 auto; 
            padding-top: 50px;
            padding-bottom: 50px; 
            text-align: center; 
        }

        .login__form {
            margin-top: 90px; 
        }

        .login__form > div {
            margin-bottom: 15px; 
        }

        .login__form button {
            margin: 0 10px; 
        }

        .login__form .lives {
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="navbar" style = "padding-bottom: 20px; padding-top: 20px; margin-bottom: 0px;"">
        <a href="history3.php" class="navbar__button">Last Scores</a>        
    </div>
    <div class="login">
        <form action="" method="post" class="login__form" id="loginForm">
            <div><h1>Number Game  Level 3</h1></div>  
            <p style = "color:white" >Arrange the numbers in ascending order:</p>
            <div>
                <br>
                <label for="letters" style = "color:white" >Random Numbers:</label>
                <input style = "color:black" type="text" id="numbers" name="numbers" value="<?= implode(" ", $_SESSION['numbers']) ?>" readonly>
            </div>
            <div>
                <label for="answer" style = "color:white;" >Your Answer:</label>
                <input style = "color:black;" type="text" id="answer" name="answer">
            </div>
            <div>
                <button class="login__button" type="submit" style="margin-right: 10px; margin-bottom: 10px;">Submit</button>
                <button class="login__button" type="submit" name="refresh" style="margin-right: 10px;margin-bottom: 10px;">Refresh</button>
                <button class="login__button" type="submit" name="quit" onclick="return confirm('Are you sure you want to quit?');">Quit</button>
            </div>
            <div class="lives">               
                <p><?= $message ?></p>
                <p>Lives Left: <?= $_SESSION['lives'] ?></p>
            </div>            
            <input type="hidden" id="lives" name="lives" value="<?= $_SESSION['lives'] ?>">
        </form>
        <script>
            function confirmQuit() {
                if (confirm('Are you sure you want to quit?')) {                
                    window.location.href = '../../index.php';
                }
            }
        </script>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>           
        document.getElementById("returnButton").addEventListener("click", function() {        
            window.location.href = "../Level1/Level1.php";
        });      
        
        document.getElementById("quitBtn").addEventListener("click", function() {        
            window.location.href = "../../index.php";
        }); 
    </script>
    <audio controls autoplay loop>
        <source src="../../assets/music/space_line.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
</body>
</html>
