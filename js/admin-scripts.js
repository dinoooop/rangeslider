jQuery(function($){

	var $tbody = $(".rs-table-form tbody");
	var html_template_row = $(".rs-table-form tbody tr:first-child");

	$("body").on("click", ".rs-table-form .add", function(){
		var $tr = $(this).parents('tr');
		var $html = html_template_row.clone();
		$html.find("input").val(0);
		$html.find("[type='url']").val("#");
		$tr.after($html);
	});
	
	$("body").on("click", ".rs-table-form .remove", function(){
		$(this).parents('tr').remove();
	});
	
});