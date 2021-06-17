$(function() {
	
	$('.SubmitForm').live('submit', function(e) {
		e.preventDefault();
		dataString = $(".SubmitForm").serialize();
		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: dataString,
			dataType: "json",
			success: function(data) {
				if(data.check_valid == "valid"){
					$("#message_info").html("<div class='alert alert-dismissable alert-info'> " 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
					clear_form_elements('.SubmitForm');
				} else {
					$("#message_info").html("<div class='alert alert-dismissable alert-danger'>" 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
				}
			} 
		});         
	});
	
	/** form submit update data */
	$('.SubmitFormEdit').live('submit', function(e) {
		e.preventDefault();
		dataString = $(".SubmitFormEdit").serialize();
		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: dataString,
			dataType: "json",
			success: function(data) {
				if(data.check_valid == "valid"){
					$("#message_info").html("<div class='alert alert-dismissable alert-info'> " 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
				} else {
					$("#message_info").html("<div class='alert alert-dismissable alert-danger'>" 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
				}
			} 
		});         
	});
	
	$('.SubmitFormReload').live('submit', function(e) {
		e.preventDefault();
		dataString = $(".SubmitFormReload").serialize();
		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: dataString,
			dataType: "json",
			success: function(data) {
				if(data.check_valid == "valid"){
					$("#message_info").html("<div class='alert alert-dismissable alert-info'> " 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
					clear_form_elements('.SubmitFormReload');
					location.reload();
				} else {
					$("#message_info").html("<div class='alert alert-dismissable alert-danger'>" 
					+ data.message_info + 
					"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
				}
			} 
		});         
	});
	
	/** clear element */
	function clear_form_elements(ele) {

        $(ele).find(':input').each(function() {
            switch(this.type) {
                case 'password':
                case 'select-multiple':
                case 'select-one':
                case 'text':
                case 'textarea':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });

    }
	
	// add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    });

});

