$(".footer-menu a").click(function(){
	$(".data-popup").addClass("show");
});
$(".data-popup .popup-head .icon-close").click(function(){
	if($(".data-popup").hasClass("show")){
		$(".data-popup").removeClass("show");
	}else {
		$(".data-popup").addClass("show");
	}
});
$(".signup").click(function(){
	$(".signup-popup").addClass("show");
});
$(".signup-popup .popup-head .icon-close").click(function(){
	if($(".signup-popup").hasClass("show")){
		$(".signup-popup").removeClass("show");
	}else {
		$(".signup-popup").addClass("show");
	}
});


