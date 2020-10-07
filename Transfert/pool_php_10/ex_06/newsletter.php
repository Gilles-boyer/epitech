<?php include_once('router.php');
session_start();
if ($_SESSION['admin'] == false) {
    header('location:index.php');
}
?>
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

<form action="router.php" class="form_newletter" method="post">

    <label for="title">Title</br>
    <input placeholder="Insert your title" 
           type="text" 
           name="title"
           minlength="2"
           maxlength="50"
           required> </label></br>

    <label for="content">Content</label>
    <br />
    <textarea name="content" rows="10" cols="50">
    </textarea>

    <input type="submit" 
           name="submit_newletter" 
           value="CONFIRM"></br>
</form> 
    
<h2>
     <?php 
           if(isset($_SESSION['display_confirmation'])) 
            { echo $_SESSION['display_confirmation']; }
       ?>  
</h2>

</body>
</html>