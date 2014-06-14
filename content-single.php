<?php
/* This Template is used displaying single post content in single.php*/
$thumb_showcase = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb_showcase');

 ?>


	<div class="post">
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
							
						<div class="entry"> 
						<a href="<?php echo $thumb_showcase[0] ?>" class="image image-full">
							<?php if(has_post_thumbnail()) : the_post_thumbnail('blog_image'); else: ?> 
							   <img src="<?php echo get_template_directory_uri() ?>/images/pics01.jpg">
						    <?php endif; ?>
						</a>


                      <?php if ( !is_singular()) {
								the_excerpt();
							} else {
								the_content();
						} ?>
						<p class="meta">Posted by <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?>
						</div>
					</div>