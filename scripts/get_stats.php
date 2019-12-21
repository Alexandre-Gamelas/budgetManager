<?php
$id_user = $user->getId();
$categorias = array();
$favourites = array();


//get all categories
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT DISTINCT categorias.id_categorias, categorias.nome, icons.ref, cores.ref, orcamentos_has_categorias.valor FROM categorias
  Inner join utilizadores  ON categorias.ref_utilizador = id_utilizadores
  INNER JOIN cores ON categorias.ref_cores = id_cores
  INNER JOIN icons ON categorias.ref_icons = id_icons
  INNER JOIN orcamentos_has_categorias  ON categorias.id_categorias = ref_categorias
WHERE categorias.ref_utilizador = ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $id_user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_cat, $name_cat, $icon, $color, $valor);

    $contador = 0;
    while (mysqli_stmt_fetch($stmt)) {
        $contador++;
        $categoria = new Categoria($id_cat, $name_cat, $icon, $color, $valor);
        array_push($categorias, $categoria);
    }

    if($contador == 0){
        header("Location: ../newUser.php");
    }
} else {
    mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($link);

//get all purchases
$month = date('m');
foreach ($categorias as $categoria){
    $purchases = array();
    $id_cat = $categoria->getId();
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT compras.id_compras, compras.nome, compras.valor, utilizadores_has_compras.data FROM compras
            INNER JOIN utilizadores_has_compras  ON compras.id_compras = ref_compras
            WHERE ref_utilizadores = ? and ref_categorias = ? and utilizadores_has_compras.data like '%-$month-%'";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss', $id_user, $id_cat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_purchase, $name_purchase, $value_purchase, $date_purchase);
        $contador = 0;

        while (mysqli_stmt_fetch($stmt)) {
            $contador++;
            $purchase = new Purchase($id_purchase, $name_purchase, $value_purchase, $date_purchase, $categoria->getId());
            array_push($purchases, $purchase);
        }

        if($contador == 0){
            $distribution = false;
        } else {
            $distribution = true;
        }

    } else {
        mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    $categoria->setPurchases($purchases);
}
$user->setCategorias($categorias);
$alocated = 0;
foreach ($categorias as $categoria){
    $alocated+=$categoria->getValorBudget();
}
$user->getBudget()->setAlocated($alocated);

//get all favourites
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT ref_compras from favoritos WHERE ref_utilizadores = ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 's', $id_user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_fav);
    while (mysqli_stmt_fetch($stmt)) {
        array_push($favourites, $id_fav);
    }
} else {
    mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($link);


//part2 get all favourites
$finalFavourites = array();
foreach ($favourites as $favourite){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT compras.nome, compras.valor, ref_categorias FROM compras WHERE id_compras = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's',$favourite);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$name_purchase, $value_purchase, $categoria);
        if (mysqli_stmt_fetch($stmt)) {
            $purchase = new Purchase($favourite, $name_purchase, $value_purchase, "", $categoria);
            array_push($finalFavourites, $purchase);
        }
    } else {
        mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

$user->setFavourites($finalFavourites);
include_once "get_colors.php";
include_once "get_icons.php";

