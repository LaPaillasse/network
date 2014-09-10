<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		$args = array(
			//'type' => 'post'
		);
		$categories = get_categories(array('hide_empty' => 1));
		//print_r( $categories[0] );
		
		?>
		<ul class="nav nav-pills">
			<li class="dropdown">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      		Catégories : Tout <span class="caret"></span>
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

	<div class="row">
		
		<?php $index = 1; if ( have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); 
				if (!in_category( 'projects', get_the_ID() )) {
			?>
				<?php if($index == 1) { ?>	
					<div class="col-md-7">
				<?php }else{ ?>
					<div class="col-md-5">
				<?php } ?>
						<div class="post-container opacity0">
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
				<?php $index++; if ($index == 4){ $index = 1; } ?>
				<?php  
				} 
				?>
			<?php endwhile; ?>

			<?php _tk_content_nav( 'nav-below' ); ?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		

		<div class="col-md-2">
			<?php //get_sidebar(); ?>
		</div>
	</div>

	<script>
	( function( $ ) {
		setTimeout(function(){
			$(".post-container").velocity("transition.slideUpIn", { stagger: 250 });
		}, 1500);		
	} )( jQuery );
	</script>

<?php get_footer(); ?>