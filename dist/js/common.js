function selectSubcategories(subcat_id){
	if(subcat_id!="-1"){
		loadData('state',subcat_id,"Sub Categories");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select Sub-Categories</option>");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}

function selectSubsubcategories(sscat_id){
	if(sscat_id!="-1"){
		loadData('city',sscat_id,"Sub Sub Categories");
	}else{
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}

function loadData(loadType,loadId,showstr){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="http://headwaytechnologies.in/images/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadData",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+showstr+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}

function selectState(country_id){
	if(country_id!="-1"){
		loadCityData('state',country_id);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function selectCity(state_id){
	if(state_id!="-1"){
		loadCityData('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}
function loadCityData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="http://headwaytechnologies.in/images/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadCityData",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
