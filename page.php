<?php get_header(); ?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">

                   <?php


                    if(have_posts()):
                    	while(have_posts()): the_post();

                    ?>

                    
					<?php get_template_part('content', 'page'); ?>

					


				<?php endwhile; endif; wp_reset_postdata(); ?>

					
				
					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php get_sidebar(); ?>
				<?php get_footer(); ?>