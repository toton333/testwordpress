<div id="sidebar">
					<ul>
						<?php if(!dynamic_sidebar('sidebar-1')): ?>
						<li>
							<h2>Aliquam tempus</h2>
							<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
						</li>
					   <?php endif; ?>

					   <?php if(!dynamic_sidebar('sidebar-2')): ?>
						<li>
							<h2>Categories</h2>
							<ul><?php wp_list_categories(array('title_li' => '', 'show_count' => 1)); ?></ul>
						</li>
						
						<li>
							<h2>Blogroll</h2>
							<ul><?php wp_get_archives(array('type'=> 'postbypost', 'limit'=>12)); ?></ul>
						</li>
						
						<li>
							<h2>Archives</h2>
							<ul><?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?></ul>
						</li>
						
						<li>
							<h2>Links</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
					<?php endif; ?>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page --> 
</div>