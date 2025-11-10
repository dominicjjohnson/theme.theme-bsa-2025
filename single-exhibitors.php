<div class="wrapper">
	<div class="page-fullwidth-image"></div>
	<main class="page-content editor">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php get_template_part('content/exhibitors/exhibitors-single'); ?>
	
	<?php endwhile; endif; ?>

	</main>

	<?php 
		//
		if ( !is_front_page() ) {
			get_template_part('templates/sidebar-template-2');
		}
	?>
</div>