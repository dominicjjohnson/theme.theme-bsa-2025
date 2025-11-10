<?php 
	
	if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

	$sponsortype = get_term_by('ID', $atts['sponsortype'], 'sponsortype' );

	$args = array( 
		'post_type' => 'sponsors', 
		'posts_per_page' => 48, 
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'sponsortype',
				'field' => 'ID',
				'terms' => array($sponsortype->term_id)
			)
		),
		'meta_query' => array(
			array(
					'key' => '_thumbnail_id',
			),
		),
	);

	$sponsors = new WP_Query($args);
?>

	<?php if ( $sponsors->have_posts() ) : ?>

	<section class="companies companies--wall">

		<div class="companies--title">
			<h2><span>With speakers from:</span></h2>
		</div>

		<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

			<?php if( has_post_thumbnail($post_id) ) : ?>

				<?php $logo = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' ); $logo = $logo[0]; ?>
					
				<?php if ( isset($logo)): ?>
				
				<article class="company__excerpt company__excerpt--wall company__excerpt--wall">
					<div class="company__content">
						<div class="vert">
							<a href="<?php echo site_url('/partner-with-us/'); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $logo; ?>" alt=""/>
							</a>
						</div>
					</div>
				</article>

				<?php endif; ?>

			<?php endif; ?>

		<?php endwhile; ?>

	</section>

	<?php endif; ?>