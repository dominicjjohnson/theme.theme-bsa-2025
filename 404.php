<div class="wrapper">
	<div class="page-fullwidth-image"></div>
	
	<main class="page-content editor">
	<h1>404!</h1>
	<h2>Sorry this page couldn't be found</h2>
	<p>Looks like the page has been moved or deleted.</p>
	<ul>
		<li><a href="/">Go back to the home Page</a></li>
	</ul>
	<?php
		if(have_posts()) : while(have_posts()) : the_post();
			the_content();
		endwhile; endif;
	?>

	</main>

	<?php 
		//
		if ( !is_front_page() ) {
			get_template_part('templates/sidebar');
		}
	?>
</div>