<?php
session_start();
require_once "../connections/connection.php";
require "../classes/User.php";
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT utilizadores.id_utilizadores, utilizadores.nome, utilizadores.password, nacionalidades.nome, trabalhos.nome, papeis.nome, orcamentos.total
from utilizadores
INNER JOIN nacionalidades ON utilizadores.ref_nacionalidades = id_nacionalidades
INNER JOIN papeis ON utilizadores.ref_papeis = id_papeis
INNER JOIN trabalhos ON utilizadores.ref_trabalhos = id_trabalhos
INNER JOIN orcamentos ON utilizadores.id_utilizadores = ref_utilizadores
WHERE utilizadores.email LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $mail);
    $mail = $_POST["email"];
    $password = $_POST["password"];
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $id_user, $nome, $password_crypt, $nationality, $job, $role, $budget);
        if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $password_crypt)) {
                $user = new User($id_user, $nome, $mail, $nationality, $budget, $role, $job);
                $_SESSION['user'] = $user;
                header("Location: ../app.php");
            } else {
                echo "wrong password mate";
            }
        } else {
            mysqli_stmt_error($stmt);
        }
    } else {
        mysqli_stmt_error($stmt);
    }
} else {
    mysqli_stmt_error($stmt);
}

