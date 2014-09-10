<?php
/**
 * Template Name: Community page
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
			<header id="post-<?php echo get_the_ID(); ?>" class="col-md-12">
		<?php 
		}else{
		?>
			<header class="col-md-12">
		<?php 
		}
		?>
			<h1><?php the_title(); ?></h1>
			<p>1+1=3</p>
		</header>
	</div>

	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li><a href="/profile/login/"><button class="btn btn-primary">Rejoindre</button></a></li>
				<li><a href="/profile"><button class="btn btn-primary">Mon profile</button></a></li>
				<li><a href="/profile/login/"><button class="btn btn-primary">Se connecter</button></a></li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1 profile-content">
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
	setTimeout(function(){
		$(".userpro-awsm").velocity("transition.slideUpIn", { stagger: 250 });
	}, 0);		
} )( jQuery );
</script>

<?php get_footer(); ?>