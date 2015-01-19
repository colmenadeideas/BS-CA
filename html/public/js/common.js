function getPage(position) {

	var pathArray = window.location.pathname.split('/');
	var accessToArray = pathArray[position];
	console.log("Access:" + accessToArray)
	return accessToArray;

}

function floatinput() {
	var onClass = "on";
	var showClass = "show";

	$("input").bind("checkval", function() {
		var label = $(this).prev("label");
		if (this.value !== "") {
			label.addClass(showClass);
		} else {
			label.removeClass(showClass);
		}
	}).on("keyup", function() {
		$(this).trigger("checkval");
	}).on("focus", function() {
		$(this).prev("label").addClass(onClass);
	}).on("blur", function() {
		$(this).prev("label").removeClass(onClass);
	}).trigger("checkval");
};