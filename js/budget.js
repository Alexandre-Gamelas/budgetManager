$(".edit").click(function () {
    var id = $(this).attr("data-target");
    var range = $("#range" + $(this).attr("data-target"));

    if($(this).hasClass("active")){

        $(this).removeClass("active");
        range.addClass("d-none");

    } else {

        $(".edit.active").each(function () {
            var rangeRemove = $("#range" + $(this).attr("data-target"));
            $(this).removeClass("active");
            rangeRemove.addClass("d-none");
        });

        $(this).addClass("active");
        range.removeClass("d-none");
        range.removeAttr("disabled")

    }

    document.getElementById("range" + id).oninput = function () {
        var value = $(this).val();
        $("#categoria" + id).find(".absoluteValue").html(value + "€");

        var moneyLeft = calcMoneyLeft();
        setMax(moneyLeft);
        calcPercentage(value, id);
        setAlocated();
    };
})

function calcMoneyLeft() {
    totalAlocated = 0;

    $(".absoluteValue").each(function (index) {
        totalAlocated += parseInt($(this).html());
    });

    return totalBudget - totalAlocated;
}

function setMax(moneyLeft) {
    $(".costum-range").each(function (index) {
        starter = $(this).val();
        newMax = parseInt(starter) + parseInt(moneyLeft);
        $(this).attr("max", newMax);
    });
}

function calcPercentage(value, id) {
    var percentage = (value / totalBudget) * 100;
    $("#categoria" + id).find(".percentageValue").css("width", percentage + "%");
}

function setAlocated() {
    var alocated = 0;
    $(".absoluteValue").each(function (index) {
        alocated += parseInt($(this).html());
    })
    $("#alocated").html(alocated)
}