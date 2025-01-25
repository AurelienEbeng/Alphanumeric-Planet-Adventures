<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <title>Reset your Password</title>
</head>

<body>
    <div class="login">
        <img src="assets/img/1.jpg" alt="image" class="login__bg">
        <form action="Classes.php" method="post" class="login__form">
            <h1 class="login__title">Reset your Password</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" id="username" name="username" placeholder="Username" required class="login__input">
                </div>                <div class="login__box">
                    <input type="password" id="new_password" name="new_password" placeholder="New Password" required class="login__input">
                </div>
            </div>
            <button type="submit" class="login__button">Submit</button>
        </form>        
    </div>  
</body>
</html>