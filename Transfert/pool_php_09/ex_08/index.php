
<!DOCTYPE html>

  <html>

  <head>
    <meta charset="utf-8">
    <title>index</title>
  </head>

  <body>
    <?php
    //test si $_post est defini
    if(isset($_POST['name']))
    {
      echo "Hello ".$_POST['name']."!\n";
    }
    else
    {
     ?>

      <form class"form" action="" method="post">

        <label for="name">Your Name : </label></br>
        <input type="text" name="name" value="" placeholder="john DOE"> </br>

        <input type="submit" value = "Submit">

      </form>

    <?php
    }
     ?>

</body>
</html>
