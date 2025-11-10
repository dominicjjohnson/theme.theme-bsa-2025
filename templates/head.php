<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  	<meta charset="utf-8">
  	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title><?php bloginfo('name') ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<!--
 	############################################################
 	########
 	######## WEBSITE BY: Miramedia
 	######## Find out more at mira.cx (event websites)
 	######## or miramedia.co.uk (website development)
 	######## 
 	############################################################
 	-->

  	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">


 	<?php wp_head(); ?>

 	<link href='https://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,600,300,800' rel='stylesheet' type='text/css'>
 	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 	<link href='https://fonts.googleapis.com/css?family=Open+Sans:600italic,400,700,600,300,800' rel='stylesheet' type='text/css'>
 	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 	

  <!-- <script src="http://malsup.github.com/jquery.cycle2.js"></script> -->
	<style>		
		<?php $image = get_stylesheet_directory_uri() . '/assets/img/loading.gif'; ?>
		.no-js { background:url(<?php echo $image; ?>) center center no-repeat; min-height:100%; }
		.no-js body { visibility:hidden; }
	</style>

<!-- Analytics Option-->
<script type="text/javascript">
	<?php echo $head_code = of_get_option('analytics_code', false); ?> 
</script>

</head>
