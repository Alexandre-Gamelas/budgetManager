<?php
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "SELECT id_cores, ref from cores";
$colors = array();

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_color, $color);
    while (mysqli_stmt_fetch($stmt)) {
        $colors[$id_color] = $color;
    }
} else {
    mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($link);