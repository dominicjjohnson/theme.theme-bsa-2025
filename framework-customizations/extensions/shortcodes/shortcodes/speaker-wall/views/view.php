<?php 
	
	if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

	$args = array( 
		'post_type' => 'speakers', 
		'posts_per_page' => 39, 
		'orderby' => 'rand',
		'meta_query' => array(
			array(
					'key' => '_thumbnail_id',
			),
		),
	);

	$speakers = new WP_Query($args);
?>

	<?php if ( $speakers->have_posts() ) : ?>

	<section class="speakers speakers--wall">

		<?php while ( $speakers->have_posts() ) : $speakers->the_post(); ?>

			<?php if( has_post_thumbnail($post_id) ) : ?>

				<?php $avatar = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' ); $avatar = $avatar[0]; ?>

				<?php $jobtitle = get_post_meta( get_the_ID(), 'speaker_company_name', 1); ?>
					
				<article class="speaker__excerpt speaker__excerpt--wall" style="background-image:url(<?php echo $avatar; ?>);">

					<div class="speaker__content">
						<a href="<?php echo get_permalink($post_id); ?>" title="<?php the_title(); ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php echo $jobtitle; ?></p>
						</a>
					</div>

				</article>

			<?php endif; ?>

		<?php endwhile; ?>

		<a href="<?php echo site_url(); ?>/schedule/who-is-speaking/" class="speaker__excerpt speaker__excerpt--wall speaker__excerpt--wall_final" style="background: #ccc;">
			<div class="speaker__content final_clicktrough">
				ALL Speakers <i class="fa fa-angle-double-right"></i>
			</div>
		</a>

	</section>

	<?php endif; ?>