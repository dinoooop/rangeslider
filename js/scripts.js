jQuery(function($){

	var subscribers_range, price_range, url_range = [];
	
	function numberWithCommas(x){
  		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	
	function set_respective_price(data){
		var subscribers = data.from_value;
		var percentage = data.from_percent;

		var index = subscribers_range.indexOf(subscribers);
		var price = price_range[index];
		var uri = url_range[index];

		$(".subscribers").html(numberWithCommas(subscribers));

		if(percentage == 100){
			$(".contact-msg").show();
			$(".result").hide();
		} else {
			var print_price = numberWithCommas(price)
			$(".contact-msg").hide();
			$(".result").show();
			$(".price").html("$" + print_price);
			$(".btn-price").html("$" + print_price + " / MONTH");
			$(".btn-price").attr("href", uri);
		}
	}

    $.get(ajaxurl, {action: "drs_get_rangeslider_settings"}, function (data, error) {

    	subscribers_range  = data.subscription;
    	price_range  = data.price;
    	url_range  = data.urls;
    	
    	$("#subscribers_range").ionRangeSlider({
	    	grid: true,
		    from: 0,
		    values: data.subscription,
		    onStart: function (data) {
		        set_respective_price(data);
		    },
		    onChange: function (data) {
		        set_respective_price(data);
		    },
	    });

    }, 'json');
});