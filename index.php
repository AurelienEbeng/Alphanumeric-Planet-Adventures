
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Log In Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header class="header">
        <h1 style="color: yellow;">AlphaNumeric Planet Adventures</h1>
        <h2 style="color: white;">Final Project - DW3</h2>        
    </header>
    <div class="navbar">
        <a href="about.php" class="navbar__button">About</a>
    </div>
    <div class="main-content">
    <div class="login">
        <img src="assets/img/1.jpg" alt="image" class="login__bg">

        <form action="login.php" method="post" class="login__form" id="loginForm">
            <h1 class="login__title">Quiz Game</h1>
            <h2>Play the game to test your Logic Skills!</h2>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="username" id="username" placeholder="Username" required class="login__input">
                    <i class="ri-bilibili-line"></i>
                    <span id="usernameError" style="color: red;"></span>
                </div>

                <div class="login__box">
                    <input type="password" name="password" id="password" placeholder="Password" required class="login__input">
                    <i class="ri-lock-2-fill"></i>
                    <span id="passwordError" style="color: red;"></span>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-box">
                    <input  class="login__check-input" id="user-check">
                    <label for="user-check" class="login__check-label">Remember me</label>
                </div>

                <a href="#" class="login__forgot" id="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="login__button">Login</button>

            <div class="login__register">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </div>
    <footer class="footer">
        <div class="footer__content">            
            <audio controls autoplay loop class="audio-button">
                <source src="assets/music/space_line.mp3" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
            <div class="team">Team 4 @ <?= date('Y'); ?></div>
        </div>
    </footer>

    </div>
    <button class='start'>Start</button>
    </div>
    <script>
        $(document).ready(function () {
            $('#login__forgot').click(function(event) {
                event.preventDefault();                
                window.location.href = "forgot_password.php";
            });

            var rememberedUsername = localStorage.getItem('rememberedUsername');
            if(rememberedUsername) {
                $('#username').val(rememberedUsername);
                $('#user-check').prop('checked', true);
            }
        });
        document.getElementById("registrationForm").addEventListener("submit", function (event) {
            var submitButton = document.getElementById("submitButton");
            if (submitButton.getAttribute("data-submitting") === "true") {
                event.preventDefault(); // Prevent form submission if already submitting
                return;
            }
            submitButton.setAttribute("data-submitting", "true"); // Mark button as submitting
            submitButton.disabled = true; // Disable the submit button to prevent multiple clicks
        });
    </script>
    
    </div>
    
</body>
</html>