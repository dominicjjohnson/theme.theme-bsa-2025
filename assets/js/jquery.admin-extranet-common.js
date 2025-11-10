jQuery(document).ready(function($){
	if($('.extranet_category_selection ul').length){
		var limit = 10;
		var theCheckboxes = $(".extranet_category_selection ul input[type='checkbox']");
		theCheckboxes.click(function() {
			if (theCheckboxes.filter(":checked").length > limit)
				$(this).removeAttr("checked");
		});
	}
});
