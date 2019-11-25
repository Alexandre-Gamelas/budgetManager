<?php
$distribution = new Distribution($user->getCategorias());
$user->setDistribution($distribution);
?>
<script>
    var labelsD = <?php echo $distribution->publishLabels(); ?>;
    var valuesD = <?php echo $distribution->publishPercent(); ?>;
</script>

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
            <h2 class="mb-1"><?= $distribution->getMaxPercent()->getPercentage()?>%</h2>
            <p class="mb-0"><?= $distribution->getMaxPercent()->getName()?></p>
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

        <?php
        $categorias = $distribution->getCategorias();
        foreach ($categorias as $categoria){
            ?>
            <section class="row mt-4 align-items-center">
                <article class="col-2 text-center">
                    <i class="fas p-3 <?= $categoria->getIcon()?> rounded-circle bg-grey <?= $categoria->getColor()?> "></i>
                </article>

                <article class="col-5">
                    <p class="mb-0 vmin4 dark-blue"><?= $categoria->getName()?></p>
                    <p class="mb-0 vmin4 secondary-blue"><?= $categoria->getCount()?> Transactions</p>
                </article>

                <article class="col-5 text-right">
                    <p class="mb-0 vmin4 secondary-blue"><?= $categoria->getTotal()?>€ out 650€</p>
                </article>
            </section>
            <?php
        }
        ?>
    </div>
</div>
<script src="js/distributionChart.js"></script>
