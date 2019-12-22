<?php
$name = $user->getName();
$nationality = $user->getNationality();
if($distribution){
    $total = $distribution->getTotalCat();
    $count = $distribution->getCount();
} else {
    $total = 0;
    $count = 0;
}
?>

<div id="profile" class="view">
    <section class="row justify-content-center align-items-center profileTop">
        <article class="col-4 col-lg-2 mt-5">
            <img src="http://pronksiapartments.ee/wp-content/uploads/2015/10/placeholder-face-big.png" alt="" class="img-fluid">
        </article>


        <article class="col-12 text-center mt-4">
            <h4 class="text-white"><?=$name?></h4>
        </article>

        <article class="col-12 text-center">
            <h6 class="text-white"><?=$nationality?></h6>
        </article>

        <article class="col-5 col-lg-6 text-center mt-4">
            <h6 class="mb-0 text-white"><?=$count?></h6>
            <p class="text-white"> Transactions</p>
        </article>

        <article class="col-5 col-lg-6 text-center mt-4">
            <h6 class="mb-0 text-white"><?=$total?></h6>
            <p class="text-white">Euros Spent</p>
        </article>
    </section>

    <div class="costum-bg pb-3 pt-3 mt-3">
        <section class="row justify-content-center align-items-center pt-3 pb-3  ml-3 mr-3 marginProfile">
            <article class="col-2 text-center">
                <i class="fas fa-history"></i>
            </article>

            <article class="col-10 ">
                <h6 class="mb-0">Purchase History</h6>
            </article>
        </section>

        <section class="row justify-content-center align-items-center pt-3 pb-3 mt-4 ml-3 mr-3 marginProfile">
            <article class="col-2 text-center">
                <i class="fas fa-users"></i>
            </article>

            <article class="col-10 ">
                <h6 class="mb-0">Invite a Friend</h6>
            </article>
        </section>

        <section class="row justify-content-center align-items-center pt-3 pb-3 mt-4 ml-3 mr-3 marginProfile">
            <article class="col-2 text-center">
                <i class="fas fa-cog"></i>
            </article>

            <article class="col-10 ">
                <h6 class="mb-0">Help and Support</h6>
            </article>
        </section>

        <a href="scripts/logout.php">
            <section class="row justify-content-center align-items-center pt-3 pb-3 mt-4 ml-3 mr-3 marginProfile">
                <article class="col-2 text-center">
                    <i class="fas fa-sign-out-alt"></i>
                </article>

                <article class="col-10 ">
                    <h6 class="mb-0">Logout</h6>
                </article>
            </section>
        </a>
    </div>
</div>
