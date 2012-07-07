	  

      <footer id="footer" class="source-org vcard copyright">
	  </footer>

    </div><!--/.fluid-container-->
    
    <?php wp_footer(); ?>
    
    <script src="<?php bloginfo('template_directory'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- google analytics, you have to add your ID in theme settings for this to work -->
	
	<?php if ( get_option( 'ga_id', true ) // make sure the ga_id setting is defined
		&& ( !is_user_logged_in() ) ) : // don't track logged in users
	?>
	<script>

	    var _gaq = _gaq || [];
	    _gaq.push(['_setAccount', '<?php echo get_option( "ga_id" ) ?>']);
	    _gaq.push(['_trackPageview']);

	    (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>
	<?php endif; ?>
	
	<!-- end:google analytics -->
    
  </body>
</html>