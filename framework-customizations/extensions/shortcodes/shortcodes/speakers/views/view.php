<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

	$speakers = array(
		array( 'name' => 'Ajay Goel', 'job' => '', 'image' => 'ajay.jpg'),
		array( 'name' => 'Andreas Matern', 'job' => 'Thomson Routers', 'image' => 'andreas.jpg'),
		array( 'name' => 'Brian Dougherty', 'job' => 'AstraZeneca R&D', 'image' => 'brian.jpg'),
		array( 'name' => 'Bruce Korf', 'job' => 'University of Alabama at Birmingham', 'image' => 'bruce.jpg'),
		array( 'name' => 'David Bick', 'job' => 'Childrens Hospital of Wisconsin', 'image' => 'dave.png'),
		array( 'name' => 'David Chambers', 'job' => 'Kings College London', 'image' => 'davidc.jpg'),
		array( 'name' => 'David Smith', 'job' => 'Mayo Clinic', 'image' => 'davids.jpg'),
		array( 'name' => 'David Von Schack', 'job' => 'Clinical R&D Precision Medicine', 'image' => 'davidv.jpg'),
		array( 'name' => 'Eileen Dolan', 'job' => 'University of Chicago', 'image' => 'dolan.jpg'),
		array( 'name' => 'Dominique Verhelle', 'job' => 'Pfizer', 'image' => 'dominique.jpg'),
		array( 'name' => 'Elaine Mardis', 'job' => 'Washington University', 'image' => 'elaine.jpg'),
		array( 'name' => 'Fahd Al-Mulla', 'job' => 'Kuwait University', 'image' => 'fahd.jpg'),
		array( 'name' => 'Gary E. Marchant', 'job' => 'Arizona State University', 'image' => 'gary.jpg'),
		array( 'name' => 'Georgios Stamatas', 'job' => 'Johnson & Johnson', 'image' => 'georgios.jpg'),
		array( 'name' => 'John McPherson', 'job' => 'Ontario for Institute for Cancer Research', 'image' => 'john.jpg'),
		array( 'name' => 'Lynn Dressler', 'job' => 'Mission Health', 'image' => 'lynn.png'),
		array( 'name' => 'Maren Scheuner', 'job' => 'VA Greater Los Angeles Healthcare System', 'image' => 'maren.jpg'),
		array( 'name' => 'Morten Sogaard', 'job' => 'Pfizer', 'image' => 'morten.jpg'),
		array( 'name' => 'Nadav Ahituv', 'job' => 'University of California', 'image' => 'nadav.jpg'),
		array( 'name' => 'Partha Majumder', 'job' => 'NIBMG', 'image' => 'partha.jpg'),
		array( 'name' => 'Robert Green', 'job' => 'Harvard Medical School', 'image' => 'robert.jpg'),
		array( 'name' => 'Theral Timpson', 'job' => 'Mendelspod', 'image' => 'theral.jpg'),

		array( 'name' => 'Ajay Goel', 'job' => '', 'image' => 'ajay.jpg'),
		array( 'name' => 'Andreas Matern', 'job' => 'Thomson Routers', 'image' => 'andreas.jpg'),
	);

	$asseturi = get_stylesheet_directory_uri().'/assets/_content/'; ?>

	<section class="speakers speakers--wall">

	<?php foreach($speakers as $speaker) : ?>

		<article class="speaker__excerpt speaker__excerpt--wall" style="background-image:url(<?php echo $asseturi . $speaker['image']; ?>);">
			<div class="speaker__content">
				<a href="#" title="">
					<h3><?php echo $speaker['name']; ?></h3>
					<p><?php echo $speaker['job']; ?></p>
				</a>
			</div>
		</article>

	<?php endforeach; ?>

	</section>
