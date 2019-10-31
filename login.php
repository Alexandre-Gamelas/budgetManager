<!doctype html>
<html lang="en">
<?php include_once "componentes/head.php" ?>
<body class="bg-light-grey animated slideInRight">
<main class="container-fluid">
    <section class="row mt-5 pb-5 pt-5 justify-content-center">
        <article class="col-12 text-center">
            <i id="logo" class="fab fa-buffer fa-3x p-4 rounded-circle bg-medium-blue mb-5 blue"></i>
        </article>

        <article class="col-12 text-center">
            <h4 class="secondary-blue">Welcome Back!</h4>
        </article>
    </section>

    <form id='loginForm' action="scripts/script_login.php" method="post" class="row justify-content-center mt-5">
        <article class="col-8 col-lg-3">
            <input type="text" class="form-control" placeholder="E-mail" name="email">
        </article>
        <div class="col-12"></div>
        <article class="col-8 col-lg-3 mt-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </article>
        <div class="col-12"></div>
        <article class="col-6 col-lg-3 mt-4">
            <button class="button-1" type="submit">Login</button>
        </article>
    </form>

</main>
</body>
</html>