<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
</head>
<body>
    <div class="login">
        <img src="../../assets/img/1.jpg" alt="image" class="login__bg">
        <form action="" method="post" class="login__form" id="loginForm">
            <h1 class="login__title">Congratulations!</h1>               
            <button  id="goButton" type="button" class="login__button">Go to Level 2</button>                     
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>           
        document.getElementById("goButton").addEventListener("click", function() {        
            window.location.href = "../Level2/Level2.php";
        });      
        
    </script>
    <audio controls autoplay loop>
        <source src="../../assets/music/space_line.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
</body>
</html>
