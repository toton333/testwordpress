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



                <div id="ajax-div">
				<form id="ajax-form" action="#" method="post">
					<label for="post_id"><b>Please insert post id here :</b></label><br/>
					<input type="text" name="post_id" id="post_id"><br/>
					<input type="submit" value="Get Post Title">

				</form>
			    </div>
			    <hr>

			    <?php
			     $comments = get_comments();
                 
                 foreach ($comments as $comment) {
                 	?>
                 	<div style="width:650; background:grey;">
                 		
                          <?php echo get_avatar($comment->comment_author_email, 40); ?> 
                          <a style="color:cyan;" href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo $comment->comment_author, ' : '; ?></a>
                          <span style="color:white;"><?php echo $comment->comment_content; ?></span>
                 	</div>


                 	<?php
                 }
			     ?>


					
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php get_sidebar(); ?>
				<?php get_footer(); ?>