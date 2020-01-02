<?php
require_once "../connections/connection.php";
session_start();
session_destroy();
//var_dump($_POST);

/*******CREATE USER***********/
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO utilizadores (nome, email, password, ref_nacionalidades, ref_trabalhos, ref_papeis) VALUES (?,?,?,?,?,1)";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'sssss', $name, $mail, $password_cript, $nationality, $job);
    $name = $_POST["name"];
    $mail = strtolower($_POST["email"]);
    $password_cript = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nationality = $_POST['nationality'];
    $job = $_POST['job'];
    if (mysqli_stmt_execute($stmt)) {
        echo "yes";
    }else{
        echo mysqli_stmt_error($stmt);
        header("Location: ../register.php?f=registerNo");
    }
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_stmt_error($stmt);
    header("Location: ../register.php?f=registerNo");
}
mysqli_close($link);

/******GET ID************/
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT id_utilizadores FROM utilizadores WHERE email LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $mail);
    if (mysqli_stmt_execute($stmt)) {
        if(mysqli_stmt_bind_result($stmt, $id)){
            if(mysqli_stmt_fetch($stmt)){

            } else {
                echo mysqli_stmt_error($stmt);
                header("Location: ../register.php?f=registerNo");
            }
        } else {
            echo mysqli_stmt_error($stmt);
            header("Location: ../register.php?f=registerNo");
        }
    } else {
        echo mysqli_stmt_error($stmt);
        header("Location: ../register.php?f=registerNo");
    }
    mysqli_stmt_close($stmt);
}

/*********CREATE BUDGET*************/

$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO orcamentos (ref_utilizadores, total) VALUES (?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'id',$id, $total);
    $total = (double) $_POST["budget"];
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../login.php?f=registerYes");
    }else{
        echo mysqli_stmt_error($stmt);
        header("Location: ../register.php?f=registerNo");
    }
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_stmt_error($stmt);
    header("Location: ../register.php?f=registerNo");
}
mysqli_close($link);
