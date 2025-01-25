<?php

define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'kidsgames');
define('HOST', 'localhost');

$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

if (!$connection) {
    die ('Não foi possível conectar: ' . mysqli_connect_error());
}