<?php
$categorias = $user->getCategorias();
$currentDate = new DateTime(date("Y-m-d"));
$currentWeek = $currentDate -> format("W");
$purchasesThisWeek = array();

foreach ($categorias as $categoria){
    $purchases = $categoria->getPurchases();
    foreach ($purchases as $purchase){
        $date = new DateTime($purchase->getDate());
        $week = $date->format("W");
        if($currentWeek==$week){
            array_push($purchasesThisWeek, $purchase);
        }
    }
}
$week = new Week($purchasesThisWeek);
?>

<script>
    var valuesW = <?php echo $week->publishTotals(); ?>;
</script>

<div id="week" class="view mb-5 pb-5">
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

    <?php
    $weekDays = $week->getWeek();
    foreach ($weekDays as $name => $day){
        ?>
            <div id="<?=$name?>" class="bg-white p-2 mt-5 week-card" style="border-radius: 5px">
                <section class="row justify-content-between align-items-end">
                    <article class="col-8">
                        <h4 class="dark-blue mb-0"><?=$name?></h4>
                    </article>
                </section>

                <?php
                    foreach ($day as $purchase){
                        $categoria = $user->figureOutCategoria($purchase);
                        $icon = $categoria->getIcon();
                        $color = $categoria->getColor();
                        $name = $purchase->getName();
                        $value = $purchase->getValor();
                        ?>
                            <section class="row mt-4 align-items-center">
                                <article class="col-2 text-center">
                                    <i class="fas p-3 <?=$icon?> rounded-circle bg-grey <?=$color?>"></i>
                                </article>

                                <article class="col-5">
                                    <p class="mb-0 vmin4 dark-blue"><?=$name?></p>
                                </article>

                                <article class="col-5 text-right">
                                    <p class="mb-0 vmin4 secondary-blue"><?=$value?>€</p>
                                </article>
                            </section>
                        <?php
                    }

                ?>
            </div>
        <?php
    }

    ?>

</div>
<script src="js/weekChart.js"></script>