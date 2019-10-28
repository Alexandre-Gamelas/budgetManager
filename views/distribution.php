<div id="distribution" class="view">
    <?php
        $pageName = "Distribution";
        include "componentes/top.php"
    ?>

    <section class="row justify-content-center mt-5 position-relative">
        <article class="col-10 chart" id="boxChart">
            <canvas id="myPieChart"></canvas>
        </article>

        <article class="pos-center text-center" style="z-index: -10000">
            <h2 class="mb-1">33,5%</h2>
            <p class="mb-0">Fast Food</p>
        </article>
    </section>

    <div class="p-2 mt-5 costum-bg">
        <section class="row justify-content-between align-items-end">
            <article class="col-8">
                <h4 class="dark-blue mb-0">Distribution</h4>
            </article>

            <article class="col-4">
                <p class="mb-0 vmin4 secondary-blue text-right">This Month</p>
            </article>
        </section>

        <!-- UMA CARTA -->
        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Health</p>
                <p class="mb-0 vmin4 secondary-blue">18 Transactions</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">480€ out 650€</p>
            </article>
        </section>

        <!-- UMA CARTA -->
        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-utensils rounded-circle bg-grey green"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Food</p>
                <p class="mb-0 vmin4 secondary-blue">33 Transactions</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">230€ out 400€</p>
            </article>
        </section>

        <!-- UMA CARTA -->
        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-beer rounded-circle bg-grey orange"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Drinks</p>
                <p class="mb-0 vmin4 secondary-blue">7 Transactions</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue"> 15€ out 50€</p>
            </article>
        </section>
    </div>
</div>
<script src="js/distributionChart.js"></script>
