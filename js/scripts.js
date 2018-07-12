jQuery(function($){

	var subscribers_range = [
		500,
		1000,
		2000,	
		5000,	
		10000,
		15000,
		20000,
		25000,
		50000,
		100000,
		200000,
		"300000+",
	];

	var price_range = [
		0,
		10,
		39,
		59,
		99,
		139,
		169,
		199,
		249,
		479,
		899,
		"contact",
	];

	function set_respective_price(subscribers){
		var index = subscribers_range.indexOf(subscribers);
		var price = price_range[index];
		$(".subscribers").html(subscribers);
		if(price == "contact"){
			$(".contact-msg").show();
			$(".normal-msg").hide();
		} else {
			$(".contact-msg").hide();
			$(".normal-msg").show();
			$(".price").html("$" + price);
		}
	    
	}

    $("#subscribers_range").ionRangeSlider({
    	grid: true,
	    from: 0,
	    values: subscribers_range,
	    onStart: function (data) {
	        set_respective_price(data.from_value);
	    },
	    onChange: function (data) {
	        set_respective_price(data.from_value);
	    },
    });
});