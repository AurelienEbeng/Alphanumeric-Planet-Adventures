<?php
// Include the Database class file
include("Classes.php");

$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'kidsGames';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <title>Registration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="login"> 
        <img src="assets/img/1.jpg" alt="image" class="login__bg">

        <form action="" method="post" class="login__form" id="registrationForm">
            <h1 class="login__title">Register</h1>

            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" required class="login__input">
                    <span class="error" id="first_name_error" style="color: red;"></span>
                </div>

                <div class="login__box">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" required class="login__input">
                    <span class="error" id="last_name_error" style="color: red;"></span>
                </div>

                <div class="login__box">
                    <input type="text" name="username" id="username" placeholder="Username" required class="login__input" oninput="checkUsername()">
                    <i class="ri-bilibili-line"></i>
                    <span id="usernameError" style="color: red;"></span>
                </div>

                <div class="login__box">
                    <input type="password" name="password" id="password" placeholder="Password" required class="login__input">
                    <i class="ri-lock-2-fill"></i>
                    <span id="passwordError" style="color: red;"></span>
                </div>

                <div class="login__box">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required class="login__input">
                    <i class="ri-lock-2-fill"></i>
                    <span id="confirmPasswordError" style="color: red;"></span>
                </div>
            </div>

            <button type="submit" class="login__button">Register</button>

            <div class="login__register">
                Already have an account? <a href="index.php">Log In</a>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
    // Validation for first name
    $('#first_name').on('input', function () {
        var firstName = $(this).val();
        if (!/^[a-zA-Z]*$/.test(firstName)) {
            $('#first_name_error').text('Please enter only letters.');
        } else {
            $('#first_name_error').text('');
        }
    });

    // Validation for last name
    $('#last_name').on('input', function () {
        var lastName = $(this).val();
        if (!/^[a-zA-Z]*$/.test(lastName)) {
            $('#last_name_error').text('Please enter only letters.');
        } else {
            $('#last_name_error').text('');
        }
    });

    // Validation for username
    $('#username').on('input', function () {
        var username = $(this).val();
        var usernamePattern = /^[A-Z][a-zA-Z]*$/;
        if (!usernamePattern.test(username)) {
            $('#usernameError').text('Username must begin with a capital letter and contain only letters.');
        } else {
            $('#usernameError').text('');
        }
    });

    // Validation for password
    $('#password').on('input', function () {
        var password = $(this).val();
        if (password.length < 8) {
            $('#passwordError').text('Password must be at least 8 characters long.');
        } else {
            $('#passwordError').text('');
        }
    });

    // Validation for confirm password
    $('#confirm_password').on('input', function () {
        var password = $('#password').val();
        var confirmPassword = $(this).val();
        if (confirmPassword !== password) {
            $('#confirmPasswordError').text('Passwords do not match.');
        } else {
            $('#confirmPasswordError').text('');
        }
    });

    $('#registrationForm').submit(function (event) {
        event.preventDefault();
        var firstName = $('#first_name').val();
        var lastName = $('#last_name').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirm_password').val();

        var usernamePattern = /^[A-Z][a-zA-Z]*$/;

        // Validation for first name
        if (firstName.trim() == "") {
            $('#first_name_error').text('Please enter your first name.');
            return;
        } else {
            $('#first_name_error').text('');
        }

        // Validation for last name
        if (lastName.trim() == "") {
            $('#last_name_error').text('Please enter your last name.');
            return;
        } else {
            $('#last_name_error').text('');
        }

        // Validation for username
        if (!usernamePattern.test(username)) {
            $('#usernameError').text('Username must begin with a letter.');
            return;
        } else {
            $('#usernameError').text('');
        }

        // Validation for password
        if (password.length < 8) {
            $('#passwordError').text('Password must be at least 8 characters long.');
            return;
        } else {
            $('#passwordError').text('');
        }

        // Validation for confirm password
        if (confirmPassword !== password) {
            $('#confirmPasswordError').text('Passwords do not match.');
            return;
        } else {
            $('#confirmPasswordError').text('');
        }

        this.submit();
    });
});
    </script>
</body>

</html>