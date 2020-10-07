<?php
include_once('class/Bdd.class.php');

$bdd = new Bdd;

function categoryTree($parent_id = 0, $sub_mark = ''){
    $db = new Bdd;
    $query = $db->selectValueBdd('*',"categories WHERE parent_id = $parent_id ");
   
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$row['id'].'">'.$sub_mark."> ".$row['name'].'</option>';
            categoryTree($row['id'], $sub_mark.'---');
        }
}
?>
<select name="category">
    <?php categoryTree(); ?>
</select>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="post">

        <input type="text" required>

        <input type="submit">

    </form>
</body>
</html>
