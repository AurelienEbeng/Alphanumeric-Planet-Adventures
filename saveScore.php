<?php



$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);


if (!$connection) {
    die ('Não foi possível conectar: ' . mysqli_connect_error());
}

$maxLives = 6;
function saveScore($result, $connection){
    global $maxLives;
    $livesUsed = $maxLives - intval($_SESSION['lives']);
    $registrationOrder = $_SESSION['user_id'];
    $scoreTime = date('Y-m-d H:i:s');

    //$sql = "INSERT INTO score (scoreTime, result, livesUsed,registrationOrder)
    //VALUES ($scoreTime, $result, $livesUsed, $registrationOrder)";

    /* if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
        }

     */

    $sql = "INSERT INTO score (scoreTime, result, livesUsed,registrationOrder) VALUES (?,?,?,?)";
    $connection->execute_query($sql, [$scoreTime, $result, $livesUsed, $registrationOrder]);

    
}


