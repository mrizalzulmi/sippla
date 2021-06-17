/** Get kota */
function onChangeMenuKota($var){
	url = base_url+'service/getkota?provinsi_id='+$var;
	$('#kota_id').empty();
	
	$.getJSON(url,{},
		function(data){
			$('#kota_id').append(new Option('-- SILAHKAN PILIH --', ''));
			
			for(i=0;i<data.length;i++){
				$('#kota_id').append(new Option(data[i].kota, data[i].kota_id));
			}
		}
	); 
}
/** End Get kota */

/** Get result kode */
function onChangeValueKode($var){
	/**
	url = base_url+'service/getreskode?org_id='+$var;
	document.getElementById("data_kode").value = '';
	document.getElementById("data_kode_disable").value = '';
	
	$.getJSON(url,{},
		function(data){
			var elem 	= document.getElementById("data_kode");
			var elem2 	= document.getElementById("data_kode_disable");
			
			if(data.kode){
				elem.value 	= data.kode;
				elem2.value = data.kode;
			}else{
				elem.value = '';
				elem2.value = '';
			}
			
		}
	); 
	*/
}
/** End result kode */

/** Get kode urusan */
function onChangeMenuKodeUrusan($var){
	
	if($var == '1'){
		$var = 1;
	}else if($var == '90'){
		$var = 2;
	}else{
		$var = $var;
	}
	
	url = base_url+'service/getkodeparent?level=1&&parent='+$var;
	$('#urusan_id').empty();
	$('#organisasi_id').empty();
	
	
	$.getJSON(url,{},
		function(data){
			
			$('#urusan_id').append(new Option('-- SILAHKAN PILIH --', ''));
			
			for(i=0;i<data.length;i++){
				$('#urusan_id').append(new Option(data[i].nama, data[i].org_id));
			}
		}
	); 
}
/** End kode urusan */



/** Get kode organisasi */
function onChangeMenuKodeOrganisasi($var){
	url = base_url+'service/getkodeparent?level=2&&parent='+$var;
	$('#organisasi_id').empty();
	
	$.getJSON(url,{},
		function(data){
			$('#organisasi_id').append(new Option('-- SILAHKAN PILIH --', ''));
			
			for(i=0;i<data.length;i++){
				$('#organisasi_id').append(new Option(data[i].nama, data[i].org_id));
			}
		}
	); 
}
/** End kode organisasi */

/** Get kode suborganisasi */
function onChangeMenuKodeSubOrganisasi($var){
	url = base_url+'service/getkodeparent?level=3&&parent='+$var;
	$('#suborganisasi_id').empty();
	
	$.getJSON(url,{},
		function(data){
			$('#suborganisasi_id').append(new Option('-- SILAHKAN PILIH --', ''));
			
			for(i=0;i<data.length;i++){
				$('#suborganisasi_id').append(new Option(data[i].nama, data[i].org_id));
			}
		}
	); 
}
/** End kode suborganisasi */




