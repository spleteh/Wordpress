
var $j = jQuery.noConflict();

$j(document).ready(function() {
	
	// Expand Panel
	$j("#open").click(function(){
		$j("div#panel").slideDown("slow");	
	});	
	
	// Collapse Panel
	$j("#close").click(function(){
		$j("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$j("#toggle a").click(function () {
		$j("#toggle a").toggle();
	});		
		
});

var $c = jQuery.noConflict();

$c(function() {
    // define global variables
    var maxWidth, maxCount;

    $c('#most-commented li').each(function(i) {
        var $this = $c(this);
        var thisCount = ~~$this.find('.comment-count').text();


        // set up some variables if the first iteration
        if ( i == 0 ) {
            maxWidth = $this.width() - 40;
            maxCount = thisCount;
        }

        // calculate the width based on the count ratio
        var thisWidth = (thisCount / maxCount) * maxWidth;

        // apply the width to the bar
        $this.find('.comment-bar').animate({
            width : thisWidth
        }, 200, 'swing');
    });
});
