let start = "distribution";
$("#" + start).addClass("view-active");

$(".btn-menu-bot").click(function () {
    let target = $(this).attr('data-target');
    //console.log(target);

    $(".view-active").removeClass("view-active");
    $("#" + target).addClass("view-active");

    $(".btn-menu-bot i").removeClass("dark-blue");
    $("i", this).addClass("dark-blue");
});