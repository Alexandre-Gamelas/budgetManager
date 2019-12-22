<?php
include "../classes/User.php";
session_start();
require_once "../connections/connection.php";

$name = $_POST['name'];
$value = $_POST['value'];
$categoria = $_POST['idCat'];
$date = date('Y-m-d');
$userId = $_SESSION['user']->getId();

//getLastID
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT id_compras FROM `compras` ORDER BY `compras`.`id_compras` DESC ";

if (mysqli_stmt_prepare($stmt, $query)) {
    if (mysqli_stmt_execute($stmt)) {
        if(mysqli_stmt_bind_result($stmt, $id)){
            if(mysqli_stmt_fetch($stmt)){
                $id++;
            } else {
                echo mysqli_stmt_error($stmt);
                header("Location: ../app.php?f=purchaseNo");
            }
        } else {
            echo mysqli_stmt_error($stmt);
            header("Location: ../app.php?f=purchaseNo");
        }
    } else {
        echo mysqli_stmt_error($stmt);
        header("Location: ../app.php?f=purchaseNo");
    }
    mysqli_stmt_close($stmt);
}

//create purchase
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO compras (id_compras, nome, valor, ref_categorias) VALUES (?, ?,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'ssss', $id, $name, $value, $categoria);
    if (mysqli_stmt_execute($stmt)) {
        echo "yes purchase";
    }else{
        echo mysqli_stmt_error($stmt);
        header("Location: ../app.php?f=purchaseNo");
    }
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_stmt_error($stmt);
    header("Location: ../app.php?f=purchaseNo");
}
mysqli_close($link);

echo '<br>';

//insert purchase into user
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO utilizadores_has_compras (ref_utilizadores, ref_compras, data) VALUES (?,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'sss', $userId, $id, $date);
    if (mysqli_stmt_execute($stmt)) {
        echo "yes user has purchase";
        header("Location: ../app.php?f=purchaseYes");
    }else{
        echo mysqli_stmt_error($stmt);
        header("Location: ../app.php?f=purchaseNo");
    }
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_stmt_error($stmt);
    header("Location: ../app.php?f=purchaseNo");
}
mysqli_close($link);


