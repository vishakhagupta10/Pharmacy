$(document).on("scroll", function () {
	if ($(document).scrollTop() > 100) {
		$("header").addClass("small");
	} else {
		$("header").removeClass("small");
	}
});
