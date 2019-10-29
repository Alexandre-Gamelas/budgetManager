<script>
    $("#side-menu").hide();
</script>
<!-- BLUR -->
<div id="blur" style="z-index: 9999"></div>

<section id="side-menu" class="row justify-content-center m-0 side-menu align-content-start bg-medium-blue" style="z-index: 10000">
    <!-- SETA DE SAIDA-->
    <i id="menu-close" class="seta-sair-broto fas fa-arrow-right dark-blue"></i>

    <!-- NOME + EMAIL -->

    <article class="col-12 text-center mt-4 pt-3">
        <p class="dark-blue titulo-1-broto mb-2"><?php //$_SESSION['user']['nome'] ?> Alex</p>
    </article>

    <article class="col-12 text-center">
        <p class="dark-blue text-uppercase spacing-broto" style="font-size: 3vmin"><?php //$_SESSION['user']['email'] ?> alex.gamelas@teste.pt</p>
    </article>

    <!-- nav -->

    <article id="listaMenu" class="col-10 dark-blue titulo-2-broto pt-4 pl-4 mt-4" style="border-top: 2px solid white ">
        <?php

        $menu = array(
            "Perfil" => "perfil.php",
            "Mapa" => "mapa.php",
            "Logout" => "scripts/script_logout.php"
        );
        /*
        if($_SESSION['user']['papel']==1)
            $menu["Administrador"] = "admin/app.php";
        */
        ?>




        <?php
        foreach ($menu as $nome => $link) {
            ?>

            <p class="mb-4"><a href="<?=$link?>" class="dark-blue"><?= $nome?></a></p>

            <?php
        }
        ?>


    </article>
</section>

<script>

    $("#blur").hide();
    $("#blur").css("opacity", 0);
    let menuState = false;
    $("#side-menu").css("width", 0);
    $("#side-menu > *").css("opacity", 0);

    $("#menu, #menu-close, #blur").click(() => {
        console.log("ola");
        if (!menuState) {

            $("#side-menu").animate({
                width: '75vw'
            }, 400);

            $("#side-menu > *").animate({
                opacity: '1'
            }, 1000);

            $("#blur").show(function () {
                $(this).animate({
                    opacity: "0.6"
                }, 1000, function () {
                    menuState = true;
                });
            });

        } else {
            $("#side-menu").animate({
                width: '0'
            }, 400);

            $("#side-menu > *").animate({
                opacity: '0'
            }, 200);

            $("#blur").animate({
                opacity: "0"
            }, 1000, function () {
                $(this).hide(function () {
                    menuState = false;
                })
            });
        }
    });

</script>