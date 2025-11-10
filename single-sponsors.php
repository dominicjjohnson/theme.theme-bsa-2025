<div class="wrapper">
	<div class="page-fullwidth-image"></div>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<div class="page-title"><h1>Our Sponsors</h1></div>
	<main class="page-content editor" style="width:100%;">

	<?php $sponsor_url     = get_post_meta( $post->ID, 'sponsor_url', true ); ?>

		<?php if(has_post_thumbnail() || $sponsor_url) : ?>
			<div class="alignright">
				<a target="_blank" href="<?php echo $sponsor_url; ?>">

				<?php if ( get_the_post_thumbnail( $post->ID, 'partner_logo' ) ) :  ?>
					 
					<?php echo get_the_post_thumbnail( $post->ID, 'partner_logo' ); ?>
									
				<?php endif; ?>
				</a>
				<?php 
					if($sponsor_url) :
						echo '<p><a class="view-site" target="_blank" href="' . $sponsor_url . '" title="' . get_the_title() . '">View Website</a></p>';
					endif;
				?>

			</div>
			
		<?php endif; ?>
			
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>

	</main>
	<?php endwhile; endif; ?>

	<?php get_template_part('templates/sidebar'); ?>
</div>
