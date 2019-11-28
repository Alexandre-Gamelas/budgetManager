<div id="budget" class="view">
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
            <h3 class="blue">€<?= $distribution->getTotalCat() ?></h3>
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
                    <section class="row justify-content-center align-items-center mt-4">
                        <article class="col-8">
                            <h5 class="dark-blue mb-0"><i class="fas <?= $categoria->getIcon()?>  pr-2 pl-0"></i><?= $categoria->getName()?></h5>
                        </article>

                        <article class="col-4 text-right">
                            <p class="secondary-dark-blue mb-0"><?= $categoria->getValorBudget()?>€</p>
                        </article>

                        <article class="col-12 mt-3">
                            <div class="progress">
                                <div class="progress-bar bg-<?=$categoria->getColor()?>" role="progressbar" style="width: <?=$budget->calcPercentage($categoria->getValorBudget())?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </article>
                    </section>
                <?php
            }
        ?>

        <section class="row justify-content-center mt-2">
            <article class="col-12 text-center">
                <p class="secondary-blue mb-0">Alocated: <?=$budget->getAlocated()?>€ out <?= $budget->getTotal()?>€ </p>
            </article>
        </section>
    </div>

    <section class="row justify-content-end mt-2">
        <article id="optionsBudget" class="col-10 text-right collapse pr-0">
            <i class="fas fa-plus p-3 rounded-circle bg-medium-blue blue"></i>
            <i class="far fa-edit ml-1 p-3 rounded-circle bg-medium-blue blue"></i>
        </article>

        <a data-toggle="collapse" href="#optionsBudget" role="button">
            <article class="col-1 text-right">
                <i class="fas fa-caret-down"></i>
            </article>
        </a>
    </section>





</div>
