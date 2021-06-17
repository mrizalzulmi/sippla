$(document).ready(function() { 	
	
	if($('table').hasClass('dynamicTable')){
		$('.dynamicTable').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": ""
			},
			
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bScrollCollapse": true,
			"sPaginationType": "bootstrap",
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
		});
	}
	
	/********************************
	 ** MODUL ADMIN 
	 ********************************/
	 
	//--------------- Data tables User ------------------//
	if($('table').hasClass('userTable')){
		$('.userTable').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sScrollX": "100%",
			
			"sAjaxSource": base_url+"user/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false},
					null,
					null,
					null,
					null,
					null,
					null,
					null,
					null,
					{ "bSortable": false, "bSearchable": false, "sWidth": "100px" }
	  		],
			"bFilter": true,
		});
	}
	
	//--------------- Data tables Group ------------------//
	if($('table').hasClass('groupTable')){
		$('.groupTable').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sScrollX": "100%",
			
			"sAjaxSource": base_url+"user/group/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false, "sWidth": "10px" },
					null,
					null,
					{ "bSortable": false, "bSearchable": false, "sWidth": "100px" }
	  		],
			"bFilter": true,
		});
	}
	
	//--------------- Data tables pegawai ------------------//
	if($('table').hasClass('pegawaiTable')){
		$('.pegawaiTable').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sScrollX": "100%",
			
			"sAjaxSource": base_url+"admin/pegawai/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false, "sWidth": "30px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "175px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "190px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "80px" },
					{"sType": "date", "bSearchable": false, "sWidth": "80px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "30px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "200px" },
                    { "bSortable": false, "bSearchable": false, "sWidth": "120px" },
					{ "bSortable": false, "bSearchable": false, "sWidth": "75px" }
	  		],
			"bFilter": true,
		});
	}
	
	/********************************
	 ** END MODUL ADMIN 
	 ********************************/
	
	
	//--------------- Data tables dokumen ------------------//
	if($('table').hasClass('docTable1')){
		$('.docTable1').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sAjaxSource": base_url+"admin/dokumen/pemda/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false, "sWidth": "10px" },
					null,
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					
					{ "bSortable": false, "bSearchable": false, "sWidth": "100px" }
	  		],
			"bFilter": true,
		});
	}
	// ------------	


	//--------------- Data tables dokumen ------------------//
	if($('table').hasClass('docTable2')){
		$('.docTable2').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sAjaxSource": base_url+"admin/dokumen/ppkd/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false, "sWidth": "10px" },
					null,
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					
					{ "bSortable": false, "bSearchable": false, "sWidth": "100px" }
	  		],
			"bFilter": true,
		});
	}
	// ------------	

	//--------------- Data tables dokumen ------------------//
	if($('table').hasClass('docTable3')){
		$('.docTable3').dataTable({
			"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			"oLanguage": {
				"sLengthMenu": "_MENU_ records per page",
				"sSearch": "",
				"sProcessing": "<img src='"+base_url+"/theme/assets/img/loader_anim.gif'/>"
			},
			"bJQueryUI": false,
			"iDisplayLength": 10,
			"bAutoWidth": true,
			"bProcessing": true,
			"bServerSide": true,
			"bScrollCollapse": true,
			"sAjaxSource": base_url+"admin/dokumen/skpd/json",
			"sPaginationType": "bootstrap",
			"aoColumns": [
					{ "bSortable": false, "bSearchable": false, "sWidth": "10px" },
					null,
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					{ "bSortable": false, "bSearchable": false},
					
					{ "bSortable": false, "bSearchable": false, "sWidth": "100px" }
	  		],
			"bFilter": true,
		});
	}
	// ------------	
	
	
	
	$('.dataTables_filter input').addClass('form-control').attr('placeholder','Search...');
    $('.dataTables_length select').addClass('form-control');
	
	/** CONFIRM DELETE */
	$(".delete").live('click', function (e) {
		e.preventDefault();
		
		var obj = $(this);
		var targetUrl = $(this).attr("href");
		var parent = $(this).closest('tr'); 

		var dialogAppendData = '<div><span class="ui-icon  icon-trash" style="float:left; margin:0 7px 20px 0;"></span>'
								 + '<i class="icon-trash"></i> Item ini akan di hapus. Apakah Anda Yakin ?</div>';
								 
		$(dialogAppendData).dialog({
			autoOpen: true, resizable: false, modal: true,
			height: 200, width: 400, zIndex: 10000,
			title: 'Hapus Item ?',
			buttons: {
				'Delete': function () {
					$.ajax({
						type: "GET",
						url: targetUrl,
						data: $(this).serialize(),
						success: function(){
							parent.fadeOut(300,function() {
								parent.remove();
							});
						},
						error : function(){
        					alert("Gagal");
    					}
					});
					
					$(this).dialog("close");
				},
				'Cancel': function () {
					$(this).dialog("close");
				}
			},
			close: function (event, ui) {
				$(this).remove();
			}
		});
	});
	
});


	
