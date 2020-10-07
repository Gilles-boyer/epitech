<?php include_once('router.php'); session_start(); 
if(isset($_COOKIE['user'])) {
  $_SESSION['user'] = $_COOKIE['user'];
} elseif(!isset($_SESSION['user'])) {
          header('location:index.php');
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETTING</title>
</head>
<body>

   <h2>
       <?php if(isset($_SESSION['display_error'])) 
              { echo $_SESSION['display_error']; }
       ?> 
   </h2> 

<form action="router.php" class="form_inscription" method="post">

    <label for="name">Name</br>
    <input placeholder="Insert your name" 
           type="text" 
           name="name"
           value= "<?php echo $_SESSION['user'] ?>"
           required> </label></br>

    <label for="email">Email</br>
    <input placeholder="Username.name@xx.fr" 
           type="email" 
           name="email"
           value=" <?php echo takeValueBdd( 
               'id', $_SESSION['id'], 'users','email', $bdd) 
                 ?>"
           required></label></br>

    <label for="password">Password</br>
    <input placeholder="Insert your password" 
           type="password" 
           name="password" 
           ></label></br>

    <label for="password_confirmaton">Password Confirmation</br>
    <input placeholder="Confirm your password" 
           type="password" 
           name="password_confirmation" 
           value="" 
           ></label></br>

    <input type="submit" 
           name="submit_setting" 
           value="CONFIRM"></br>
</form> 
    
<h2>
     <?php 
           if(isset($_SESSION['display_confirmation'])) 
            { echo $_SESSION['display_confirmation']; }
       ?>  
</h2>

</body>
</html

