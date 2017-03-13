/**
 *  注释:选择省份
 */
function select_province()
{
	var province_id = $("#province option:selected").val();
	$.ajax({
		url : '/api/protected/service/latch/province/list',
		type: 'get',
		dataType: 'json',
		cache	: false,
		success: function(data) {
			console.log(data);
			$("#province").html("");
			$("#city").html("");
			$("#area").html("");
			$("#province").append('<option value="">省份</option>');
			$.each(data.provinces,function(key,value){
				$("#province").append('<option value="' + value.province_id + '">' + value.name + '</option>');
			});
		},
		error: function(xhr, ret, error) {
			console.log(xhr);
			console.log(ret);
			console.log(error);
			layer.msg('ajax error', {icon:2, time:2000});
		},
		beforeSend: function(xhr){
			layer.load(0, {shade: false});
		},
		complete: function(){
			layer.closeAll('loading');
		}
	});
	return false;
}
/**
 *  注释:选择城市 
 */
function select_city()
{
	var province_id = $("#province option:selected").val();
	if (province_id == '' || null) {return false;}
	$.ajax({
		url : '/api/protected/service/latch/city/list/'+province_id,
		type: 'get',
		dataType: 'json',
		cacha	: false,
		success: function(data) {
			console.log(data);
			$('#city').html("");
			$("#area").html("");
			$('#city').append('<option value="">城市</option>');
			$.each(data.cities,function(key,value){
				$('#city').append('<option value="' + value.city_id + '">' + value.name + '</option>');
			});
		},
		error: function(xhr, ret, error) {
			console.log(xhr);
			console.log(ret);
			console.log(error);
			layer.msg('ajax error', {icon:2, time:2000});
		},
		beforeSend: function(xhr){
			layer.load(0, {shade: false});
		},
		complete: function(){
			layer.closeAll('loading');
		},
	});
	return false;
}
/**
 *  注释:选择区域 
 */
function select_area()
{
	var city_id = $('#city option:selected').val();
	if (city_id == '' || null) {return false;}
	$.ajax({
		url : '/api/protected/service/latch/county/list/' + city_id,
		type: 'get',
		dataType: 'json',
		cache	: false,
		success: function(data) {
			console.log(data);
			$('#area').html("");
			$('#area').append('<option value="">区域</option>');
			$.each(data.districts,function(key,value){
				$('#area').append('<option value="' + value.county_id + '">' + value.name + '</option>');
			});
		},
		error: function(xhr, ret, error) {
			console.log(xhr);
			console.log(ret);
			console.log(error);
			layer.msg('ajax error', {icon:2, time:2000});
		},
		beforeSend: function(xhr){
			layer.load(0, {shade: false});
		},
		complete: function(){
			layer.closeAll('loading');
		},
	});
	return false;
}