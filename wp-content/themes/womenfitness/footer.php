	<section id="footer_top_area">
		<div class="clearfix wrapper footer_top">
			<div class="clearfix footer_top_container">
				
				<?php 
					// $args = array(
					// 	'theme_location' => 'footer'
					// );
				 ?>
				<?php //wp_nav_menu($args); ?>
				<?php if(is_active_sidebar('footer1')): ?>
					<div class="clearfix single_footer_top floatleft">
						<?php dynamic_sidebar('footer1') ?>
					</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer2')): ?>
					<div class="clearfix single_footer_top floatleft">
						<?php dynamic_sidebar('footer2') ?>
					</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer4')): ?>
					<div class="clearfix single_footer_top floatleft">
						<?php dynamic_sidebar('footer3') ?>
					</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer4')): ?>
					<div class="clearfix single_footer_top floatleft">
						<?php dynamic_sidebar('footer4') ?>
					</div>
				<?php endif; ?>

				
			</div>
		</div>
	</section>
	
	<section id="footer_bottom_area">
		<div class="clearfix wrapper footer_bottom">
			<div class="clearfix copyright floatleft">
				<p> Copyright &copy; All rights reserved by <span>Wpfreeware.com</span></p>
			</div>
			<div class="clearfix social floatright">
				<ul>
					<li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>
					<li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>
					<li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>
					<li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>
					<li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>
					<li><a class="tooltip" title="Pinterest" href=""><i class="fa fa-pinterest-square"></i></a></li>
					<li><a class="tooltip" title="RSS Feed" href=""><i class="fa fa-rss-square"></i></a></li>
					<li><a class="tooltip" title="Sitemap" href=""><i class="fa fa-sitemap"></i> </a></li>
				</ul>
			</div>
		</div>
	</section>
	<?php wp_footer(); ?>
</body>
</html>