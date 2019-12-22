<!doctype html>
<html lang="en">
<?php
include "classes/User.php";
include "classes/Distribution.php";
include "classes/Categoria.php";
include "classes/Purchase.php";
include "classes/Week.php";
include "classes/Feedback.php";
session_start();
if(isset($_SESSION['user']))
    $user = $_SESSION['user'];
else
    header("Location: index.php")

?>
<?php include_once "componentes/head.php" ?>
<?php include_once "connections/connection.php" ?>
<?php
include_once "scripts/get_stats.php";

if(isset($_GET['v']))
    $start = $_GET['v'];
else
    $start = "distribution";

echo "<script>let start = '$start'</script>";

?>

<body class="bg-light-grey animated fadeIn">
    <main class="container-fluid">

       <?php
       if($distribution)
            include_once "views/distribution.php";
       else
           include_once "views/noDistribution.php"
       ?>
       <?php include_once "views/week.php" ?>
       <?php include_once "views/entry.php" ?>
       <?php include_once "views/budget.php" ?>
       <?php include_once "views/profile.php" ?>
       <?php include_once "componentes/modais/modais.php" ?>
    </main>

    <footer>
        <?php include_once "componentes/bot_menu.php" ?>
    </footer>
    <?php include_once "componentes/side_menu.php"?>
    <script src="js/bot_menu.js"></script>
</body>
<?php
if(isset($_GET['f']))
    $feedbackHandler = new Feedback($_GET['f']);
?>
</html>