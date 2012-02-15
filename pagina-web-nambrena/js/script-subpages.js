$(document).ready(function() {
	$("body").css("display", "none");
});

$(window).load(function() {
	/*$("body").css("display", "none");*/
	$("body").fadeIn(750, redirectEnter1);
	
	$("a.transition-out").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
		$("#content-lower-menu").animate({
			left: '-=1920px'
		}, 500, redirectPage1
		);
    });
	
	$("a.transition-back").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
		$(this).animate({
			opacity: '0%'
		}, 500, redirectPage1
		);
    });
 
    function redirectPage1() {
        $("body").fadeOut(750, redirectPage2);
    }
	
    function redirectPage2() {
        window.location = linkLocation;
    }
	
	function redirectEnter1() {
		$("#content-lower-menu").animate({
			left: '0px'
		}, 500
		);
    }	
	
	function displayPage() {
		$("body").fadeIn(750);
	}

	window.addEventListener("load", displayPage, false);
	window.addEventListener("unload", displayPage, false);
});