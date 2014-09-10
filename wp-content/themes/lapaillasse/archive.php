<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>

	<div class="row">
		<header class="col-md-12">
			<h1>Blog</h1>
			<p>Veillons sur l'actualité</p>
		</header>
	</div>

	<div class="row">
		<?php
		$currentCategory = get_the_category();
		$currentCategory[0]->name;
		$currentCategory[0]->slug;
		$args = array(
			//'type' => 'post'
		);
		$categories = get_categories(array('hide_empty' => 1));
		//print_r( $categories[0] );
		
		?>
		<ul class="nav nav-pills">
			<li class="dropdown">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      		Catégories : <?php echo $currentCategory[0]->name; ?> <span class="caret"></span>
		    	</a>
		    	<ul class="dropdown-menu" role="menu">
		    		<li><a href="/blog/" title="Tout">Tout</a></li>
		    		<?php 
		    		foreach ($categories as $category) {
					  	echo "<li><a href='/category/".$category->slug."/' title='".$category->name."'>".$category->name."</a></li>";
					}
		    		?>
		    	</ul>
		  	</li>
		</ul>
	</div>

	<?php 
	// add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
	<div class="row">

		
		<?php $index = 1;  if ( have_posts() ) : ?>

			<!-- <header class="page-header">
				<h1 class="page-title"> -->
					<?php
						/*if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :*/
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							/*the_post();
							printf( __( 'Author: %s', '_tk' ), '<span class="vcard">' . get_the_author() . '</span>' );*/
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							/*rewind_posts();*/

						/*elseif ( is_day() ) :
							printf( __( 'Day: %s', '_tk' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', '_tk' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', '_tk' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', '_tk' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', '_tk');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', '_tk' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', '_tk' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', '_tk' );

						else :
							_e( 'Archives', '_tk' );

						endif;*/
					?>
				<!-- </h1> -->
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			<!-- </header> --><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php if($index%2) { ?>	
				<div class="col-md-7">
			<?php }else{ ?>
				<div class="col-md-5">
			<?php } ?>
					<div class="post-container velocity">
					<?php 
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							// Get the thumbnail url
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
						?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<div class="post-thumbnail" style="background-image:url(<?php echo $thumb_url; ?>);"></div>
							</a>
						<?php }
						get_template_part( 'content', get_post_format() );
					?>
					</div>
				</div>
			<?php $index++; ?>
			<?php endwhile; ?>

			<?php _tk_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

	</div><!-- .content-padder -->

<script>
( function( $ ) {
	setTimeout(function(){
		$(".velocity").velocity("transition.slideUpIn", { stagger: 250 });
	}, 0);		
} )( jQuery );
</script>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
