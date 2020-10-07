<?php
include_once('class/Bdd.class.php');
$bdd = new Bdd;
session_start();
if(isset($_GET['unset'])) {
    unset($_SESSION['confirmation']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once('header.php'); ?>

   <h2> <?php
    if(!$user->getAdmin()) {
        header('location: gil.index.php');
    } 
      if (isset($_SESSION['confirmation'])) {
        echo $_SESSION['confirmation'];
        header('Refresh: 1; admin.php?unset=');
      } ?> </h2>
    <form action="router.gil.php" method="get">
        <div class="form-group">
            <label for="id">Please choose a user :</label>
            <select required class="custom-select" name="id_admin" id="id">
                <option value="" selected>Choice User </option>
                <?php
                $test = $bdd->selectValueBdd('*', 'users');
                while ($donnees = $test->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>"> <?php echo $donnees['email'] . " 
                    " . $donnees['lastname'] . " 
                    " . $donnees['firstname'] . " ";
                                                                    if ($donnees['admin'] == true) {
                                                                        echo 'ADMIN';
                                                                    }
                                                                    ?></option>
                <?php
                } ?>
            </select>
        </div>
        <button name="admin" value = "0"  type="submit" class="btn btn-primary">Admin OFF</button>
        <button name="admin" value = "1" type="submit" class="btn btn-primary">Admin  ON </button>
        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Delete User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">WARNING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name = "iddelete"value = "DELETE">
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>