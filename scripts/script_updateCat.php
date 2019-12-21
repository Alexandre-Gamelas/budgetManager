<?php
require "../classes/User.php";
session_start();
$values = $_POST;
$user = $_SESSION['user'];
$id = $user->getId();
$completed = false;

require "../connections/connection.php";

foreach ($values as $cat => $value){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "UPDATE orcamentos_has_categorias
            SET VALOR = ?
            where ref_orcamentos like ? and ref_categorias like ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'sss', $value, $id, $cat);
        if (mysqli_stmt_execute($stmt)) {
            echo "updated<br>";
            $completed = true;
        }else{
            echo mysqli_stmt_error($stmt);
            $completed = false;
        }
        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_stmt_error($stmt);
        $completed = false;
    }
    mysqli_close($link);
}
var_dump($completed);
if($completed){
    header("Location: ../app.php");
}