<?php
/**
 * Template Name: Front Page
 *
 * Description: Pinterest-style widgets for all posts
 *
 * 
 *
 * @package levinsonjust.in
 */
 ?>

<?php 
	get_header(); 

	//get categories, exclude uncategorized posts
	$category_list = get_categories( array('hide_empty' => 1, 'exclude' => '1') );
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php	
	foreach ($category_list as $category) {

		// build a new query
		$the_query = new WP_Query( array( 
			'post_type' => 'post',
			'cat' => $category->term_id )
		);
	?>
		<section class="homepage-posts-category">
			<h2 class="homepage-section-title"><?php echo $category->name; ?></h2>
	
		
				<?php if ( $the_query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php get_template_part( 'post-widget' ); ?>

					<?php endwhile; ?>


				<?php levinsonjust_in_paging_nav(); ?>


			<?php 
				endif; 
			
				/* restore original post data */
				wp_reset_postdata();
			?>
	<?php 
		/*end foreach*/ 
		} 
	?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php /* get_footer(); */ ?>