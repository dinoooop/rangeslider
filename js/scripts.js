jQuery(function($){

	var subscribers_range, price_range = [];
	
	function set_respective_price(data){
		var subscribers = data.from_value;
		var percentage = data.from_percent;

		var index = subscribers_range.indexOf(subscribers);
		var price = price_range[index];
		$(".subscribers").html(subscribers);
		if(percentage == 100){
			$(".contact-msg").show();
			$(".normal-msg").hide();
		} else {
			$(".contact-msg").hide();
			$(".normal-msg").show();
			$(".price").html("$" + price);
		}
	}

    $.get(ajaxurl, {action: "drs_get_rangeslider_settings"}, function (data, error) {

    	subscribers_range  = data.subscription;
    	price_range  = data.price;
    	
    	$("#subscribers_range").ionRangeSlider({
	    	grid: true,
		    from: 0,
		    values: data.subscription,
		    onStart: function (data) {
		        set_respective_price(data);
		    },
		    onChange: function (data) {
		    	console.log(data);
		        set_respective_price(data);
		    },
	    });

    }, 'json');
});