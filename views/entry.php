<div id="entry" class="view">
    <?php
    $pageName = "New Entry";
    include "componentes/top.php"
    ?>

    <div class="mt-5 costum-bg">
        <div id="carouselCategorias" class="carousel slide p-3" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <?php
            $i = 0;//contador
            foreach ($user->getCategorias() as $categoria){
                if($i == 0){ //primeiro com active
                    ?>

                        <div class="carousel-item active text-center">
                            <i class="fas p-3 <?= $categoria->getIcon()?> rounded-circle bg-grey <?= $categoria->getColor()?>" data-name="<?=$categoria->getName()?>" data-id="<?= $categoria->getId()?>"></i>

                    <?php
                } else if($i % 4 == 0){ //multiplos de 4 abrem carousel-item
                    ?>

                        <div class="carousel-item text-center">
                            <i class="fas p-3 <?= $categoria->getIcon()?>  rounded-circle bg-grey <?= $categoria->getColor()?>" data-name="<?=$categoria->getName()?>" data-id="<?= $categoria->getId()?>"></i>

                    <?php
                } else if(($i + 1) % 4 == 0) {//*4 + 1 fecham carousel item
                    ?>

                            <i class="fas p-3 <?= $categoria->getIcon()?> rounded-circle bg-grey <?= $categoria->getColor()?>" data-name="<?=$categoria->getName()?>" data-id="<?= $categoria->getId()?>"></i>
                        </div>

                    <?php
                } else {
                    ?>

                        <i class="fas p-3 <?= $categoria->getIcon()?>  rounded-circle bg-grey <?= $categoria->getColor()?>" data-name="<?=$categoria->getName()?>" data-id="<?= $categoria->getId()?>"></i>

                    <?php
                }
                $i++;
            }
            if(($i) % 4 != 0){//fechar carousel-item caso nao haja multiplo de 4 categorias
                ?>
                    </div>
                <?php
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselCategorias" role="button" data-slide="prev">
            <i class="fas fa-arrow-left blue"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next " href="#carouselCategorias" role="button" data-slide="next">
            <i class="fas fa-arrow-right blue"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <section id="nomeContainer" class="row justify-content-center align-items-center">
        <article class="col-7 text-right p-2 pb-3">
            <h6 class="mb-0 secondary-blue" id="categoriaNome">Category</h6>
        </article>

        <article class="col-5 pt-2 pr-2 pl-0 pb-3">
            <i class="fas fa-plus-circle secondary-blue" data-toggle="modal" data-target="#modalCategory"></i>
        </article>
    </section>
    </div>

    <form id="formEntry" action="scripts/script_entry.php" method="post" class="row justify-content-center mt-3">
        <input id="valor" type="number" name="value" placeholder="0,00€" class="form-control col-8">
        <input id="nome" type="text" name="name" placeholder="Name your purchase" class="form-control col-8 mt-3">
        <input id="idCat" type="text" name="idCat" class="d-none" value="">
    </form>

    <div id="favourites" class="costum-bg p-2 mt-5">
        <section class="row">
            <article class="col-12">
                <h5 class="blue">Or Use a Favourite</h5>
            </article>
        </section>

        <?php
            foreach ($user->getFavourites() as $favourite){
                $categoria = $user->figureOutCategoria($favourite);
                ?>
                <section class="row mt-4 align-items-center" data-name="<?= $favourite->getName()?>" data-value="<?= $favourite->getValor()?>" data-cat="<?=$categoria->getId()?>">
                    <article class="col-2 text-center">
                        <i class="fas p-3 <?=$categoria->getIcon()?> rounded-circle bg-grey <?=$categoria->getColor()?>"></i>
                    </article>

                    <article class="col-5">
                        <p class="mb-0 vmin4 dark-blue"><?= $favourite->getName()?></p>
                    </article>

                    <article class="col-5 text-right">
                        <p class="mb-0 vmin4 secondary-blue"><?= $favourite->getValor()?>€</p>
                    </article>
                </section>
                <?php
            }
        ?>

        <form id="formFavourite" action="scripts/script_entry.php" method="post" class="row justify-content-center mt-3 d-none">
            <input id="favValor" type="number" name="value">
            <input id="favNome" type="text" name="name">
            <input id="favIdCat" type="text" name="idCat" class="d-none" value="">
        </form>
    </div>

    <section class="row justify-content-center mt-3 mb-5">
        <button id="submitEntry" type="submit" class="col-4 button-1 mb-3">Add</button>
    </section>
</div>
<script>
    var isFav = false;

    $("#carouselCategorias .carousel-item i").click(function () { //click em bolinhas de carousel item
        $("#nomeContainer").removeClass("d-none");
        $(".border-selected").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#categoriaNome").html($(this).attr("data-name"));
        $("#idCat").attr('value', $(this).attr("data-id"));

        isFav = false;
    });

    $("#submitEntry").click(function () {
        if(isFav){
            $("#formFavourite").submit();
        } else {
            $("#formEntry").submit();
        }
    })

    $("#favourites section").click(function () {
        $(".border-selected").removeClass("border-selected");
        $(this).children().children("i").addClass("border-selected");

        $("#favIdCat").attr('value', $(this).attr("data-cat"));
        $("#favNome").attr('value', $(this).attr("data-name"));
        $("#favValor").attr('value', $(this).attr("data-value"));

        isFav = true;
    })

    $("#valor").focus(function () {
        $("#botMenu").addClass("animated fadeOut");
    })

    $("#valor").focusout(function () {
        $("#botMenu").removeClass("animated fadeOut");
        $("#botMenu").addClass("animated fadeIn");

    })
</script>