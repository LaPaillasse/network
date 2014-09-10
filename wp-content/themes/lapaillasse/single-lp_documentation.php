<?php
/**
 * The Template for displaying all single documentation.
 *
 * @package _lp
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php //get_template_part( 'content', 'single' ); ?>

	<div class="row">
		<?php
		$doc_ID = get_the_ID();
		// Get the related post ID
		$unique_project_identifier = get_post_meta(get_the_ID(), 'unique_project_identifier');
		$unique_project_identifier = $unique_project_identifier[0];
		$args = array(
				'post_type' => 'lp_project',
				'meta_query' => array(
					array(
						'key' => 'unique_project_identifier',
						'value'    => $unique_project_identifier,
						'compare'    => '=',
					),
				),
				'posts_per_page' => 1
			);
		$query = new WP_Query( $args );
		$query->the_post();
		$related_project_ID = get_the_ID();
		wp_reset_postdata();


		$thumb_id = get_post_thumbnail_id( $related_project_ID );
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
		?>
			<style>
				#post-header:after{
					background-image:url(<?php echo $thumb_url; ?>);
				}
			</style>
			<header id="post-header" class="col-md-12">
			<h1><?php the_title(); ?></h1>
		</header>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2 project-nav">
			<ul class="nav nav-pills">
				<li><a href="<?php echo get_permalink($related_project_ID); ?>"><button class="btn btn-primary">Retour</button></a></li>
			</ul>
			
		</div>
	</div>

	<div class="row content" id="project-description">
		<div class="col-md-6 col-md-offset-3 project-content velocity">
			<?php echo the_content(); ?>
		</div>
	</div>

	<div class="row content velocity" id="project-documentation">
		<div class="col-md-6 col-md-offset-3">
			<?php
			// Get the project documentation
			$unique_project_identifier = get_post_meta(get_the_ID(), 'unique_project_identifier');
			$unique_project_identifier = $unique_project_identifier[0];
			//print_r( $unique_project_identifier );

			$args = array(
				'post_type' => 'lp_documentation',
				'meta_query' => array(
					array(
						'key' => 'unique_project_identifier',
						'value'    => $unique_project_identifier,
						'compare'    => '=',
					),
				),
			);
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					if ( $doc_ID != get_the_ID()) {
					
			?>
				<a href="<?php echo the_permalink(); ?>"><h4><?php echo get_the_title(); ?></h4></a>
				<em>Dernière révision le <?php echo get_the_modified_date( 'd-m-Y' ); ?></em>
				<p><?php echo get_the_excerpt(); ?></p>
			<?php
					}
				}
			} else {
				// no posts found
			}
			?>
		</div>
	</div>

	<div class="row content velocity" id="project-members">
		<div class="col-md-6 col-md-offset-3">
			
		</div>
	</div>

	<div class="row content velocity" id="project-news">
		<div class="col-md-6 col-md-offset-3">
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<?php // _tk_content_nav( 'nav-below' ); ?>
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

	<script>
	( function( $ ) {
		$('.inner-nav').click(function(){
			console.log($(this).attr("data"));
			$('.content').css('display', 'none');
			//$($(this).attr("data")).removeClass('velocity');
			$($(this).attr("data")).css('display', 'block');
			$($(this).attr("data")).velocity("transition.slideUpIn", { stagger: 250 });
		});
		
		setTimeout(function(){
			$(".velocity").velocity("transition.slideUpIn", { stagger: 250 });
		}, 0);
	} )( jQuery );

	
	</script>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>