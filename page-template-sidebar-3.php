<?php /* Template Name: Template - Sidebar 3 */ ?> 
<div class="wrapper">
	<div class="page-fullwidth-image"></div>
	<main class="page-content editor">
	<?php //get_template_part('templates/headermpu'); ?>

	<?php
		if(have_posts()) : while(have_posts()) : the_post();
			the_content();
		endwhile; endif;
	?>

	</main>


<?php get_template_part('templates/sidebar-template-1'); ?>
</div>