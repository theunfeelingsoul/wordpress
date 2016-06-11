<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name') ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<section id="header_area">
		<div class="wrapper header">
			<div class="clearfix header_top">
				<div class="clearfix logo floatleft">
					<a href="<?php echo home_url(); ?>"><h1><?php bloginfo('Name') ?></h1></a>
				</div>
				<div class="clearfix search floatright">
					<form>
						<input type="text" placeholder="Search"/>
						<input type="submit" />
					</form>
				</div>
			</div>
			<div class="header_bottom">
				<nav>
					<ul id="nav">
						<?php 
							$args = array(
								'theme_location' => 'primary'
							);
						 ?>
						<?php wp_nav_menu($args); ?>
						<!-- <li><a href="">Home</a></li>
						<li><a href="">Category</a></li>
						<li id="dropdown"><a href="">Drop Down</a>
							<ul>
								<li><a href="">Home</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">Category</a></li>
								<li><a href="">About us</a></li>
								<li><a href="">Contact us</a></li>
							</ul>
						</li>
						<li><a href="">Category</a></li>
						<li><a href="">Category</a></li>
						<li><a href="">Category</a></li>
						<li><a href="">Category</a></li>
						<li><a href="">Category</a></li>
						<li><a href="">Category</a></li>
						<li><a href="">About us</a></li>
						<li><a href="">Contact us</a></li> -->
					</ul>
				</nav>
			</div>
		</div>
	</section>