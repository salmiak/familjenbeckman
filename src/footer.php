	<?php get_sidebar(); ?>
	
	<footer id="sidfot">
		<p>© 2011 <?php bloginfo('name'); ?></p>
		<address>
			<a href="mailto:du@exempel.se">du@exempel.se</a>
		</address>
		<p>Drivs stolt av <a href="http://sv.wordpress.org/">Wordpress</a> med temat <a href="http://davidpaulsson.se/html5-mall/">HTML5-Schablon</a> av <a href="http://davidpaulsson.se/">David Paulsson</a>.</p>
	</footer><!-- slut sidfot-->
	
	<!-- Skript som uppdaterar media-query när man ändrar storlek på webbläsarfönster - http://code.google.com/p/css3-mediaqueries-js/ -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/css3-mediaqueries.js"></script>	  
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
		
	<?php wp_footer(); ?> 	

</body>
</html>