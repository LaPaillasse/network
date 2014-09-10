<?php
/**
 * Template Name: Home page
 *
 * The template for displaying the home pages.
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
		<div class="col-md-8 col-md-offset-2">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<!-- <?php echo get_the_post_thumbnail($post_id, 'full');  ?> -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Les dernières actualités</h1>
			<a href="#"><button class="btn btn-primary">En voir plus</button></a>
			<div class="row">
				<?php
				// Get the last 3 blog posts
				$args = array( 'numberposts' => '3', 'supports' => array('title','editor','author','excerpt') );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
				?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 news-card-container">
						<div class="news-card">
						<?php
						if ( has_post_thumbnail() ) {
							// Get the thumbnail url
							$thumb_id = get_post_thumbnail_id($recent["ID"]);
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
						?>
							<a href="<?php echo get_permalink($recent["ID"]) ?>"><header id="post-<?php echo $recent["ID"]; ?>" style="background-image:url(<?php echo $thumb_url; ?>);">
						<?php }else{ ?>
							<a href="<?php echo get_permalink($recent["ID"]) ?>"><header style="background-image:url()">
						<?php } ?>
								<!-- <span>Bio - Design - Encre</span> -->
							</header></a>		
							<a href="<?php echo get_permalink($recent["ID"]) ?>"><h1><?php echo $recent["post_title"]; ?></h1></a>
							<div class="news-description">
								<p><?php echo get_excerpt_by_id($recent["ID"]); ?></p>
							</div>
						
						</div><!-- /.news-card -->
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Les derniers projets</h1>
			<a href="#"><button class="btn btn-primary">En voir plus</button></a>
			<div class="row">
			<?php 
			$args = array( 'post_type' => 'lp_project', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 project-card-container">
					<div class="project-card">
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
		</div>
	</div>

	<!-- Lab animation -->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class='schema-anim'>
				<div id="canvas_line_back"></div>
				<div id="canvas_line1">
					<svg id="svg_line" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="500px" height="400px" viewBox="0 0 500 400" enable-background="new 0 0 500 400" xml:space="preserve">
						<g id="Layer_1">
							<path id="line1" fill="none" stroke="#fa3958" stroke-width="3" stroke-miterlimit="10" d="M80.193,227.11v-48.02c0-2.209,1.869-4,4.176-4
				                        h18.648c2.306,0,4.176,1.791,4.176,4v14.625v24.54h0.068c0,3.927,3.184,7.111,7.111,7.111s7.111-3.184,7.111-7.111l-0.097-38.442
				                        c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442c0,3.927,3.185,7.111,7.112,7.111
				                        c3.927,0,7.111-3.184,7.111-7.111l-0.029-38.442c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442
				                        c0,3.927,3.185,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.442c0-3.928,3.184-7.112,7.112-7.112
				                        c3.927,0,7.111,3.184,7.111,7.112l-0.141,38.442c0,3.927,3.184,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.165v-1.125
				                        c0-2.209,1.87-4,4.176-4h18.648c2.306,0,4.176,1.791,4.176,4v14.625v112.188">
								<animate id="a1" attributeName="stroke-dashoffset" from="0" to="0" dur="4s" fill="freeze" calcMode="paced"/>
							</path>
							<path id="line2" fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M80.193,227.11v-48.02c0-2.209,1.869-4,4.176-4
				                        h18.648c2.306,0,4.176,1.791,4.176,4v14.625v24.54h0.068c0,3.927,3.184,7.111,7.111,7.111s7.111-3.184,7.111-7.111l-0.097-38.442
				                        c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442c0,3.927,3.185,7.111,7.112,7.111
				                        c3.927,0,7.111-3.184,7.111-7.111l-0.029-38.442c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442
				                        c0,3.927,3.185,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.442c0-3.928,3.184-7.112,7.112-7.112
				                        c3.927,0,7.111,3.184,7.111,7.112l-0.141,38.442c0,3.927,3.184,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.165v-1.125
				                        c0-2.209,1.87-4,4.176-4h18.648c2.306,0,4.176,1.791,4.176,4v14.625v112.188">
								<animate id="a2" begin="a3.end" attributeName="stroke-dashoffset" from="0" to="0" dur="8s" fill="freeze" calcMode="paced"/>
							</path>
							<path id="line3" fill="none" stroke="#0ec8b0" stroke-width="3" stroke-miterlimit="10" d="M259.73,317.604L300.209,277.125L300.304,277.061L314.467,277.125L315.262,277.125L331.936,293.8">
								<animate id="a3" begin="5s" attributeName="stroke-dashoffset" from="0" to="0" dur="3s" fill="freeze" calcMode="paced"/>
							</path>
							<path id="line4" fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M259.73,317.604L300.209,277.125L300.304,277.061L314.467,277.125L315.262,277.125L331.936,293.8">
								<animate id="a4" begin="a2.end" attributeName="stroke-dashoffset" from="0" to="0" dur="3s" fill="freeze" calcMode="paced"/>
							</path>
							<path id="line5" fill="none" stroke="#eb562c" stroke-width="3" stroke-miterlimit="10" d="M364.125,266.366L364.125,46.667L371.729,39.062L463,54L463,66.667">
								<animate id="a5" begin="a3.end" attributeName="stroke-dashoffset" from="0" to="0" dur="5s" fill="freeze" calcMode="paced"/>
							</path>
							<path id="line6" fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M364.125,266.366L364.125,46.667L371.729,39.062L463,54L463,66.667">
								<animate id="a6" begin="a4.end" attributeName="stroke-dashoffset" from="0" to="0" dur="5s" fill="freeze" calcMode="paced"/>
							</path>
						</g>
					</svg>
				</div>
				<div id="canvas_container"></div>
			</div>
		</div>
	</div>

<!-- For the lab animation -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="<?php echo bloginfo('template_url') ?>/includes/js/home-page.js"></script>

<?php get_footer(); ?>