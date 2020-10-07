<?php

/* function for to check the form information
@par = $_post[''];
verify the variable exist
verify the variable is not Empty
verify the variable have the special character*/
function check_value($value)
{
  isset($value);
  empty($value);
}

$form_valid = false; //give true if the information of the form it's ok

if(isset($_POST['submit']))
{
  $name =         htmlspecialchars($_POST['name']);
  $mail =         htmlspecialchars($_POST['email']);
  $password =     htmlspecialchars($_POST['password']);
  $confirmation = htmlspecialchars($_POST['password_confirmaton']);

  if(check_value($name))
  {
    $error = "Invalid name";
  }
  elseif(!(strlen($name)>=3))
  {
    $error = "Invalid name ";
  }
  elseif(!(strlen($name)<=10))
  {
    $error = "Invalid name";
  }
  elseif(check_value($mail))
  {
    $error = "Invalid email";
  }
  elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
  {
    $error = "Invalid email";
  }
  elseif (check_value($password))
  {
    $error = "Invalid password";
  }
  elseif (!(strlen($password)>=3))
  {
    $error = "Invalid password";
  }
  elseif (!(strlen($password)<=10))
  {
    $error = "Invalid password";
  }
  elseif(check_value($confirmation))
  {
    $error = "Invalid password confirmation";
  }
  elseif(!($password == $confirmation))
  {
    $error = "Invalid password confirmation";
  }
  else
  {
    $form_valid = true;//information of the form it's ok
    $user_create = "User created";
  }
}

if($form_valid == true) // create file json and stock
{
  $passwordhash = password_hash($password, PASSWORD_DEFAULT);

  $json = array();

  $json['nom'] =      $name;
  $json['email'] =    $_POST['email'];
  $json['password'] = $passwordhash;
  $json['date'] =     date("d/m/y  H:h:i");

  $js = json_encode($json);

  file_put_contents('inscription.json', $js);//stock in indcription.json
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>

    <meta charset="utf-8">
    <title>INSCRIPTION</title>

  </head>

  <body>

    <h2><?php //code php
      //view the errors for the form
      if(isset($error))
      {
        echo $error;
      }
    ?></h2>


    <form action="" method="post">

      <label for="name">Name</label>
      <input type="text" name="name" value = "<?php if(isset($name)){ echo $name;} ?>" placeholder="John DOE" required> </br>

      <label for="email">Email</label>
      <input type="email" name="email"  placeholder="john.doe@xx.fr" required></br>

      <label for="password">Password</label></br>
      <input type="password" name="password" required></br>

      <label for="password_confirmaton">Password Confirmation</label></br>
      <input type="password" name="password_confirmaton" value="" required></br>

      <input type="submit" name="submit" value="CONFIRMER"></br>

    </form>

    <h2> <?php //code php
      if(isset($user_create))
      {
        echo $user_create; // echo inscription confirmed
      }
    ?></h2>


  </body>

</html>
