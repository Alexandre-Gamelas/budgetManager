<?php
require_once "../connections/connection.php";
session_start();
$user = $_SESSION['user'];
$id = $_GET['id'];

$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "DELETE FROM categorias WHERE categorias.id_categorias = ?";
$colors = array();

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $id);
    if(mysqli_stmt_execute($stmt)){
       header("Location: ../app.php?f=deleteYes&v=budget");
   } else {
        header("Location: ../app.php?f=deleteNo&v=budget");
    }

} else {
    mysqli_stmt_error($stmt);
    header("Location: ../app.php?f=deleteNo&v=budget");
}
mysqli_stmt_close($stmt);
mysqli_close($link);

