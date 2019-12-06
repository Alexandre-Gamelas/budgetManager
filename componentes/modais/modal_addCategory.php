<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-3" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add a Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="catForm" action="scripts/script_addCategory.php" method="post" class="row justify-content-center">
                    <article class="col-12">
                        <h5 class="blue">Name</h5>
                    </article>

                    <article class="col-8 text-center">
                        <input type="text" class="form-control" name="name">
                    </article>

                    <article class="col-12 mt-4 text-center">
                        <h5 class="blue text-left">Color</h5>
                        <?php
                            foreach ($colors as $id => $color){
                                ?>
                                    <i class="fas p-3 blue mr-1 bg-<?=$color?> rounded-circle colorCat" data-id="<?=$id?>"></i>
                                <?php
                            }
                        ?>
                    </article>

                    <article class="col-12 mt-4 text-center">
                        <h5 class="blue text-left">Icon</h5>
                        <?php
                        foreach ($icons as $id => $icon){
                            ?>
                                <i class="fas p-3 blue mr-1 <?= $icon ?> rounded-circle bg-grey iconCat" data-id="<?= $id ?>"></i>
                            <?php
                        }
                        ?>
                    </article>
                    <input id="colorCatInput" type="text" class="d-none" name="color">
                    <input id="iconCatInput" type="text" class="d-none" name="icon">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-1 mb-3 mt-3" data-dismiss="modal">Close</button>
                <button id="submitCat" class="button-1 mb-3 mt-3">Enter</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(".iconCat").click(function () {
        $(".iconCat").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#iconCatInput").attr("value", $(this).attr("data-id"))

    })

    $(".colorCat").click(function () {
        $(".colorCat").removeClass("border-selected");
        $(this).addClass("border-selected");
        $("#colorCatInput").attr("value", $(this).attr("data-id"))
    })
    
    $("#submitCat").click(function () {
        $("#catForm").submit();
    })
</script>