<div class="wrapper">
<main class="page-content editor">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<?php get_template_part('content/seminars/seminars-single'); ?>
	
	<?php endwhile; endif; ?>

</main>

<?php 
	//
	if ( !is_front_page() ) {
		get_template_part('templates/sidebar');
	}
?>
</div>