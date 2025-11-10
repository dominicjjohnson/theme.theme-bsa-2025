<footer class="footer">
	<div class="wrapper">
	<?php echo $footer_code = get_option('footer_codes', false); ?>
		<div class="contact-form">
		<?php gravity_form( 1, false, false, false, '', false ); ?>
		<a class="privacy-policy-link" target="_blank" href="https://www.bsa.org.uk/privacy-policy">Privacy Policy</a>
		</div>
	</div>
	<div class="footer__copyright">
		<div class="footer-wrapper">
			<img class="bsa-logo" src="<?php echo get_stylesheet_directory_uri().'/assets/img/BSA_Logo_White_small_150.png' ?>" width="150px"/>
			<p>Copyright © BSA <?php echo date('Y'); ?> All Rights Reserved.</p>
			<p><a href="http://www.miramedia.co.uk/" target="_blank">Website created by Miramedia</a></p>
		</div>
	</div>
</footer>