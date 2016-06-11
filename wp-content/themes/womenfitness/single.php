<?php 
	
	get_header();?>

	<section id="content_area">
		<div class="clearfix wrapper main_content_area">
		
			<div class="clearfix main_content floatleft">
			
				<!-- <div class="clearfix slider">
					<ul class="pgwSlider">
						<li><img src="images/thumbs/megamind_07.jpg" alt="Paris, France" data-description="Eiffel Tower and Champ de Mars" data-large-src="images/slides/megamind_07.jpg"/></li>
						<li><img src="images/thumbs/wall-e.jpg" alt="Montréal, QC, Canada" data-large-src="images/slides/wall-e.jpg" data-description="Eiffel Tower and Champ de Mars"/></li>
						<li>
							<img src="images/thumbs/up-official-trailer-fake.jpg" alt="Shanghai, China" data-large-src="images/slides/up-official-trailer-fake.jpg" data-description="Shanghai ,chaina">
						</li>


					</ul>
				</div> -->
				
				<div class="clearfix content">
					
					<?php 
					if (have_posts()):
						while (have_posts()): the_post();?>
							<div class="clearfix single_content">
								<div class="clearfix post_date floatleft">
									<div class="date">
										<h3><?php the_time('d') ?></h3>
										<p><?php the_time('M') ?></p>
									</div>
								</div>
								<div class="clearfix post_detail">
								<div class="content_title"><h2><?php the_title(); ?></h2></div>
									<div class="clearfix post-meta">
										<p><span><i class="fa fa-user"></i> By 	<a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author() ?></a></span> <span><i class="fa fa-clock-o"></i> <?php the_time('F j, Y g:i a') ?></span> 
										<!-- <span><i class="fa fa-comment"></i> 4 comments</span>  -->
										<?php 
											$categories = get_the_category();
											$separator = ", ";
											$output = '';

											if ($categories) {
												foreach ($categories as $category) {
													$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'.$separator;
												}

												
											}
										 ?>
										<span><i class="fa fa-folder"></i> Posted in : <?php echo trim($output,$separator); ?></span></p>
									</div>
									<div class="clearfix post_excerpt">
										<?php the_post_thumbnail('banner-image'); ?>
										<?php the_content(); ?>
									</div>
									<a href="">Continue Reading</a>
								</div>
							</div> <!--/.clearfix single_content-->
						<?php 
						endwhile;
						else:
							echo "<p>No Content found<p>";
					endif;
					?>
					
											
				</div>
				
				<div class="pagination">
					<nav>
						<ul>
							<li><a href=""> << </a></li>
							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href=""> >> </a></li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- <div class="clearfix sidebar_container floatright">
			
				<div class="clearfix newsletter">
					<form>
						<h2>Signup for newsletter</h2>
						<input type="text" placeholder="Name" id="mce-TEXT"/>
						<input type="email" placeholder="Name" id="mce-EMAIL"/>
						<input type="submit" value="Submit" id="mc-embedded-subscribe"/>
					</form>
				</div>
				<div class="clearfix sidebar">
					<div class="clearfix single_sidebar">
						<div class="popular_post">
							<div class="sidebar_title"><h2>Most Popular</h2></div>
							<ul>
								<li><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></li>
								<li><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></li>
								<li><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></li>
								<li><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></li>
								<li><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></li>
							</ul>
						</div>
						</div>
					<div class="clearfix single_sidebar category_items">
						<h2>Categories</h2>
						<ul>
							<li class="cat-item"><a href="">Category Name</a>(12)</li>
							<li class="cat-item"><a href="">Category Name </a>(12)</li>
							<li class="cat-item"><a href="">Category Name</a>(12)</li>
							<li class="cat-item"><a href="">Category Name </a>(12)</li>
							<li class="cat-item"><a href="">Category Name </a>(12)</li>
						</ul>
					</div>
					<div class="clearfix single_sidebar">
						<h2>Recent Post</h2>
						<ul>
							<li><a href="">Category Name <span>(12)</span></a></li>
							<li><a href="">Category Name <span>(12)</span></a></li>
							<li><a href="">Category Name <span>(12)</span></a></li>
							<li><a href="">Category Name <span>(12)</span></a></li>
							<li><a href="">Category Name <span>(12)</span></a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
	</section>
	

	<?php get_footer();
 ?>