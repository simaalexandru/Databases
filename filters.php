<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vaidation</title>
</head>

<body>
<h1>Filter input example</h1>
<p>Requires: <a href="<?= $_SERVER['PHP_SELF']?> ?name=Alex&email=cph-as315@cphbusiness.dk&age=20">name,email and age parameters</a></p>
<hr>

<?php 
$name = filter_input(INPUT_GET, 'name' , FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die ('Illegal name');
$email = filter_input(INPUT_GET, 'email' , FILTER_VALIDATE_EMAIL) or die ('Illegal email adress.');
$age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT) or die ('Illegal age adress.'); 

echo 'name='.$name.'<br>'.PHP_EOL;
echo 'email='.$email.'<br>'.PHP_EOL;
echo 'age='.$age.'<br>'.PHP_EOL;

$sql = 'INSERT INTO persons (name, email, age) VALUES (?, ?, ?)';
echo $sql;

require_once 'dbcon.php';
$stmt = $link->prepare($sql);
$stmt->bind_param('ssi', $name , $email .$age);
$stmt->execute();

while($stmt->fetch()) {
      echo $name.' : '.$email. '<br/>’.PHP_EOL;	

?>
</body>
</html>