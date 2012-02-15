$(function() {
	$("#content-lower-menu").animate({left: '0px'}, 0);

    var newHash      = "",
        $mainContent = $("#content"),
        $pageWrap    = $("#wrap"),
        baseHeight   = 0,
        $el;
        
    $pageWrap.height($pageWrap.height());
    baseHeight = $pageWrap.height() - $mainContent.height();
    
    $("#content-lower-menu").delegate("a.transition-out", "click", function() {
        window.location.hash = $(this).attr("href");
        return false;
    });
    
    $(window).bind('hashchange', function(){
    
        newHash = window.location.hash.substring(1);
        
        if (newHash) {
            $mainContent
                .find("#content-lower-menu")
                .fadeOut(200, function() {
                    $mainContent.hide().load(newHash + " #content-lower-menu", function() {
                        $mainContent.fadeIn(200, function() {
                            $pageWrap.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });
                        $("#content-lower-menu a").removeClass("current");
                        $("#content-lower-menu a[href="+newHash+"]").addClass("current");
                    });
                });
        };
        
    });
    
    $(window).trigger('hashchange');

});