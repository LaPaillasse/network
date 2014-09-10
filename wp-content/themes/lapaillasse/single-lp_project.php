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
		<div class="col-md-8 col-md-offset-2 project-nav">
			<ul class="nav nav-pills">
				<li><button class="btn btn-primary inner-nav" data="#project-description">Le Projet</button></li>
				<li><button class="btn btn-primary inner-nav" data="#project-news">Actualités</button></li>
				<li><button class="btn btn-primary inner-nav" data="#project-members">Membres</button></li>
				<li><button class="btn btn-primary inner-nav" data="#project-documentation">Wiki</button></li>
			</ul>
			
		</div>
	</div>

	<div class="row content" id="project-description">
		<div class="col-md-6 col-md-offset-3 project-content">
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
			?>
				<a href="<?php echo the_permalink(); ?>"><h4><?php echo get_the_title(); ?></h4></a>
				<em>Dernière révision le <?php echo get_the_modified_date( 'd-m-Y' ); ?></em>
				<p><?php echo get_the_excerpt(); ?></p>
			<?php
				}
			} else {
				// no posts found
			}
			?>
		</div>
	</div>

	<div class="row content velocity" id="project-members">
		<div class="col-md-6 col-md-offset-3">
			<?php
			global $userpro;
			global $wpdb;
			$results = $wpdb->get_results( 'SELECT user_id FROM wp_usermeta WHERE meta_key = "user_projects_member" AND meta_value LIKE "%Grow your ink%"', OBJECT );
			//print_r($results);
			foreach ( $results as $user ) 
			{
			?>
				<div class="member">					
					<div class="member-picture">
						<a href="<?php echo $userpro->permalink( $user->user_id ); ?>">
							<img src='<?php echo userpro_profile_data('profilepicture', $user->user_id); ?>' title='<?php echo userpro_profile_data('display_name', $user->user_id); ?>'>
						</a>
					</div>
					<div class="member-name">
						<a href="">
							<?php echo userpro_profile_data('display_name', $user->user_id); ?>
						</a>
					</div>
					<div class="member-meta">
						<?php echo userpro_profile_data('country', $user->user_id); ?>
					</div>
					<div class="member-bio">
						<?php echo userpro_profile_data('description', $user->user_id); ?>
					</div>
					<a href="<?php echo $userpro->permalink( $user->user_id ); ?>" class="member-profile-link">
						<button>Voir le profile</button>
					</a>
				</div>
			<?php
			}
			?>
		</div>
	</div>

	<div class="row content velocity" id="project-news">
		<div class="col-md-6 col-md-offset-3">
			<?php
			$query = new WP_Query( 'category_name='.strtolower(str_replace(" ", "-", $unique_project_identifier)) );
			if ( $query->have_posts() ) :
				// The loop
				while ( $query->have_posts() ) : $query->the_post();
			?>
				<?php if($index == 1) { ?>	
				<div class="col-md-7">
				<?php }else{ ?>
				<div class="col-md-5">
				<?php } ?>
					<div class="post-container">
					<?php
					if ( has_post_thumbnail() ) {
						// Get the thumbnail url
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0];
					?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<div class="post-thumbnail" style="background-image:url(<?php echo $thumb_url; ?>);"></div>
						</a>
					<?php 
					}
					?>
						<h1 class="page-title">
							<a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
						</h1>
						<div class="entry-content"><?php echo get_the_excerpt(); ?></div>
					</div>
				</div>
				<?php $index++; if ($index == 4){ $index = 1; } ?>
			<?php
				endwhile;
			endif;
			?>
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
		
		/*setTimeout(function(){
			$("#project-description").velocity("transition.slideUpIn", { stagger: 250 });
		}, 0);*/
	} )( jQuery );

	
	</script>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>