jQuery(document).ready(function($){
	
	$('.footer-media-partners .sponsor-list-wrapper').addClass('footer-sponsors');
	
	if($('#header-mpu-cycle').length){
		$('#header-mpu-cycle').cycle({
	    	timeout: 12000,
			speed: 10,
			random: 1
		});
	}

	if($('.sponsor-rotate-wrapper').length){
		$('.sponsor-rotate-wrapper').bxSlider({
			mode: 'horizontal',
			controls: false,
			auto: true,
			pager: false,
			captions: false,
			minSlides: 4,
			maxSlides: 5,
			moveSlides: 1,
			slideWidth: 380,
			slideMargin: 0

		});
	}

	$("#exhibitor-list--text-search").on("keydown keyup keypress change", function() { //when the textbox is changed
		
		var query = $("#exhibitor-list--text-search").val(); //save its content
		
		$(".exhibitor-list--block h3").each(function() { //for each box
		    
		    var cur = $(this); //get the current box
		    
		    if(cur.html().indexOf(query) == -1) { //see if the current box contains the query
		        cur.closest('.exhibitor-list--block').hide("fast"); //it doesn't; hide it
		    } else {
		        cur.closest('.exhibitor-list--block').show("fast"); //it does, show it
		    }

		});

	});


	/* A to Z */
	$('.on').click(function(){
		// reset_category_dropdown( 0, table_id);
		$('.exhibitor-list--block.active').removeClass('active').addClass('clickable');

		$('.exhibitor-list--block:visible').hide('fast');
		
		var letter = $(this).data('letter');
		
		$('#exhibitor-list--block-layout div.atoz_'+letter).show('fast');
		$('#exhibitor-list--block-layout').find('div[data-letter="'+letter+'"]').addClass('active').removeClass('clickable');
		//$(this).addClass('active').removeClass('clickable');
		// location.hash = letter;
	});

	$('.all').click(function(){
		
		$('#exhibitor-list--block-layout .exhibitor-list--block').show('fast');
		$('table.atoz_table .on').addClass('active').addClass('clickable');
		$('table.atoz_table .all').addClass('active');

	});

	// This detects changes to the category dropdown.
	$('.exbtrlist-category-dropdown').each(function(){

		$(this).change( function(){

			$('table.atoz_table .active').removeClass('active').addClass('clickable');
			var catID = $(this).val();

			reset_category_dropdown( catID );
			if( catID  > 0 ) {
				$('table.atoz_table .on').addClass('active').addClass('clickable');
				$('table.atoz_table .all').removeClass('active');
				$('#exhibitor-list--block-layout .exhibitor-list--block:visible').hide('fast');
				$('#exhibitor-list--block-layout .exhibitor-list--block.cat_'+catID).show('fast');
			} else {
				$('#exhibitor-list--block-layout .exhibitor-list--block').show('fast');
			}
		});
	});

	function reset_category_dropdown( index){
		$('.exbtrlist-category-dropdown').each(function(){
			$(this).val(index);
		});
	}

/*
	if($('.footer-sponsors').length){
		$('.footer-sponsors').slick({
			slidesToShow:3,
			slidesToScroll:1,
			infinite:true,
			autoplay:true,
			autoplaySpeed:2000,
			arrows:false,
		});
	}
*/
	$('.footer-media-partners .unyson-sponsors div').remove('.clear');
	
	if($('.footer-sponsors').length){
		$('.footer-sponsors').owlCarousel({
			items:6,
			loop:true,
			autoplay:2000,
		});
	}

});