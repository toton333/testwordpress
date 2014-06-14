<?php get_header() 
/*
Template Name: Front Page
*/

?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">


                   <?php


                    if(have_posts()):
                    	while(have_posts()): the_post();

                    ?>

                    
					<div class="post">
						<h2 class="title"><?php the_title(); ?></h2>
						<div class="entry"> 
						<a href="" class="image image-full">
							<?php if(has_post_thumbnail()) : the_post_thumbnail('blog_image'); else: ?> 
							   <img src="<?php echo get_template_directory_uri() ?>/images/pics01.jpg">
						    <?php endif; ?>
						</a>


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