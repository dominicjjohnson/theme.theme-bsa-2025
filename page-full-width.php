<?php /* Template Name: Full Width */ ?>
<main class="page-content editor full-width">

<?php
	if(have_posts()) : while(have_posts()) : the_post();
		the_content();
	endwhile; endif;
?>

</main>