<?php 
session_start();

//if isset the user is logged in redirect to homepage
if(isset($_SESSION['user_id'])){
    header("Location:index.php");
    
    
}
require 'database.php';
$message= '';


if(!empty($_POST['email']) && !empty($_POST['password'])):
 //Enter the new user in the database
 $sql="INSERT INTO userlogin(email,password)VALUES (:email, :password)";
 $stmt= $conn->prepare($sql);
 
 $stmt->bindParam(':email',$_POST['email']);
 $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

 if($stmt->execute()):
     $message = 'Succesfully created new user.';
 else:
     $message = 'Sorry, there must have been an issue creating your account.';
 endif;
     
endif;


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" type="text/css" href="styles/indexstyle.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
    <div class="header">
     <a href="index.php">Car Tunning</a>
   </div> 
   
   <!--If not empty show msj -->
   <?php if(!empty($message)): ?>
     <p><?= $message?></p>
   <?php endif; ?>
   
    <h1>Register</h1>
    <span>Or <a href="login.php">log in here.</a></span>
    
    <form action="register.php" method="POST">
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="Enter your password" name="password">
        <input type="password" placeholder="Confirm password" name="confirm_password">
        <input type="submit">
        
<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    
    
</script>
</body>
</html>
