<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'kidsGames';

include("connection.php");

class Database {
    protected $connection;

    public function __construct($host, $username, $password, $dbName) {
        $this->connection = mysqli_connect($host, $username, $password, $dbName);

        if (!$this->connection) {
            die ('Não foi possível conectar: ' . mysqli_connect_error());
        }
    }

    public function executeQuery($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }
}

class Insert extends Database {
    public function __construct($host, $username, $password, $dbName) {
        parent::__construct($host, $username, $password, $dbName);
    }

    public function insertToTAB($tableName, $data) {
        // not finish - have to put the implementation to insert data DB
    }

    public function registerUser($fName, $lName, $regUsername, $regPassword) {
        // Debugging: Display received data
        echo "Received data: First Name - $fName, Last Name - $lName, Username - $regUsername, Password - $regPassword <br>";
    
        $passCode = password_hash($regPassword, PASSWORD_DEFAULT);
    
        $checkQuery = "SELECT userName FROM player WHERE userName = ?";
        $checkStmt = $this->connection->prepare($checkQuery);
    
        if (!$checkStmt) {
            echo "Error preparing check statement: " . $this->connection->error;
            return false;
        }
    
        $checkStmt->bind_param("s", $regUsername);
        $checkStmt->execute();
        $checkStmt->store_result();
    
        if ($checkStmt->num_rows > 0) {
            $checkStmt->close();
            echo "Error: Username already taken.";
            return false;
        }        
        $checkStmt->close();

        echo "Username is available.<br>";
    
        $sqlPlayer = "INSERT INTO player (fName, lName, userName, registrationTime) 
                     VALUES (?, ?, ?, NOW())";
    
        $stmtPlayer = $this->connection->prepare($sqlPlayer);
        $stmtPlayer->bind_param("sss", $fName, $lName, $regUsername);
    
        if ($stmtPlayer->execute()) {
            $registrationOrder = $stmtPlayer->insert_id;
    
            echo "Registration order: $registrationOrder <br>";
    
            $sqlAuthenticator = "INSERT INTO authenticator (passCode, registrationOrder) 
                                VALUES (?, ?)";
    
            $stmtAuthenticator = $this->connection->prepare($sqlAuthenticator);
            $stmtAuthenticator->bind_param("si", $passCode, $registrationOrder);
    
            if ($stmtAuthenticator->execute()) {               
                return true;
            } else {                
                echo "Error inserting password into authenticator table: " . $stmtAuthenticator->error;
            }
        } else {            
            echo "Error inserting data into player table: " . $stmtPlayer->error;
        }    
        return false;
    }
}

// Usage
$insertObj = new Insert($host, $username, $password, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $lName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $regUsername = isset($_POST['username']) ? $_POST['username'] : '';
    $regPassword = isset($_POST['password']) ? $_POST['password'] : '';

    // Debugging
    //echo "Received data: First Name - $fName, Last Name - $lName, Username - $regUsername, Password - $regPassword <br>";

    // Register user
    if ($insertObj->registerUser($fName, $lName, $regUsername, $regPassword)) {       
        header("Location: GameLevels/Level1/Level1.php");
        exit(); 
    } else {        
        echo "Error registering user.";
    }
}

// Close connection
$insertObj->closeConnection();


