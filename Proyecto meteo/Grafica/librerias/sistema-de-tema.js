var tema = document.getElementById('tema');
var cuerpo = document.getElementById('body'); 
$(tema).click(function() {
 $( cuerpo ).toggleClass( "black" );
 $(tema).toggleClass("stl-1-white");
});