<?php include_once('router.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<form action="router.php" class="form_inscription" method="post">

     <h2>
       <?php if(isset($_SESSION['display_error'])) 
              { echo $_SESSION['display_error']; }
       ?> 
   </h2> 

    <label for="email">Email</br>
    <input placeholder="Username.name@xx.fr" 
           type="email" 
           name="email" 
           required></label></br>

    <label for="password">Password</br>
    <input placeholder="Insert your password" 
           type="password" 
           name="password" 
           required></label></br>

    <input type="submit" 
           name="submit_login" 
           value="CONFIRM"></br>
</form> 

</body>
</html>