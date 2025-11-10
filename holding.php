<?php /* Template Name: Holding */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php bloginfo('name') ?><?php wp_title(); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen"/>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/inc/full-style.css"/>
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/inc/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/print.css" media="print"/>
 	<meta name="viewport" content="width=device-width" /> 
 	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<?php wp_head(); ?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,400' rel='stylesheet' type='text/css'>
</head>
<body <?php body_class(); ?>>

		<?php get_template_part('content/header/header-wrap'); ?>

	<div class="clear"></div>
	<div id="wrapper">
		<div class="mobile-logo"></div>
		<div class="confetti"><a href="http://www.confetti.co.uk/"><img src="<?php echo get_template_directory_uri(); ?>/inc/img/confetti.png"/></a></div>
		<div class="date"></div>
		<div class="content">
			<p style="font-weight:bold;">The Affordable Wedding Show website is coming soon</p>

			<p>The Affordable Wedding Show is the only national wedding show that recognises the need of UK couples to achieve a fairy tale wedding at an affordable price. With the average cost of a wedding exceeding £20,000 and more than six years hard graft required to save for a house deposit, couples in their early years face a heart versus head conundrum when it comes to deciding what to save for first.</p>

			<p>But weddings don’t have to cost the earth. In fact it is proven that you can have the day of your dreams for half the average cost. The Affordable Wedding Show will showcase a pre-qualified selection of the finest wedding venues and suppliers who are committed to helping couples achieve tying the knot in style and for much less.</p>

			<div class="form">
				<?php gravity_form( 1, false, false, false, '', false ); ?>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>