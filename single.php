<?php get_header() ?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">

                   <?php

                    if(have_posts()):
                     
                    	while(have_posts()): the_post();

                      
                      

                    ?>

                    
				<?php get_template_part('content', 'single'); ?>

				<?php testwordpress_post_nav(); ?>

				<?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                ?>
					

				<?php endwhile; ?>

               

				<?php endif; wp_reset_postdata(); ?>
               
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php get_sidebar(); ?>
				<?php get_footer(); ?>