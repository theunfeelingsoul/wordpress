<?php
/**
 *Template Name:test-form-layout
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <?php compass_breadcrumbs(); ?>
    </div>
    <div class="grid_17 alpha">
        <div class="content_bar">
            <h1><?php the_title(); ?></h1>
            
            <?php  
            	require_once('C:\xampp\htdocs\GitHub\wordpress\wp-config.php');
            	global $wpdb;
            
            	$sql = "SELECT * FROM {$wpdb->prefix}survey_ques";
				$sq = $wpdb->get_results( $sql, 'ARRAY_A' );


            	if (isset($_POST['submit_survey'])) {
					foreach ($_POST as $key => $q) {
						# code...
						// echo $q;
						// echo "<br/>";
					}
					// timestanp
					$the_date=date('M');
					// unset the submit button name
					unset($_POST['submit_survey']);
					foreach ($_POST as $key => $q):
						$inserting = $wpdb->insert( 
							'wp_survey_ans', 
							array( 
								'q_id' => $key, 
								'ans' => $q,
								'the_date' => $the_date,
							), 
							array( 
								'%s', 
								'%s', 
								'%s', 
							) 
						);

						if (!inserting) {
							echo "did not work";
							exit();
						}
					endforeach;

            	} // end if

            	// $results = $wpdb->get_results( 'SELECT * FROM wp_options WHERE option_id = 1', OBJECT );
             ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<form action="<?= the_permalink() ?>" method="post">
				<?php foreach ($sq as $key => $q):?>
					<div class="form-group">
						<label for=""><?=$q['ques'] ?></label>
						<div class="radio">
						  <label>
						    <input type="radio" name="<?=$q['id'] ?>" id="" value="1" checked>
						    Yes
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="<?=$q['id'] ?>" id="" value="0">
						    No
						  </label>
						</div>
					</div>
				<?php endforeach; ?>
			
				<button type="submit" name="submit_survey" value="press" class="btn btn-default">Submit</button>
			</form>

            <?php if (have_posts()) : the_post(); ?>
                <?php the_content(); ?>	
            <?php endif; ?>		
        </div>
    </div>
    <div class="grid_7 sidebar_grid omega">
        <!--Start Sidebar-->
        <?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div>
</div>
<?php get_footer(); ?>