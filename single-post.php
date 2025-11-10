<div class="fw-page-builder-content">
	<section class="fw-main-row  fw-container-light-section" style="padding-top: 75px; padding-bottom: 75px; background-image:url(http://bsa2017.mmsite.co.uk/wp-content/uploads/2015/08/Gallery25-1024x683-1.jpg); background-size: cover; background-repeat: repeat; background-position: center center;" >
		<div class="fw-container">
			<div class="fw-row">
				<div class="c c--100">
					<div class="fw-divider-space" style="padding-top: 130px;"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="wrapper single-post">
	<main class="editor full-width">
		<p class="blog-small-heading">Featured News</p>
	<div class="page-title"><h1><?php the_title() ?></h1></div>
		<?php
			if(have_posts()) : while(have_posts()) : the_post();
			?>
			<div class="post_image">
				<?php the_post_thumbnail();?>
			</div>
			<?php
				the_content();
				
			endwhile; endif;
			
			
		?>
<!--
		<div class="author">
			<div class="author-image"><?php echo get_avatar( get_the_author_meta('ID'), 52 ); ?></div>
			<div class="author-name"><?php the_author(); ?></div>
		</div>
-->
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