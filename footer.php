
<div id="footer">
	<div id="footerleft">Copyright (c) 2013 quickestate.com. All rights reserved. | </div>

	<div id="footerright">
		<ul>

			<?php
	            $args = array('posts_per_page' => 3, 'post_type' => 'socials');
	            $social_query = new wp_query($args);

	            if($social_query->have_posts()):

	            	
	                
	            	while($social_query->have_posts()): $social_query->the_post();

	            //have to put meta info inside while loop

	            $link = get_post_meta($post->ID, 'link', true); 
	            $bc = get_post_meta($post->ID, 'background_color', true); 
	            $fc = get_post_meta($post->ID, 'font_color', true); 


			 ?>

			 <li><a style="background:<?php echo $bc ?>; color:<?php echo $fc; ?>;" target="_blank" href="<?php echo $link; ?>"><?php the_title(); ?></a></li>

			<?php endwhile; ?>
		    <?php else: ?>
			
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Youtube</a></li>
			

		    <?php endif; wp_reset_postdata(); ?>
	  </ul>
	</div>

</div>

<div style="clear:both">&nbsp;</div>
<!-- end #footer -->

<?php wp_footer(); ?>
</body>
</html>
