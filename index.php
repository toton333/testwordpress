<?php get_header() ?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">

                   <?php

                    $args = array('posts_per_page' => -1);

                    $my_query = new wp_query($args);

                    if($my_query->have_posts()):
                    	while($my_query->have_posts()): $my_query->the_post();


                    ?>

                    
					<div class="post">
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="meta">Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?>
							&nbsp;&bull;&nbsp; <a href="<?php comments_link(); ?>" class="comments">Comments (<?php comments_number('0', '1', '%') ?>)</a> &nbsp;&bull;&nbsp; <a href="<?php the_permalink(); ?>" class="permalink">Full article</a></p>
						<div class="entry"> 
						
							<?php if ( !is_singular()) {
								the_excerpt();
							} else {
								the_content();
						} ?>
						</div>
					</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>

					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php get_sidebar(); ?>
				<?php get_footer(); ?>