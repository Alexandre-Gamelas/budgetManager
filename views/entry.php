<div id="entry" class="view">
    <?php
    $pageName = "New Entry";
    include "componentes/top.php"
    ?>

    <div class="mt-5 costum-bg ">
        <div id="carouselCategorias" class="carousel slide p-3" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue" data-name="Health"></i>
                <i class="fas p-3 fa-utensils rounded-circle bg-grey green" data-name="Food"></i>
                <i class="fas p-3 fa-beer rounded-circle bg-grey orange" data-name="Drinks"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue" data-name="Health"></i>
            </div>

            <div class="carousel-item text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </div>

            <div class="carousel-item text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </div>
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


    <section id="nomeContainer" class="row justify-content-centerd-none">
        <article class="col-12 text-center p-2 pb-3">
            <h6 class="mb-0 secondary-blue" id="categoriaNome">Category</h6>
        </article>
    </section>
    </div>

    <form id="formEntry" action="" class="row justify-content-center mt-3">
        <input id="valor" type="number" name="valor" placeholder="0,00€" class="form-control col-8">
    </form>

    <div id="favourites" class="costum-bg p-2 mt-5">
        <section class="row">
            <article class="col-12">
                <h5 class="blue">Or Use a Favourite</h5>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-heart rounded-circle bg-grey blue"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Vacine</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">30€</p>
            </article>
        </section>

        <section class="row mt-4 align-items-center">
            <article class="col-2 text-center">
                <i class="fas p-3 fa-utensils rounded-circle bg-grey green"></i>
            </article>

            <article class="col-5">
                <p class="mb-0 vmin4 dark-blue">Americano</p>
            </article>

            <article class="col-5 text-right">
                <p class="mb-0 vmin4 secondary-blue">5€</p>
            </article>
    </div>

    <section class="row justify-content-center mt-3 mb-5">
        <button id="submitEntry" type="submit" class="col-4 button-1 mb-3">Add</button>
    </section>
</div>
<script>
    $("#carouselCategorias .carousel-item i").click(function () {
        $("#nomeContainer").removeClass("d-none");
        $(".border-selected").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#categoriaNome").html($(this).attr("data-name"));
    });

    $("#submitEntry").click(function () {
        $("#formEntry").submit();
    })

    $("#favourites section").click(function () {
        $(".border-selected").removeClass("border-selected");
        $(this).children().children("i").addClass("border-selected");
    })

    $("#valor").focus(function () {
        $("#botMenu").addClass("animated fadeOut");
    })

    $("#valor").focusout(function () {
        $("#botMenu").removeClass("animated fadeOut");
        $("#botMenu").addClass("animated fadeIn");

    })
</script>