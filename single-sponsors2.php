<?php get_header(); ?>
<?php get_sidebar('left'); ?>
<!-- Single.php -->
<div id="content" class="sponsor">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="sponsor-name"><?php the_title(); ?></h1>
			<?php $sponsor_url     = get_post_meta( $post->ID, 'sponsor_url', true ); ?>

			<?php if(has_post_thumbnail() || $sponsor_url) : ?>
				<?php $left_content = 1; ?> 
				<div class="content-left">
					<?php if ( get_the_post_thumbnail( $id, 'partner_logo' ) ) :  ?>
				
						<?php echo get_the_post_thumbnail( $id, 'partner_logo' ); ?>
						<br  /><br /><br  />
						
					<?php endif; ?>
					<?php 
						if($sponsor_url) :
							echo '<p><a class="view-site" target="_blank" href="' . $sponsor_url . '" title="' . get_the_title() . '">View Website</a></p>';
						endif;
					?>

				</div>
				<div class="content-right">
				
			<?php endif; ?>
				
			<?php the_content(); ?>
		<?php if($left_content == 1) echo '</div>'; ?>
	<?php endwhile; else: ?> <?php endif; ?>
		
	<p class="clear"><span class="back-btn" onClick="parent.history.back();" title="<?php echo $backlink_text; ?>">&laquo; Go Back</span></p>
	<?php get_template_part('content/page/page-footnote'); ?>
</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
