<?php
try{
    $dsn = "mysql:host=localhost;dbname=reddit;port=3306;charset=utf8mb4";
    $user = "root";
    $pwd = "";

    $db = new \PDO($dsn, $user, $pwd, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
}catch(\PDOException $e){
    echo "erreur lors de la connexion à la base";
}