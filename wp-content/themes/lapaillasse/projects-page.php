<?php
/**
 * Template Name: Projects page
 *
 * The template for displaying the projects.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>

	<div class="row">
		<header class="col-md-12" id="projects-page-header">
			<h1>Les projets du réseau</h1>
			<p>Tous makers</p>
		</header>
	</div>

	
	<div class="row">
		<?php 
		$args = array( 'post_type' => 'lp_project', 'posts_per_page' => 10 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 project-card-container">
				<div class="project-card velocity">
				<?php
				if ( has_post_thumbnail() ) {
				// Get the thumbnail url
				$thumb_id = get_post_thumbnail_id( get_the_ID() );
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
				$thumb_url = $thumb_url_array[0];
				?>
					<style>
						#post-<?php echo get_the_ID(); ?>:after{
							background-image:url(<?php echo $thumb_url; ?>);
						}
					</style>
					<a href="<?php echo get_permalink(get_the_ID()) ?>"><header id="post-<?php echo get_the_ID(); ?>" style="">
				<?php
				}else{
				?>
					<a href="<?php echo get_permalink(get_the_ID()) ?>"><header style="background-image:url()">
				<?php
				}
				?>
						<h1><?php echo the_title(); ?></h1>
					</header></a>
					<div class="project-description">
						<p><?php echo get_excerpt_by_id(get_the_ID()); ?></p>
					</div>
				</div><!-- /.project-card -->
			</div>

		<?php
		endwhile;
		?>
	</div>

<script>
( function( $ ) {
	setTimeout(function(){
		$(".velocity").velocity("transition.slideUpIn", { stagger: 250 });
	}, 0);		
} )( jQuery );
</script>
	
<?php get_footer(); ?>