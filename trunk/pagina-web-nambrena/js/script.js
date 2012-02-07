$("#jquery li").hover(function() { // Mouse over
   $(this)
      .stop().fadeTo(500, 1)
      .siblings().stop().fadeTo(500, 0.2);   
}
, function() { // Mouse out
   $(this)
      .stop().fadeTo(500, 1)
      .siblings().stop().fadeTo(500, 1);
});