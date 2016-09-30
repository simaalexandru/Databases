<?php 
session_start();


//if the session isset and the user is logged in redirect to index
if(isset($_SESSION['user_id'])){
    header("Location:index.php");
    
    
}

require 'database.php';

//if the email and pass it's not empty 
if(!empty($_POST['email']) && !empty($_POST['password'])):
    
 //storing the email and pass from the users
 $records= $conn->prepare('SELECT id,email,password FROM userlogin WHERE email = :email');   
 
 //bind the parameter to the query
 $records->bindParam(':email', $_POST['email']);
 $records->execute();
 //Fetch the email adress or the record where the user's email addres matches what has been posted
 $results = $records->fetch(PDO::FETCH_ASSOC);
 
 $message = '';
 
 //Fetch the email adress or the record where the user's email addres matches what has been posted
 
 //If there is a record and the password matches the user has been authenticated
 if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
     
     $_SESSION['user_id'] = $results['id'];
     header("Location: index.php");
 }else{
     
    $message = 'Wrong username or password.';
 }
 
endif;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
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
    
    <h1>Log In</h1>
 <span>Or <a href="register.php">register here.</a></span>
  <form name="myForm" action="login.php" method="POST">
        <input type="text" placeholder="Enter your email" name="email" required>
        <input type="password" placeholder="Enter your password" name="password" required>
        <input type="submit">
  </form>
</body>
</html>
