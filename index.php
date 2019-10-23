<?php include_once "componentes/head.php" ?>
<body class="bg-light-grey">
    <header class="container-fluid">
        <?php
            $pageName = "Distribution";
            include_once "componentes/top.php"
        ?>
    </header>

    <main class="container-fluid">
        <section class="row justify-content-center mt-5 position-relative">
            <article class="col-10" id="boxChart">
                <canvas id="myPieChart"></canvas>
            </article>

            <article class="col-4 pos-center text-center">
                <h2 class="mb-1">33,5%</h2>
                <p>Fast Food</p>
            </article>
        </section>
    </main>

    <?php include_once "componentes/side_menu.php"?>
    <script src="js/Chart.min.js"></script>
    <script src="js/chart.js"></script>
</body>
</html>