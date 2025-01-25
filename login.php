<?php
session_start();
require_once('connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    
    $checkQuery = "SELECT * FROM player WHERE userName = ?";
    $checkStmt = $connection->prepare($checkQuery);

    if (!$checkStmt) {
        echo "Error preparing check statement: " . $connection->error;
        exit();
    }

    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();
        $userID = $user['registrationOrder'];

        $checkPasswordQuery = "SELECT passCode FROM authenticator WHERE registrationOrder = ?";
        $checkPasswordStmt = $connection->prepare($checkPasswordQuery);

        if (!$checkPasswordStmt) {
            echo "Error preparing password check statement: " . $connection->error;
            exit();
        }

        $checkPasswordStmt->bind_param("i", $userID);
        $checkPasswordStmt->execute();
        $passwordResult = $checkPasswordStmt->get_result();

        if ($passwordResult->num_rows > 0) {
            $passwordRow = $passwordResult->fetch_assoc();
            $hash = $passwordRow['passCode'];
            
            if (password_verify($password, $hash)) {                
                $_SESSION['user_id'] = $userID;
                header("Location: GameLevels/Level1/Level1.php");
                exit();
            } else {                
                echo "Invalid username or password.";
            }
        } else {            
            echo "Password not found.";
        }

        $checkPasswordStmt->close();
    } else {        
        //echo "User not found.";
        header("Location: userNotFound.php");
                exit();
    }

    $checkStmt->close();
}

