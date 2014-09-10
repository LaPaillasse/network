<?php
/**
 * Template Name: My profile page
 *
 * The template for displaying the user profile.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

	<?php //get_template_part( 'content', 'single' ); ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3 profile-content">
			<?php echo the_content(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<?php _tk_content_nav( 'nav-below' ); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>
		</div>
	</div>

<?php endwhile; // end of the loop. ?>

<script>
( function( $ ) {
} )( jQuery );
	
</script>

<?php get_footer(); ?>