<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game History</title>
    <link rel="stylesheet" href="../../assets/css/stylesheet.css">
    <style>
        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table th, .history-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .history-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .history-table th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Game History</h1>
    </header>
    <div class="navbar">
        <a href="Level5.php" class="navbar__button">Back to Level 5</a>
    </div>
    <div class="main-content">
        <div class="history-content">
            
            <?php            
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "kidsGames";
            
            $connection = new mysqli($host, $username, $password, $dbname);
            
            if ($connection->connect_error) {
                die("Conexão falhou: " . $connection->connect_error);
            }
            
            $sql = "SELECT * FROM history";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {                
                echo "<table class='history-table'><tr><th>Data do Score</th><th>ID do Jogador</th><th>Nome</th><th>Sobrenome</th><th>Resultado</th><th>Vidas Utilizadas</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["scoreTime"] . "</td><td>" . $row["id"] . "</td><td>" . $row["fName"] . "</td><td>" . $row["lName"] . "</td><td>" . $row["result"] . "</td><td>" . $row["livesUsed"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 resultados";
            }

            $connection->close();
            ?>
        </div>
    </div>
    <footer class="footerabout">
        Team 4 - Final Project Winter 2024 - Web Server Application Development 1 @ <?= date('Y'); ?>
    </footer>
</body>
</html>