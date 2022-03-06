<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bd";
$port = 3306;

try{ 
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    $con = mysqli_connect($host, $user, $pass, $dbname);

} catch(PDOException $err){  
    echo"Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}