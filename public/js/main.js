(function ($) {
    "use strict";
	
	$(document).ready(function() {
       $('#geckzu').on('click', function(){
           $('.geckzu-dropdown').slideToggle();
           $(this).toggleClass('clicked');
       });
	   
	});
	
	
	
})(jQuery);