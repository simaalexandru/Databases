<?php 
session_start();

//require db and if the session isset prepare to select id email pw where the id is equal to this id 
   require 'database.php';
   if(isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT id,email,password FROM userlogin WHERE id = :id'); 
//bind whre the id it s equal to the userid
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
//setting user to null if i don't recieve result in the db
    $user = NULL;
    
    if(count($results) > 0 ){
        
        $user = $results;
        
    }
    
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <title>Welcome to CarTunning</title>
 <link rel="stylesheet" type="text/css" href="styles/indexstyle.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
    <div class="header">
     <a href="index.php">Car Tunning</a>
    </div> 
    
    <?php
    //if not empty 
    if(!empty($user)):?>
     <br/>Welcome <?= $user['email'];?>
     <br/> <br/>You are now logged in!
     <br/> <br/>
     
     <a href="logout.php">Logout</a>
    <?php else: ?>
        
  <h1>Please Log In or Register</h1>
  <a href="login.php">Login</a> or
  <a href="register.php">Register</a>
    <?php endif; ?>
</body>
</html>

