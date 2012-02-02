$(document).ready(function() {
	$("body").css("display", "none");
	$("body").fadeIn(750);
	
	$("a.transition-out").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        $("body").fadeOut(750, redirectPage);
    });
 
    function redirectPage() {
        window.location = linkLocation;
    }
	
	function displayPage() {
		$("body").fadeIn(750);
	}

	window.addEventListener("load", displayPage, false);
	window.addEventListener("unload", displayPage, false);
});