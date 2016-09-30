<?php
session_start();


 if(!isset($_SESSION['user_id'])) {
   echo ("<h3>You re not logged in<h3>");
   echo '<a href="index.php">Log in or Register</a>';
        
}else{
    
   echo ("<h3>You're logged in<h3>"); 
   echo '<img src="secret.png">';
   echo '<a href="logout.php">Logout</a>';
    
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Secret page</title>
<link rel="stylesheet" type="text/css" href="styles/indexstyle.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>

<body>
</body>
</html>
