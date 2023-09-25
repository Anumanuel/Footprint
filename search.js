$(document).ready(function(){
    filterSearch();	
    $('.product').click(function(){
        filterSearch();
    });	
	$('#priceSlider').slider({		
	}).on('change', priceRange); 	
});
function priceRange(e){
	$('.priceRange').html($(this).val() + " - 7000");
	$('#minPrice').val($(this).val());
	filterSearch();	
}
function filterSearch() {
	$('.searchResult').html('<div id="loading">Loading .....</div>');
	var action = 'fetch_data';
	var minPrice = $('#minPrice').val();
	var maxPrice = $('#maxPrice').val();
	var catid= getFilterData('catid');
	var brand = getFilterData('brand');
	var gender=  $('#gender').val();
	var category=  $('#category').val();
	var searchBox =$('#searchBox').val();

	$.ajax({
		url:"action.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, minPrice:minPrice, maxPrice:maxPrice, catid:catid, brand:brand, gender:gender, searchBox:searchBox, category:category, },
		success:function(data){
			$('.searchResult').html(data.html);
		}
	});
}
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}

