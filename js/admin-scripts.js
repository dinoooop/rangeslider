jQuery(function($){

	var $tbody = $(".rs-table-form tbody");
	var html_template_row = $(".rs-table-form tbody tr:first-child");

	console.log(html_template_row);
	$("body").on("click", ".rs-table-form .add", function(){
		var $tr = $(this).parents('tr');
		var $html = html_template_row.clone();
		$html.find("input").val(0);
		$tr.after($html);
	});
	$("body").on("click", ".rs-table-form .remove", function(){
		$(this).parents('tr').remove();
		
	});
	
});