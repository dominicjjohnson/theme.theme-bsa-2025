<body <?php body_class(); ?>>
<?php echo $body_code = get_option('body_codes', false); ?>
	<!-- Mobile Navigation Toggle -->
	<div class="nav-toggle">Menu</div>
	
	<header class="header" role="header">
		<div class="header-container">
			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo site_url() ?>" title="<?php echo bloginfo()?>">
					<img src="<?php echo get_stylesheet_directory_uri().'/assets/img/BSA_2026_Conference_logo.png' ?>" height="68px" alt="BSA Converence 2026"/>
				</a>
			</div>
			
			<!-- Desktop Navigation -->
			<nav class="header-nav desktop-nav">
			<?php 
				wp_nav_menu(array(
					'theme_location' => 'header_nav',
				)); 
			?>
			</nav>
			
			<!-- Social Buttons -->
			<div class="header-actions">
				<a class="register-btn" href="<?php echo site_url() ?>/register/">Register <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a class="social-icon" href="https://x.com/BSABuildingSocs" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/assets/img/twitter-x.png' ?>" /></a>
				<a class="social-icon" href="https://www.linkedin.com/company/537582" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/assets/img/linkedin.png' ?>" /></a>
				<a class="social-icon" href="http://vimeo.com/bsaevents" target="_blank"><img src="<?php echo get_stylesheet_directory_uri().'/assets/img/vimeo.png' ?>" /></a>
			</div>
		</div>
	</header>
	
	<!-- Mobile Navigation Menu -->
	<nav class="mobile-nav">
	<?php 
		wp_nav_menu(array(
			'theme_location' => 'header_nav',
		)); 
	?>
	</nav>