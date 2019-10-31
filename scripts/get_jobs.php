<?php
function getJobs(){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT id_trabalhos, nome FROM trabalhos";
    $jobs = array();

    if (mysqli_stmt_prepare($stmt, $query)) {
        if (mysqli_stmt_execute($stmt)) {
            if(mysqli_stmt_bind_result($stmt, $id, $name)){
                while(mysqli_stmt_fetch($stmt)){
                    $jobs[$id] = $name;
                }
            } else {
                echo mysqli_stmt_error($stmt);
            }
        } else {
            echo mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }

    return $jobs;
}
