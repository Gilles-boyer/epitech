<?php
session_start();
////////////////////////include////////////////////////////////////////////////
spl_autoload_register(function ($class) {
    include_once('class/' . $class . '.class.php');
});
/////////////////////////connect_bdd///////////////////////////////////////////
$bdd = new Bdd;
/////////////////////////objet User///////////////////////////////////////////
if (!empty($_SESSION['login'])) {
    $nouveauTab = unserialize($_SESSION['login']);
    $user = $nouveauTab["monObjet"];
}
////////////////////////Error list/////////////////////////////////////////////

$error_table = [
    1 => "* Invalid firstname",
    2 => "* Invalid lastname",
    3 => "* Invalid email",
    4 => "* Invalid password",
    5 => "* Invalid password confirmation",
    6 => "* this User already exist",
    7 => "* Incorrect login",
    8 => "* Incorrect password",
    9 => "* User do not exist",
    13 => "* Incorrect file picture",
    /************ADMIN***************/
    10 => "* you can't delete an admin !",
    11 => "* you are not an admin !",
    12 => "* Are you sure you want to delete this product ?",
    14 => "* There are a problem with a color",
    15 => "* There are a problem with a size",
    16 => "* There are a problem with a genre",
    17 => "* There are a problem with a name Product",
    18 => "* There are a problem with a reference product",
    19 => "* There are a problem with a price",
    20 => "* There are a problem with a short description",
    21 => "* There are a problem with a long description",
    22 => "* There are a problem with a discount",
    23 => "* There are a problem with a quantity",
    24 => "* There are a problem with a image",
    26 => "* There are a problem with your search",
    25 => "* Invalid Id"
];
////////////////////////////confirmation list//////////////////////////////////
$confirmation_table = [
    1 => "Valid firstname.",
    2 => "Valid lastname.",
    3 => "Valid email.",
    4 => "Valid password.",
    5 => "Your account is modified.",
    6 => "Your account is created.",
    /************ADMIN***************/
    7 => "Admin account is created.",
    8 => "User is become admin.",
    9 => "User remove Mode Admin",
    10 => "User is Edited.",
    11 => "User is Deleted.",
    12 => "All products are displayed.",
    13 => "The product is edited.",
    14 => "The New product is Added.",
    15 => "The product is Deleted",
    16 => "The new category is created",
    17 => "The picture is download",
    18 => "The product is visible",
    19 => "The product is invisible"

];
///////////////////////////////////////////////////////////////////////////////
/////////////////////////////FORM Sign-up//////////////////////////////////////
if (isset($_POST['submitInscription'])) {

    $_SESSION['lastName'] =
        $lastName =
        Control::formatValue($_POST['lastName']);
    $_SESSION['firstName'] =
        $firstName =
        Control::formatValue($_POST['firstName']);
    $_SESSION['email'] =
        $email =
        Control::formatValue($_POST['email']);
    $password =
        Control::formatValue($_POST['password']);
    $confirmPassword =
        Control::formatValue($_POST['passwordConfirmation']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorLastName']);
    unset($_SESSION['errorFirstName']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorConfirm']);

    if (Control::fieldExist(
        'users',
        'email',
        'email',
        'email',
        $email,
        $bdd
    )) {
        $_SESSION['errorEmail'] = $error_table[6];
    } elseif (
        !(Control::checkValue($lastName)
            and Control::checkLen($lastName, 2, 21))
    ) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (
        !(Control::checkValue($firstName)
            and Control::checkLen($firstName, 2, 21))
    ) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[3];
    } elseif (
        !(Control::checkValue($password)
            and Control::checkLen($password, 2, 12)
            and preg_match($pattern, $password))
    ) {
        $_SESSION['errorPassword'] = $error_table[4];
    } elseif (
        !(control::checkValue($confirmPassword)
            and $password == $confirmPassword)
    ) {
        $_SESSION['errorConfirm'] = $error_table[5];
    } else {
        Users::inscriptionUser(
            $firstName,
            $lastName,
            $email,
            $password,
            $bdd
        );
        $_SESSION['confirmation'] = $confirmation_table[6];
        unset($_SESSION['lastName']);
        unset($_SESSION['firstName']);
        unset($_SESSION['email']);
    }
   return header('location:formsignup.php');
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////FORM Sign-in////////////////////////////////////////
if (isset($_POST['submit_signin'])) {
    $_SESSION['email'] = $email = Control::formatValue($_POST['email']);
    $password = Control::formatValue($_POST['password']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    $remember = Control::formatValue($_POST['remember']);
    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorPassword']);

    if (!Control::fieldExist(
        'users',
        'email',
        'email',
        'email',
        $email,
        $bdd
    )) {
        $_SESSION['errorEmail'] = $error_table[9];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[7];
    } elseif (
        !(Control::checkValue($password)
            and Control::checkLen($password, 2, 12)
            and preg_match($pattern, $password)
            and Users::controlUser($email, $password, $bdd))
    ) {
        $_SESSION['errorPassword'] = $error_table[8];
    } else {
        $objet = new Users($email, $bdd);

        $_SESSION['confirmation'] =
            "Welcome " . $objet->getFirstName() . ' ' . $objet->getLastName();
        $tab = array("monObjet" => $objet);
        $_SESSION['login'] = serialize($tab);
        if ($remember == 1) {
            setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600);
        }
    }
   return header('location:formsignin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////LOGOUT/////////////////////////////////////////
if (isset($_GET['logout'])) {
    session_unset();
    setcookie('login');
   return header('location:index.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////SETTING////////////////////////////////////////
if (isset($_POST['submitSettingUser'])) {
    $lastName = Control::formatValue($_POST['lastName']);
    $firstName = Control::formatValue($_POST['firstName']);
    $email = Control::formatValue($_POST['email']);
    $password = Control::formatValue($_POST['password']);
    $confirmPassword = Control::formatValue($_POST['passwordConfirmation']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorLastName']);
    unset($_SESSION['errorFirstName']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorConfirm']);

    if (
        !(Control::checkValue($lastName)
            and Control::checkLen($lastName, 2, 21))
    ) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (
        !(Control::checkValue($firstName)
            and Control::checkLen($firstName, 2, 21))
    ) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[3];
    } else {

        if (Control::checkvalue($password)) {
            if (
                !(Control::checkLen($password, 2, 12)
                    and preg_match($pattern, $password))
            ) {
                $_SESSION['errorPassword'] = $error_table[4];
            } elseif (
                !(control::checkValue($confirmPassword)
                    and $password == $confirmPassword)
            ) {
                $_SESSION['errorConfirm'] = $error_table[5];
            } else {
                $user->updatePassword($password, $bdd);
            }
        }
        $user->updateUserWithoutPassword($firstName, $lastName, $email, $bdd);
        $_SESSION['confirmation'] = $confirmation_table[5];
        unset($_SESSION['lastName']);
        unset($_SESSION['firstName']);
        unset($_SESSION['email']);
        unset($_SESSION['login']);

        $objet = new Users($email, $bdd);
        $tab = array("monObjet" => $objet);
        $_SESSION['login'] = serialize($tab);
        if (!empty($_COOKIE['login'])) {
            setcookie('login');
            setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600);
        }
    }
  return  header('location: settingUser.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////DELETE USER////////////////////////////////////
if (isset($_GET['iddelete'])) {
    $id = $_GET['id_admin'];

    $bdd->deleteValueBddWhere('users', 'id', $id);
    $_SESSION['confirmation'] = $confirmation_table[11];

   return header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////ADMIN MODE/////////////////////////////////////
if (isset($_GET['admin'])) {
    $id = $_GET['id_admin'];

    if ($_GET['admin'] == 1) {
        $champs = 'admin = ?';
        $array = [1];
        $bdd->updateValueBddWhere('users', $champs, $array, 'id', $id);

        $_SESSION['confirmation'] = $confirmation_table[8];
    } elseif ($_GET['admin'] == 0) {
        $champs = 'admin = ?';
        $array = [0];
        $bdd->updateValueBddWhere('users', $champs, $array, 'id', $id);

        $_SESSION['confirmation'] = $confirmation_table[9];
    }
  return  header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////Product_img_control////////////////////////////
if (isset($_POST['control_img'])) {
    unset($_SESSION['errorConfirm']);
    if ($_FILES["photo"]["error"] == 0) {
        $allowed = array(
            "jpg" => "image/jpg", "jpeg" => "image/jpeg",
            "gif" => "image/gif", "png" => "image/png"
        );
        $filename = $_FILES["imgPolo"]["name"];
        $filetype = $_FILES["imgPolo"]["type"];
        $filesize = $_FILES["imgPolo"]["size"];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    }

    if (!isset($filename)) {
        $_SESSION['errorConfirm'] = $error_table[13];
    } elseif (!array_key_exists($ext, $allowed)) {
        $_SESSION['errorConfirm'] = $error_table[13];
    } elseif ($filesize > 10000) {
        $_SESSION['errorConfirm'] = $error_table[13];
    } else {
        $_SESSION['imgProduct'] = $filename;
        move_uploaded_file($_FILES["imgPolo"]["tmp_name"], "img/" . $filename);
        $_SESSION['confirmationCAT'] = $confirmation_table[17];
    }
   return header('location: product.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////create_product/////////////////////////////////
if (isset($_POST['create_product'])) {

    unset($_SESSION['error_product']);
    $name =
        $_SESSION['nameProd'] =
        Control::formatValue($_POST['nameProduct']);
    $refProd =
        $_SESSION['refProd'] =
        Control::formatValue($_POST['product_ID']);
    $priceProd =
        $_SESSION['priceProd'] =
        $_POST['priceProduct'];
    $color_id =
        $_SESSION['color_id'] =
        Control::formatValue($_POST['color_id']);
    $genre_id =
        $_SESSION['genre_id'] =
        Control::formatValue($_POST['genre_id']);
    $size_id =
        $_SESSION['size_id'] =
        Control::formatValue($_POST['size_id']);
    $description_short =
        $_SESSION['description_short'] =
        Control::formatValue($_POST['description_short']);
    $description_long =
        $_SESSION['description_long'] =
        Control::formatValue($_POST['description_long']);
    $discountb =
        $_SESSION['discountb'] = $_POST['discountb'];
    $quantity =
        $_SESSION['quantity'] =
        Control::formatValue($_POST['quantity']);
    $img_adresse =
        $_SESSION['img_adresse'] =
        Control::formatValue($_POST['img_adresse']);

    if (!Control::checkValue($name)) {
        $_SESSION['error_product'] = $error_table[17];
    } elseif (!control::checkValue($refProd)) {
        $_SESSION['error_product'] = $error_table[18];
    } elseif (!control::checkValue($priceProd)) {
        $_SESSION['error_product'] = $error_table[19];
    } elseif (!control::checkValue($color_id)) {
        $_SESSION['error_product'] = $error_table[14];
    } elseif (!control::checkValue($genre_id)) {
        $_SESSION['error_product'] = $error_table[16];
    } elseif (!control::checkValue($size_id)) {
        $_SESSION['error_product'] = $error_table[15];
    } elseif (!control::checkValue($description_short)) {
        $_SESSION['error_product'] = $error_table[20];
    } elseif (!isset($description_long)) {
        $_SESSION['error_product'] = $error_table[21];
    } elseif (!isset($discountb)) {
        $_SESSION['error_product'] = $error_table[22];
    } elseif (!control::checkValue($quantity)) {
        $_SESSION['error_product'] = $error_table[23];
    } elseif (!control::checkValue($img_adresse)) {
        $_SESSION['error_product'] = $error_table[24];
    } elseif (!Control::checkLen($name, 4, 40)) {
        $_SESSION['error_product'] = $error_table[17];
    } elseif (!Control::checkLen($refProd, 2, 30)) {
        $_SESSION['error_product'] = $error_table[18];
    } elseif ($priceProd < 10 && 1000 > $priceProd) {
        $_SESSION['error_product'] = $error_table[19];
    } elseif ($color_id < 0 && 500 > $color_id) {
        $_SESSION['error_product'] = $error_table[14];
    } elseif ($genre_id < 0 && 500 > $genre_id) {
        $_SESSION['error_product'] = $error_table[16];
    } elseif ($size_id < 0 && 500 > $size_id) {
        $_SESSION['error_product'] = $error_table[15];
    } elseif (!Control::checkLen($description_short, 2, 200)) {
        $_SESSION['error_product'] = $error_table[20];
    } elseif (!Control::checkLen($description_long, 10, 300)) {
        $_SESSION['error_product'] = $error_table[21];
    } elseif ($discountb > 30) {
        $_SESSION['error_product'] = $error_table[22];
    } elseif ($quantity < 0 && 500 > $quantity) {
        $_SESSION['error_product'] = $error_table[23];
    } elseif (!Control::checkLen($img_adresse, 2, 300)) {
        $_SESSION['error_product'] = $error_table[24];
    } elseif (Control::fieldExist(
        'products',
        'product_ID',
        'product_ID',
        'product_ID',
        $refProd,
        $bdd
    )) {
        $_SESSION['error_product'] = $error_table[18];
    } else {
        $table = "products( name,product_ID, 
                            price,
                            color_id,
                            genre_id,
                            size_id,
                            description_short,
                            description_long,
                            discountb,
                            quantity,
                            img_adresse)";
        $value = "  '$name',
                    '$refProd',
                    '$priceProd',
                    '$color_id',
                    '$genre_id',
                    '$size_id',
                    '$description_short',
                    '$description_long',
                    '$discountb',
                    '$quantity',
                    '$img_adresse'";
        $bdd->insertValueBdd($table, $value);
        $_SESSION['confirmation'] = $confirmation_table[14];

        unset($_SESSION['nameProd']);
        unset($_SESSION['refProd']);
        unset($_SESSION['priceProd']);
        unset($_SESSION['color_id']);
        unset($_SESSION['genre_id']);
        unset($_SESSION['size_id']);
        unset($_SESSION['description_short']);
        unset($_SESSION['description_long']);
        unset($_SESSION['discountb']);
        unset($_SESSION['quantity']);
        unset($_SESSION['img_adresse']);
    }

   return header('location: product.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////create_category/////////////////////////////////
if (isset($_POST['create_category'])) {

    unset($_SESSION['errorCAT']);

    if (isset($_POST['color'])) {
        $color = Control::formatValue($_POST['color']);

        if (!Control::checkValue($color)) {
            $_SESSION['errorCAT'] = $error_table[14];
        } elseif (!Control::checkLen($color, 2, 20)) {
            $_SESSION['errorCAT'] = $error_table[14];
        } elseif (Control::fieldExist(
            'categories',
            'name',
            'name',
            'name',
            $color,
            $bdd
        )) {
            $_SESSION['errorCAT'] = $error_table[14];
        } else {
            $color = strtoupper($color);
            $table = "categories(name,parent_id)";
            $value = "'$color', '32'";
            $bdd->insertValueBdd($table, $value);
            $_SESSION['confirmationCAT'] = $confirmation_table[16];
        }
    }
    if (isset($_POST['size'])) {
        $size = Control::formatValue($_POST['size']);

        if (!Control::checkValue($size)) {
            $_SESSION['errorCAT'] = $error_table[15];
        } elseif (!Control::checkLen($size, 1, 10)) {
            $_SESSION['errorCAT'] = $error_table[15];
        } elseif (Control::fieldExist(
            'categories',
            'name',
            'name',
            'name',
            $size,
            $bdd
        )) {
            $_SESSION['errorCAT'] = $error_table[15];
        } else {
            $size = strtoupper($size);
            $table = "categories(name,parent_id)";
            $value = "'$size', '34'";
            $bdd->insertValueBdd($table, $value);
            $_SESSION['confirmationCAT'] = $confirmation_table[16];
        }
    }
    if (isset($_POST['genre'])) {
        $genre = Control::formatValue($_POST['genre']);

        if (!Control::checkValue($genre)) {
            $_SESSION['errorCAT'] = $error_table[16];
        } elseif (!Control::checkLen($genre, 2, 20)) {
            $_SESSION['errorCAT'] = $error_table[16];
        } elseif (Control::fieldExist(
            'categories',
            'name',
            'name',
            'name',
            $genre,
            $bdd
        )) {
            $_SESSION['errorCAT'] = $error_table[16];
        } else {
            $genre = strtoupper($genre);
            $table = "categories(name,parent_id)";
            $value = "'$genre', '33'";
            $bdd->insertValueBdd($table, $value);
            $_SESSION['confirmationCAT'] = $confirmation_table[16];
        }
    }
  return header('location: product.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////ADMIN MODE/////////////////////////////////////
if (isset($_GET['visibility'])) {
    $id = $_GET['id_product'];

    if ($_GET['visibility'] == 1) {
        $champs = 'visibility = ?';
        $array = [1];
        $bdd->updateValueBddWhere('products', $champs, $array, 'id', $id);
        $_SESSION['confirmation'] = $confirmation_table[18];
    } elseif ($_GET['visibility'] == 0) {
        $champs = 'visibility = ?';
        $array = [0];
        $bdd->updateValueBddWhere('products', $champs, $array, 'id', $id);

        $_SESSION['confirmation'] = $confirmation_table[19];
    }
   return header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////DELETE PRODUCT/////////////////////////////////
if (isset($_GET['prodDelete'])) {
    $id = $_GET['id_product'];

    $bdd->deleteValueBddWhere('products', 'id', $id);
    $_SESSION['confirmation'] = $confirmation_table[15];

   return header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////EDIT Product root//////////////////////////////
if (isset($_GET['editProd'])) {
    unset($_SESSION['error_product']);
    $id = $_GET['id_product'];

    if (!isset($id)) {
        $_SESSION['error_product'] = $error_table[25];
    } elseif (!$id > 0) {
        $_SESSION['error_product'] = $error_table[25];
    } else {
        $_SESSION['idProdModify'] = $id;
        return header('location: editProduct.php');
    }
   return header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////EDIT Product///////////////////////////////////
if (isset($_POST['update_product'])) {

    unset($_SESSION['error_product']);
    $id_prod = $_SESSION['idProdModify'];
    $name =
        $_SESSION['nameProd'] =
        Control::formatValue($_POST['nameProduct']);
    $refProd =
        $_SESSION['refProd'] =
        Control::formatValue($_POST['product_ID']);
    $priceProd =
        $_SESSION['priceProd'] =
        Control::formatValue($_POST['priceProduct']);
    $color_id =
        $_SESSION['color_id'] =
        Control::formatValue($_POST['color_id']);
    $genre_id =
        $_SESSION['genre_id'] =
        Control::formatValue($_POST['genre_id']);
    $size_id =
        $_SESSION['size_id'] =
        Control::formatValue($_POST['size_id']);
    $description_short =
        $_SESSION['description_short'] =
        Control::formatValue($_POST['description_short']);
    $description_long =
        $_SESSION['description_long'] =
        Control::formatValue($_POST['description_long']);
    $discountb = $_SESSION['discountb'] = $_POST['discountb'];
    $quantity =
        $_SESSION['quantity'] =
        Control::formatValue($_POST['quantity']);
    $img_adresse =
        $_SESSION['img_adresse'] =
        Control::formatValue($_POST['img_adresse']);

    if (!Control::checkValue($name)) {
        $_SESSION['error_product'] = $error_table[17];
    } elseif (!control::checkValue($refProd)) {
        $_SESSION['error_product'] = $error_table[18];
    } elseif (!control::checkValue($priceProd)) {
        $_SESSION['error_product'] = $error_table[19];
    } elseif (!control::checkValue($color_id)) {
        $_SESSION['error_product'] = $error_table[14];
    } elseif (!control::checkValue($genre_id)) {
        $_SESSION['error_product'] = $error_table[16];
    } elseif (!control::checkValue($size_id)) {
        $_SESSION['error_product'] = $error_table[15];
    } elseif (!control::checkValue($description_short)) {
        $_SESSION['error_product'] = $error_table[20];
    } elseif (!isset($description_long)) {
        $_SESSION['error_product'] = $error_table[21];
    } elseif (!isset($discountb)) {
        $_SESSION['error_product'] = $error_table[22];
    } elseif (!isset($quantity)) {
        $_SESSION['error_product'] = $error_table[23];
    } elseif (!control::checkValue($img_adresse)) {
        $_SESSION['error_product'] = $error_table[24];
    } elseif (!Control::checkLen($name, 4, 40)) {
        $_SESSION['error_product'] = $error_table[17];
    } elseif (!Control::checkLen($refProd, 2, 30)) {
        $_SESSION['error_product'] = $error_table[18];
    } elseif ($priceProd < 10 && 1000 > $priceProd) {
        $_SESSION['error_product'] = $error_table[19];
    } elseif ($color_id < 0 && 500 > $color_id) {
        $_SESSION['error_product'] = $error_table[14];
    } elseif ($genre_id < 0 && 500 > $genre_id) {
        $_SESSION['error_product'] = $error_table[16];
    } elseif ($size_id < 0 && 500 > $size_id) {
        $_SESSION['error_product'] = $error_table[15];
    } elseif (!Control::checkLen($description_short, 2, 200)) {
        $_SESSION['error_product'] = $error_table[20];
    } elseif (!Control::checkLen($description_long, 10, 300)) {
        $_SESSION['error_product'] = $error_table[21];
    } elseif ($discountb > 30) {
        $_SESSION['error_product'] = $error_table[22];
    } elseif ($quantity < 0 && 500 > $quantity) {
        $_SESSION['error_product'] = $error_table[23];
    } elseif (!Control::checkLen($img_adresse, 2, 300)) {
        $_SESSION['error_product'] = $error_table[24];
    } elseif (!Control::fieldExist(
        'products',
        'product_ID',
        'product_ID',
        'product_ID',
        $refProd,
        $bdd
    )) {
        $_SESSION['error_product'] = $error_table[18];
    } else {
        $champs = ' name =?,
                    product_ID=?, 
                    price=?,
                    color_id=?,
                    genre_id=?,
                    size_id=?,
                    description_short=?,
                    description_long=?,
                    discountb=?,
                    quantity=?,
                    img_adresse=?';
        $array = [
            $name,
            $refProd,
            $priceProd,
            $color_id,
            $genre_id,
            $size_id,
            $description_short,
            $description_long,
            $discountb,
            $quantity,
            $img_adresse
        ];
        $bdd->updateValueBddWhere('products', $champs, $array, 'id', $id_prod);
        $_SESSION['confirmation'] = $confirmation_table[13];

        unset($_SESSION['nameProd']);
        unset($_SESSION['refProd']);
        unset($_SESSION['priceProd']);
        unset($_SESSION['color_id']);
        unset($_SESSION['genre_id']);
        unset($_SESSION['size_id']);
        unset($_SESSION['description_short']);
        unset($_SESSION['description_long']);
        unset($_SESSION['discountb']);
        unset($_SESSION['quantity']);
        unset($_SESSION['img_adresse']);
        unset($_SESSION['idProdModify']);
    }

    return header('location: editProduct.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////EDIT Product///////////////////////////////////
if (isset($_POST['searchform'])) {
    $search = Control::formatValue($_POST['searchform']);

    if(!Control::checkValue($search)) {
        $_SESSION['error_search'] = $error_table[26];
    } elseif (!Control::checkLen($search,0,50)) {
        $_SESSION['error_search'] = $error_table[26];
    } else {
        $_SESSION['search'] = $search;
    } 
   return header('location: search.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////filter Product///////////////////////////////////
if (isset($_GET['filter'])) {
    $search = Control::formatValue($_GET['filter']);

    if(!Control::checkValue($search)) {
        $_SESSION['error_search'] = $error_table[26];
    } elseif (!Control::checkLen($search,0,50)) {
        $_SESSION['error_search'] = $error_table[26];
    } else {
        $_SESSION['search'] = $search;
    } 
   return header('location: search.php');
}
header('location: index.php');