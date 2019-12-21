<!doctype html>
<html lang="en">
<?php
include "classes/User.php";
include "classes/Distribution.php";
include "classes/Categoria.php";
include "classes/Purchase.php";
include "classes/Week.php";
session_start();
$user = $_SESSION['user'];
?>
<?php include_once "componentes/head.php" ?>
<?php include_once "connections/connection.php" ?>
<?php
include_once "scripts/get_colors.php";
include_once "scripts/get_icons.php";
?>

<body class="bg-light-grey animated fadeIn">
<main class="container-fluid">
    <h4>Bem Vindo ao Budget Manager</h4>
    <h6>Comece Por Adicionar uma Categoria</h6>

    <form id="catForm" action="scripts/script_addCategory.php" method="post" class="row justify-content-center mt-5">
        <article class="col-12 col-lg-6">
            <h5 class="blue">Category</h5>
        </article>
        <div class="col-12"></div>
        <article class="col-8 col-lg-4 text-center">
            <input type="text" class="form-control" name="name">
        </article>
        <div class="col-12"></div>
        <article class="col-12 col-lg-6 mt-4 text-center">
            <h5 class="blue text-left">Color</h5>
            <?php
            foreach ($colors as $id => $color){
                ?>
                <i class="fas p-3 blue mr-1 bg-<?=$color?> rounded-circle colorCat" data-id="<?=$id?>"></i>
                <?php
            }
            ?>
        </article>
        <div class="col-12"></div>
        <article class="col-12 col-lg-6 mt-4 text-center">
            <h5 class="blue text-left">Icon</h5>
            <?php
            foreach ($icons as $id => $icon){
                ?>
                <i class="fas p-3 blue mr-1 <?= $icon ?> rounded-circle bg-grey iconCat" data-id="<?= $id ?>"></i>
                <?php
            }
            ?>
        </article>
        <button id="submitCat" class="button-1 mb-3 mt-3 col-4 col-lg-6">Enter</button>
        <input id="colorCatInput" type="text" class="d-none" name="color">
        <input id="iconCatInput" type="text" class="d-none" name="icon">
    </form>
</main>
</body>

<script>
    $(".iconCat").click(function () {
        $(".iconCat").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#iconCatInput").attr("value", $(this).attr("data-id"))

    })

    $(".colorCat").click(function () {
        $(".colorCat").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#colorCatInput").attr("value", $(this).attr("data-id"))
    })

    $("#submitCat").click(function () {
        $("#catForm").submit();
    })
</script>
</html>