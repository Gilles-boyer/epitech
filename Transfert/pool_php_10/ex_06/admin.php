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
    <title>ADMIN SETTING</title>
</head>

<body>
    <h2>
        <?php if (isset($_SESSION['display_error'])) {
            echo $_SESSION['display_error'];
        }
        ?>
    </h2>

    <ul>
        <?php
            $req = $bdd->query('SELECT email FROM users ORDER BY email');
            while ($display = $req->fetch()) {
        ?>
        <li>
            <a href="router.php?delete=<?php echo $display['email'] ?>">
                    <?php echo $display['email'] ?>
            </a>
        </li>
        <?php
            }
        ?>
    </ul>
    <h2>
        <?php
        if (isset($_SESSION['display_confirmation'])) {
            echo $_SESSION['display_confirmation'];
        }
        ?>
    </h2>
</body>
</html>