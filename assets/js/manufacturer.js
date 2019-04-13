var manufacturerList = [{"label":"Apollo pharma","value":"XBA5GNW9MS6YB5DUC4LQ"},{"label":"ACME","value":"HUU2M31OFVDIVT1TEPHP"},{"label":"Square ","value":"Q87H72RRTH4YBPSUCTPQ"},{"label":"Bristol Pharma ltd","value":"ML9MIVP68HV3U1W7WYMD"},{"label":"ACI ltd","value":"VLULZ8PFO6BHLX4CQACN"},{"label":"Beximcom","value":"2WH38HU9QSN15GKZ2ZJC"},{"label":"Ibsina","value":"96FCQ62SAI7EKIKEOJR8"},{"label":"Brian","value":"1HPAA23BUVGDJEXWJ1RP"}] ; 

APchange = function(event, ui){
	$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
    $(function() {
      
        $( ".manufacturerSelection" ).autocomplete(
		{
            source: function (request, response) {
				var base_url = $('.baseUrl').val();
				$.ajax({
					url: base_url + "pharmacy_manager/manufacturer/search_by_name",
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
			delay:300,
			focus: function(event, ui) {
				$(this).parent().find(".manufacturer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				return false;
			},
			select: function(event, ui) {
				$(this).parent().find(".manufacturer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				$(this).unbind("change");
				return false;
			}
		});
			$( ".manufacturerSelection" ).focus(function(){
				$(this).change(APchange);
			
			});
    });
