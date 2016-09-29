<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<link rel="stylesheet" href="styles/style.css" media="screen">


<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="pageone.php">Car Tunning</a>
    </div>
     <ul class="nav navbar-nav navbar-right">
     <?php
     //getting current page file name
     $curpage= basename ($_SERVER['PHP_SELF']);
     ?>
     
     <!--Setting the active class for the current page-->
     <li><a href="pageone.php" <?php if($curpage == 'pageone.php'){echo 'class="active"';} ?>>Home</a></li>
     <li><a href="pagetwo.php" <?php if($curpage == 'pagetwo.php'){echo 'class="active"';} ?>>About Us</a></li>
     <li><a href="pagethree.php" <?php if($curpage == 'pagethree.php'){echo 'class="active"';} ?>>Portofolio</a></li>
     </ul>
  </div>
</nav>





