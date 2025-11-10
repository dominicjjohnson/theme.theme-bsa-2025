<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

	$id_to_class = array(
		'1_6' => 'c--16',
		'1_4' => 'c--25',
		'1_3' => 'c--33',
		'1_2' => 'c--50',
		'2_3' => 'c--66',
		'3_4' => 'c--75',
		'1_1' => 'c--100'
	);

?>

<div class="c <?php echo $id_to_class[$atts['width']]; ?>">
	<?php echo do_shortcode($content); ?>
</div>
