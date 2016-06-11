<?php 

/*
Template Name:Botton works Layout

*/
	
	get_header();?>

	<section id="content_area">
		<div class="clearfix wrapper main_content_area">
		
			<div class="clearfix main_content floatleft">
			
				<div class="clearfix content">
					<?php 
					if (have_posts()):
						while (have_posts()): the_post();?>
							<div class="content_title"><h2><?php echo the_title(); ?></h2></div>
							<div class="single_work_page clearfix">
								<div class="single_work_page_content">
									<?php the_content(); ?>
								</div>
								
							</div><!--/.single_work_page clearfix-->
							<div class="more_works">
								<h2>More Works you may like <i class="fa fa-thumbs-o-up"></i></h2>
								<div class="more_works_container">
									<div class="single_more_works floatleft">
										<img src="http://dummyimage.com/220x150/000/fff&text=Thumbnail" alt=""/>
										<a href=""><h2>Magazine Wp Template</h2></a>
									</div>
									<div class="single_more_works floatleft">
										<img src="http://dummyimage.com/220x150/000/fff&text=Thumbnail" alt=""/>
										<a href=""><h2>Magazine Wp Template</h2></a>
									</div>
									<div class="single_more_works floatleft">
										<img src="http://dummyimage.com/220x150/000/fff&text=Thumbnail" alt=""/>
										<a href=""><h2>Magazine Wp Template</h2></a>
									</div>

								</div>
							</div>
						<?php 
						endwhile;
						else:
							echo "<p>No Content found<p>";
					endif;
					?>
				</div><!--/.clearfix content-->
				
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