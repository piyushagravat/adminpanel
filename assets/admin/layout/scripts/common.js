function selectSubcategories(subcat_id){
	if(subcat_id!="-1"){
		loadData('state',subcat_id,"Categories");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select Sub-Categories</option>");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}

function selectSubsubcategories(sscat_id){
	if(sscat_id!="-1"){
		loadData('city',sscat_id,"Sub Categories");
	}else{
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}

function loadData(loadType,loadId,showstr){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
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

function selectBrand(mid){
	if(mid!="-1"){
		loadBrand('brand',mid,"Brand");
		$("#brand_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");	
	}else{
		$("#brand_dropdown").html("<option value='-1'>Select Sub-Categories</option>");
		$("#brand_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}
function loadBrand(loadType,loadId,showstr){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "loadBrand",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+showstr+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}

function selectBrandFromEdit(mid){
	if(mid!="-1"){
		loadBrandFromEdit('brand',mid,"Brand");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");	
	}else{
		$("#brand_dropdown").html("<option value='-1'>Select Sub-Categories</option>");
		$("#city_dropdown").html("<option value='-1'>Select Sub-Sub-Categories</option>");		
	}
}
function loadBrandFromEdit(loadType,loadId,showstr){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "../loadBrand",
		data: dataString,
		cache: false,
		success: function(result){
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+showstr+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}