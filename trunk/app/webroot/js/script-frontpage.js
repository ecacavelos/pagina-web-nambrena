$(document).ready(function() {
	$("body").css("display", "none");
	$("body").fadeIn(750);
	$("#content-lower-menu").animate({left: '0px'}, 0);
	
	$("a.transition-out").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        //$("body").fadeOut(750, redirectPage);
		$("#content-lower-menu").animate({
			/*opacity: 0,*/
			left: '-=1920px'
			/*height: 'toggle'*/
		}, 500, redirectPage1
		);
    });
 
    function redirectPage1() {
        $("body").fadeOut(500, redirectPage2);
    }
	
    function redirectPage2() {
        window.location = linkLocation;
    }	
	
	function displayPage() {
		$("body").fadeIn(750);
	}

	window.addEventListener("load", displayPage, false);
	window.addEventListener("unload", displayPage, false);
	
});