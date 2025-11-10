<div class="wrapper">
<main class="page-content editor" style="width:100%;">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
	<?php get_template_part('content/speakers/speakers-single'); ?>

<?php endwhile; endif; ?>

</main>

<?php 
	//
/*
	if ( !is_front_page() ) {
		get_template_part('templates/sidebar');
	}
*/
?>
</div>