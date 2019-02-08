"use strict"
function alterCheckbox(checkbox) {
    let typeOffer = $(checkbox).attr('id');
    if ($(checkbox).is(':checked')) {
        $(`.${typeOffer}`).css('display', 'block');
    } else {
        $(`.${typeOffer}`).css('display', 'none');
    }
}

function getCheckedBox() {
    let stage = $('#stage').is(':checked')? 1 : 0;
    let alternance = $('#alternance').is(':checked')? 1 : 0;
    if (stage && alternance) return "emploi";
    return (stage)? "stage" : "alternance";
}

$("#input_search").keyup(e => {
    let value = $("#input_search").val();
    $(".emploi").each((index, element) => {
        if (element.innerHTML.indexOf(value) !== -1 && $(element).hasClass(getCheckedBox())) {
            $(element).css('display', "block");
        } else {
            $(element).css('display', "none");
        }
    });
});
