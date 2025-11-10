<div class="wrapper">
	<div class="page-fullwidth-image"></div>

	<main class="page-content editor">
	<div class="page-title"><h1><?php the_title() ?></h1></div>
		<?php
			if(have_posts()) : while(have_posts()) : the_post();
				the_content();
			endwhile; endif;
		?>

		<?php

		$disqus_shortname = of_get_option('disqus_account', false); 
		if(!empty($disqus_shortname)){
		echo <<<HERE
	    <div id="disqus_thread"></div>
	    
		<script type="text/javascript">
		    /* * * CONFIGURATION VARIABLES * * */
		    var disqus_shortname = '{$disqus_shortname}';
		    
		    /* * * DON'T EDIT BELOW THIS LINE * * */
		    (function() {
		        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		    })();
		</script>
HERE;
		}
?>
	</main>

	<?php 
		//
		if ( !is_front_page() ) {
			get_template_part('templates/sidebar');
		}
	?>
</div>