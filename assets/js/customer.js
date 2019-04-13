var customerList = [
    { 
        "label": "Jannatul Ferdaus", 
        "value": "TKHCN67CH7DFM82" 
    }
];

APchange = function (event, ui) {
    if($(this).data("autocomplete")) $(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
$(function () {

    var options = {
        delay: 300,
        source: function (request, response) {
			var base_url = $('.baseUrl').val();
			$.ajax({
				url: base_url + "patient/search_by_name",
				method: 'post',
				dataType: "json",
				data: {
					name: request.term,
				},
				success: function (data) {
					response(data);

				}
			});
		},
        focus: function (event, ui) {
            $(this).parent().find(".customer_hidden_value").val(ui.item.value);
            $(this).val(ui.item.label);
            return false;
        },
        select: function (event, ui) {
            $(this).parent().find(".customer_hidden_value").val(ui.item.value);
            $(this).val(ui.item.label);
            $(this).unbind("change");
            return false;
        }
    };

    $(".customerSelection").autocomplete(options);
    $(".customerSelection").focus(function () {
        $(this).change(APchange);

    });
});