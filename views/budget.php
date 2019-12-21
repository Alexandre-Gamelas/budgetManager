<div id="budget" class="view pb-5 mb-5">
    <?php
        $pageName = "Budget";
        include "componentes/top.php";

        $budget = $user->getBudget();
    ?>

    <section class="row justify-content-between align-items-center mt-5">
        <article class="col-5 costum-bg ml-3">
            <p class="secondary-blue mb-0">Budget</p>
            <h3 class="blue">€<?= $budget->getTotal() ?></h3>
        </article>

        <article class="col-5 costum-bg mr-3">
            <p class="secondary-blue mb-0">Total Expenses</p>
            <?php
                if($distribution) {
                    ?>
                    <h3 class="blue">€<?= $distribution->getTotalCat() ?></h3>
                    <?php
                } else {
                    ?>
                    <h3 class="blue">0€</h3>

                    <?php
                }
            ?>
        </article>
    </section>

    <div class="p-2 mt-5 costum-bg">
        <section class="row justify-content-center">
            <article class="col-12">
                <p class="secondary-blue">Current Budget</p>
            </article>
        </section>

        <!-- CADA SECTION É UMA CLASSE DE ORÇAMENTO -->
        <?php
            foreach($categorias as $categoria){
                ?>
                    <section id="categoria<?=$categoria->getId()?>" class="row justify-content-center align-items-center mt-4">
                        <article class="col-8">
                            <h5 class="dark-blue mb-0"><i class="fas <?= $categoria->getIcon()?>  pr-2 pl-0"></i><?= $categoria->getName()?></h5>
                        </article>

                        <article class="col-4 text-right">
                            <p class="secondary-dark-blue mb-0 absoluteValue"><?= $categoria->getValorBudget()?>€</p>
                        </article>

                        <article class="col-12 mt-3">
                            <div class="progress" style="width: 90%;">
                                <div class="progress-bar bg-<?=$categoria->getColor()?> percentageValue" role="progressbar" style="width: <?=$budget->calcPercentage($categoria->getValorBudget())?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <i class="pr-2 edit fas fa-pen <?=$categoria->getColor()?> mt-2" data-target="<?=$categoria->getId()?>"></i>
                            </div>
                        </article>

                        <article class="col-12">
                            <input name="<?=$categoria->getId()?>" form="formCat" id="range<?=$categoria->getId()?>" type="range" class="costum-range pt-5 mt-2 pb-3 d-none" data-start="<?= $categoria->getValorBudget()?>" disabled value="<?= $categoria->getValorBudget()?>" min="0" max="<?=$categoria->getValorBudget() + ($budget->getTotal() - $budget->getAlocated())?>">
                        </article>
                    </section>
                <?php
            }
        ?>

        <form class="row justify-content-center p-4" id="formCat" method="post" action="scripts/script_updateCat.php">
                <button class="button-1 col-6" type="submit">Save</button>
        </form>

        <section class="row justify-content-center mt-2">
            <article class="col-12 text-center">
                <p class="secondary-blue mb-0">Alocated: <span id="alocated"><?=$budget->getAlocated()?></span>€ out <?= $budget->getTotal()?>€ </p>
            </article>
        </section>
    </div>
</div>


<?php
    $total = $budget->getTotal();
    echo "<script>var totalBudget = $total</script>"
?>
<script src="js/budget.js"></script>