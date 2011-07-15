<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>


 <script type="text/javascript">
		 $(document).ready(function(){
			  $('#contact').ajaxForm(function(data) {
				 if (data==1){
					 $('#success').fadeIn("slow");
					 $('#bademail').fadeOut("slow");
					 $('#badserver').fadeOut("slow");
					 $('#contact').resetForm();
					 }
				 else if (data==2){
						 $('#badserver').fadeIn("slow");
					  }
				 else if (data==3)
					{
					 $('#bademail').fadeIn("slow");
					}
					});
				 });
		</script>
		

<!-- begin colLeft -->
	<div id="colLeft">

			<h1>Kontakt</h1>
			<p><?php echo stripslashes(stripslashes(get_option('journal_contact_text')))?></p>
			
			<p id="success" class="successmsg" style="display:none;">Vaše sporočilo je bilo poslano!</p>

			<p id="bademail" class="errormsg" style="display:none;">Prosim vnesite ime, sporočilo in pravilen e-naslov.</p>
			<p id="badserver" class="errormsg" style="display:none;">Vaše sporočilo ni poslano. Poskusite malo kasneje ali pa nas kontaktirajte na info@druzabne-igre.si.</p>

			<form id="contact" action="<?php bloginfo('template_url'); ?>/sendmail.php" method="post">
			<label for="name">Vaše ime: *</label>
				<input type="text" id="nameinput" name="name" value=""/>
			<label for="email">Vaš E-naslov: *</label>

		
			<label for="comment">Vaše sporočilo: *</label>
				<textarea cols="20" rows="7" id="commentinput" name="comment"></textarea><br />
			<input type="submit" id="submitinput" name="submit" class="submit" value="POŠLJI"/>
			<input type="hidden" id="receiver" name="receiver" value="<?php echo strhex(get_option('journal_contact_email'))?>"/>
			</form>
			
			
	</div>
	<!-- end colleft -->

			<?php get_sidebar(); ?>	

<?php get_footer(); ?>


