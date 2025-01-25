<?php
session_start();

require_once('../../connection.php'); 
require_once('../../saveScore.php'); 

if (!isset($_SESSION['return_from_game_over']) || $_SESSION['return_from_game_over'] !== true) {
    // Set the flag only if it's not already set or if it's set to false
    $_SESSION['return_from_game_over'] = true;
}

// Check if returning from Game Over screen
if (isset($_SESSION['return_from_game_over']) && $_SESSION['return_from_game_over'] === true) {
    saveScore("gameover",$connection);
    // Set lives to 6
    $_SESSION['lives'] = 6;
    // Reset the flag
    $_SESSION['return_from_game_over'] = false;
}

$message = ''; // VER PORQUE NÃO ESTA FUNCIONANDO!!!!!!!!!!!!!!!!!!!!!!!!!!
$redirect = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    $lives = isset($_POST['lives']) ? $_POST['lives'] : 0;
    if(isset($_POST['refresh'])) {
        $_SESSION['letters'] = generateLetters(6);
        unset($_POST['refresh']);
    } elseif (isset($_POST['quit'])) {        
    } else {
        if(empty($_POST['answer'])) {
            $message = "Please enter your answer. It is not possible to be empty";
        } else {
            $input = str_split($_POST['answer']); 
            if (checkAscending($input)) {
                $redirect = true; 
            } else {
                $message = "Letters are not in ascending order. Please try again.";                
                $_SESSION['lives']--;
                $lives = $_SESSION['lives']; 

                if ($_SESSION['lives'] <= 0) {                    
                    header("Location: ../Msn/GameOver1.php");
                    exit();
                }                
                
            }
        }
    }
}

if ($redirect) {
    header("Location: congratulations1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Over</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
</head>
<body>
    <div class="login">
        <img src="../../assets/img/1_blackwhite.jpg" alt="image" class="login__bg">
        <form action="" method="post" class="login__form" id="loginForm">
            <h1 class="login__title">Game Over</h1>  
            <h1>You are out of lives!</h1>  
            <button  id="returnButton" type="button" class="login__button">Return to Level 1</button>
            <button id="quitBtn" type="button" class="login__button">Quit</button>            
        </form>
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