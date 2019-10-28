<div id="week" class="view">
    <?php
    $pageName = "This Week";
    include "componentes/top.php"
    ?>

    <section class="row justify-content-center mt-5">
        <article class="col-12 chart pl-1">
            <canvas class="chart" id="monthlyChart"></canvas>
        </article>
    </section>

    <div class="bg-white p-2 mt-5 week-card week-card-active" style="border-radius: 5px">
        <section class="row justify-content-center align-items-center">
            <article class="col-1 pl-0">
                <i class="fas fa-2x fa-question-circle blue"></i>
            </article>

            <article class="col-10 text-center">
                <h5 class="dark-blue mb-0">Click The Graph For More Details!</h5>
            </article>
        </section>
    </div>

    <div id="Mon" class="bg-white p-2 mt-5 week-card" style="border-radius: 5px">
        <section class="row justify-content-between align-items-end">
            <article class="col-8">
                <h4 class="dark-blue mb-0">Monday</h4>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>
    </div>

    <div id="Tue" class="bg-white p-2 mt-5 week-card" style="border-radius: 5px">
        <section class="row justify-content-between align-items-end">
            <article class="col-8">
                <h4 class="dark-blue mb-0">Tuesday</h4>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacines</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>
    </div>






</div>
<script src="js/weekChart.js"></script>