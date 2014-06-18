<?php
/* This Template is used displaying single page content in page.php */

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