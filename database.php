<?php $server='simaalexandru.dk.mysql';
$username='simaalexandru_d';
$password='iJPAe6Gz';
$database= 'simaalexandru_d';

//if we try to connect to db , if not error
try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch(PDOException $e){
    die("Connection failed:" .$e->getMessage()); 
    
}

?>