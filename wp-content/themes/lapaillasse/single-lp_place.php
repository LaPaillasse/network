<?php
/**
 * The Template for displaying all single projects.
 *
 * @package _lp
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
		</header>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3 project-content">
			<?php echo the_content(); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 authorarea">
			<a href="<?php echo $userpro->permalink( $post->post_author ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
			</a>
			<h3>
				<a href="<?php echo $userpro->permalink( $post->post_author ); ?>">
					<?php get_the_author(); the_author_meta( 'display_name' ); ?>
				</a>
			</h3>
			<div class="authorinfo">
				<?php the_author_meta( 'description' ); ?>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				Voir tous ses post <span class="meta-nav">&rarr;</span>
				</a>
			</div>
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