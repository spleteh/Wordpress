
var $j = jQuery.noConflict();

$j(document).ready(function() {
	
	// Expand Panel
	$j("#open").click(function(){
		$j("div#panel").slideDown("slow");	

		document.getElementById('toppanel').style.background = '#FFF';
	});	
	
	// Collapse Panel
	$j("#close").click(function(){
		$j("div#panel").slideUp("slow");
document.getElementById('toppanel').style.background = 'none';		
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

var $d = jQuery.noConflict();
	
$d(function($){

		//cache nav
		var nav = $("#topNav");

		//add indicators and hovers to submenu parents
		nav.find("li").each(function() {
			if ($(this).find("ul").length > 0) {

				$("<span>").text("^").appendTo($(this).children(":first"));

				//show subnav on hover
				$(this).mouseenter(function() {
					$(this).find("ul").stop(true, true).slideDown();
					console.log('mouseenter');
				});

				//hide submenus on exit
				$(this).mouseleave(function() {
					$(this).find("ul").stop(true, true).slideUp();
				});
			}
		});
	});
	
	
	var $g = jQuery.noConflict();
	  $g(function() {
   
    var galleries = $g('.ad-gallery').adGallery();
    $g('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $g(this).val();
        return false;
      }
    );
    $g('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $g('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $g('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  
  
  var $p = jQuery.noConflict();
  
  	$p(function() {
			$p(".meter > span").each(function() {
				$p(this)
					.data("origWidth", $p(this).width())
					.width(0)
					.animate({
						width: $p(this).data("origWidth")
					}, 1200);
			});
		});
		
	 var $t = jQuery.noConflict();
	 
	 $t(function(){
		$t(".someClass").tipTip({keepAlive:false, fadeOut:1200, delay:200});
		});
  

	


