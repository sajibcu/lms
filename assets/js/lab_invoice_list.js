APchange = function (event, ui) {
	if($(this).data("autocomplete")) $(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
function invoice_productList(cName) {
	//alert(cName);
	var priceClass = 'price_item' + cName;

	var unit = 'unit_' + cName;
	var tax = 'total_tax_' + cName;
	var discount_type = 'discount_type_' + cName;
	var batch_id = 'batch_id_' + cName;

	var options = {
		// delay: 300,
		minLength: 0,
		source: function (request, response) {
			var product_name = $("#product_name"+cName).val();
			if(!product_name) product_name = request.term;
			var base_url = $('.baseUrl').val();
			$.ajax({
				url: base_url + "lab_manager/template/search_by_name",
				method: 'post',
				dataType: "json",
				data: {
					term: request.term,
					product_name: product_name,
				},
				success: function (data) {
					response(data);

				}
			});
		},
		focus: function (event, ui) {
			$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
			$(this).val(ui.item.label);
			return false;
		},
		select: function (event, ui) {
			$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
			$(this).val(ui.item.label);
			if( $(this).attr('data-disable-callback-false') ) return false;

			var id = ui.item.value;
			var dataString = 'product_id=' + id;
			var base_url = $('.baseUrl').val();

			$.ajax
				({
					type: "POST",
					url: base_url+"lab_manager/template/retrieve_report_template_data",
					data: dataString,
					cache: false,
					success: function (data) {
						var obj = jQuery.parseJSON(data);
						$('.' + priceClass).val(obj.price);

						$('.' + unit).val(obj.unit);
						$('.' + tax).val(obj.tax);
						$('#' + discount_type).val(obj.discount_type);
						if(obj.batch){
							var select = $('#' + batch_id);
							select.find("option").remove();
							var option = new Option("Select any", "", true, true);
							select.append(option);
							for (let index = 0; index < obj.batch.length; index++) {
								const element = obj.batch[index];
								var option = new Option(element, element, false, false);
								select.append(option);
							}
							// select.trigger('change');
							// $('#' + batch_id).html(obj.batch);
						}

						//This Function Stay on others.js page
						quantity_calculate(cName);

					}
				});

			$(this).unbind("change");
			return false;
		}
	};

	$(".labReportSelection").autocomplete(options);

	$(".labReportSelection").focus(function () {
		$(this).change(APchange);

	});
}

