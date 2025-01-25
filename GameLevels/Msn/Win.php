<?php
session_start();

require_once('../../connection.php'); 
require_once('../../saveScore.php'); 



if($_SESSION['hasWon'] === true){
    saveScore("win",$connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Won</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
    <style>
        body {
            background-image: url('../../assets/img/1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="login">
        <form action="" method="post" class="login__form" id="loginForm">
            <h1 class="login__title">Congratulations! You Win!</h1>              
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