<?php
require_once "../classes/User.php";
session_start();
require_once "../connections/connection.php";

$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "INSERT INTO categorias (nome, ref_icons, ref_cores, ref_utilizador) VALUES (?, ?, ?, ?) ";
$stepOne = false;

if (mysqli_stmt_prepare($stmt, $query)) {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $color = $_POST['color'];
    $user = $_SESSION['user']->getId();

    mysqli_stmt_bind_param($stmt, 'ssss', $name, $icon, $color, $user);
    if (mysqli_stmt_execute($stmt)) {
        $stepOne = true;
    }else{
        echo mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_stmt_error($stmt);
}
mysqli_close($link);

//getId

$stepTwo = false;
if($stepOne){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT id_categorias FROM categorias WHERE nome like ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        if(mysqli_stmt_bind_param($stmt, 's', $name)) {
            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_bind_result($stmt, $id);

                if (mysqli_stmt_fetch($stmt)) {
                    $stepTwo = true;
                } else {
                    echo mysqli_stmt_error($stmt);
                }
            }   else{

                echo mysqli_stmt_error($stmt);

            }
            mysqli_stmt_close($stmt);
        } else {
            echo mysqli_stmt_error($stmt);
        }
    } else {
        echo mysqli_stmt_error($stmt);
    }
    mysqli_close($link);
}

if($stepTwo){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO orcamentos_has_categorias (ref_categorias, valor, ref_orcamentos) VALUES (?, 0, ?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss',$id, $user);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../app.php");
        }else{
            echo mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_stmt_error($stmt);
    }
    mysqli_close($link);
}