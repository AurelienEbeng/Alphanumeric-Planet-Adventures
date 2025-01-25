<?php
session_start();

require_once('random_letters.php'); 



// Check if returning from Game Over screen
if (isset($_SESSION['return_from_game_over']) && $_SESSION['return_from_game_over'] === true || isset($_POST['quit'])) {
    // Set lives to 6
    $_SESSION['lives'] = 6;
    // Reset the flag
    $_SESSION['return_from_game_over'] = false;
    header("Location: ../../index.php"); // Redirect to the main login page
    exit(); 
}


if (!isset($_SESSION['letters'])) {
    $_SESSION['letters'] = generateLetters(6); 
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['refresh'])) {
        $_SESSION['letters'] = generateLetters(6);
        unset($_POST['refresh']);
    } else {
        $input = str_split($_POST['answer']); 
        if (count($input) === 2) {            
            $first_letter = min($input);
            $last_letter = max($input);
            $generatedLetters = $_SESSION['letters'];
            sort($generatedLetters);
            $correctFirstLetter = $generatedLetters[0];
            $correctLastLetter = $generatedLetters[5];
            if ($first_letter == $correctFirstLetter && $last_letter == $correctLastLetter) {
                header("Location: ../Msn/congratulations5.php?first=$first_letter&last=$last_letter");
                exit();
            } else {
                $message = "Letters are not in correct order. Please try again.";
                $_SESSION['lives']--;
                $lives = $_SESSION['lives']; 

                if ($_SESSION['lives'] <= 0) {                    
                    header("Location: ../Msn/GameOver1.php");
                    exit();
                } 
            }
        } else {
            $message = "Please enter exactly 2 letters.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 5</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
    <style>
        body {
            background-image: url('../../assets/img/5.png');
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
            margin-top: 30px; 
        }

        .login__form > div {
            margin-bottom: 30px; 
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
        <a href="history5.php" class="navbar__button">Last Scores</a>        
    </div>
    <div class="login">        
        <form action="" method="post" class="login__form" id="loginForm">
            <div><h1>Number Game  Level 5</h1></div>  
            <p style="color:white">Find the smallest and largest letter:</p>
            <div>
                <br>
                <label for="letters" style="color:white">Random Letters:</label>
                <input type="text" id="letters" name="letters" value="<?= implode(" ", $_SESSION['letters']) ?>" readonly>
            </div>
            <div>
                <label for="answer" style="color:white;">Your Answer:</label>
                <input style="color:black;" type="text" id="answer" name="answer">
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
        Your browser does not support the audio
 element.
    </audio>
</body>
</html>

