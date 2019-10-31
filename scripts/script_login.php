<?php
session_start();
require_once "../connections/connection.php";
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT id_utilizadores, utilizadores.nome, password from utilizadores WHERE email LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $mail);
    $mail = $_POST["email"];
    $password = $_POST["password"];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_user, $nome, $password_crypt);
    if (mysqli_stmt_fetch($stmt)) {
        if (password_verify($password, $password_crypt)) {
            echo "entra";
        }
    } else {
        mysqli_stmt_error($stmt);
    }
} else {
    mysqli_stmt_error($stmt);
}

