<!doctype html>
<html lang="en">
<?php include_once "componentes/head.php" ?>
<body class="bg-light-grey">
    <main class="container-fluid">
        <section class="row mt-5 pb-5 pt-5 justify-content-center">
            <article class="col-12 text-center">
                <i id="logo" class="fab fa-buffer fa-3x p-4 rounded-circle bg-medium-blue mb-5 blue"></i>
            </article>

            <article class="col-12 text-center">
                <h4 class="secondary-blue">Create Your Account</h4>
            </article>
        </section>

        <div id="carouselRegister" class="carousel slide mt-3" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <form id="registerForm" action="app.php" method="post" class="row justify-content-center text-center">
                        <div class="carousel-item active col-8 col-lg-3">
                            <h6 class="secondary-blue">Main Info</h6>

                            <input type="text" class="form-control" placeholder="Name" name="name" >

                            <input type="text" class="form-control mt-3" placeholder="E-mail" name="email" >

                            <input type="password" class="form-control mt-3" placeholder="Password" name="password" >

                            <i id="firstCheck" class="fas fa-2x fa-check-circle mt-3 blue"></i>
                        </div>

                        <div class="carousel-item col-8 col-lg-3">
                            <h6 class="secondary-blue">Extra Details</h6>

                            <select type="text" class="form-control" name="email">
                                <option value="1">Portugal</option>
                                <option value="2">Germany</option>
                            </select>

                            <select type="text" class="form-control mt-3" placeholder="E-mail" name="email">
                                <option value="1">Student</option>
                                <option value="2">Working</option>
                            </select>

                            <i class="fas fa-arrow-left fa-2x mt-3 blue mr-4 back"></i> <i id="secondCheck" class="fas fa-2x fa-check-circle mt-3 blue"></i>
                        </div>

                        <div class="carousel-item col-8 col-lg-3">
                            <h6 class="secondary-blue">Initial Budget</h6>
                            <input id="initialBudget" type="number" class="form-control mt-3" placeholder="You Can Change This Later" name="budget" >
                            <p class="mb-0"><i class="fas fa-arrow-left fa-2x mt-3 blue back"></i></p>
                            <button id="register" class="button-1 mt-4" type="submit">Register</button>
                        </div>
                    </form>
                </div>
        </div>
    </main>
</body>
<script>
    $("#firstCheck, #secondCheck").click(function () {
        $("#carouselRegister").carousel('next');
    })

    $(".back").click(function () {
        $("#carouselRegister").carousel('prev');
    })
</script>
</html>