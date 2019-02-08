function searchElement() {
	
	return;
}

$("#input_search").keyup(e => {
	let contentSearch = $("#input_search").val();
	if (contentSearch === "") {
		$(".emploi").css("display", "none");
	} else {
		$(".emploi").css("display", "block");
		searchElement();
	}
});

$("#stage").change(e => {
    if (this.checked) {
        //Do stuff
    }
});