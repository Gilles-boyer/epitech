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
           value="<?php if (isset($_SESSION['title'])){
                             echo $_SESSION['title'];
           }?>"
           required> </label></br>

    <label for="content">Content</label>
    <br />
    <textarea name="content" rows="10" cols="50"required>
        <?php if (isset($_SESSION['content'])) {
                   echo $_SESSION['content'];
        } ?>
    </textarea>
    <br />

    <input type="submit" 
           name="submit_newletter" 
           value="SUBMIT"
           ></br>
</form> 
    
<h2>
     <?php 
           if(isset($_SESSION['display_confirmation'])) 
            { echo $_SESSION['display_confirmation']; 
                header('location:index.php',20);}
       ?>  
</h2>

</body>
</html>