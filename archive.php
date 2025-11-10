<div class="wrapper">
	<div class="page-fullwidth-image"></div>
	<main class="page-content editor">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>
						<header class="entry-header article-header">
							<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</header>
						<section class="entry-content cf">
							<?php the_excerpt(); ?>
						</section>
					</article>
				<?php endwhile; ?>
				<?php else : ?>
					<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
							<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>
				<?php endif; ?>
	</main>
</div>
<?php get_template_part('templates/footer'); ?>

<?php get_template_part('templates/foot'); ?>
