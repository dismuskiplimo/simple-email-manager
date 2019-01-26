$(document).ready(function(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$(document).on('submit', '.auth-form', function(e){
		var that = $(this);
		var btn = that.find('button[type=submit]');
		$('.debug-div').html('');

		btn.attr('disabled', 'disabled');
		btnTxt = btn.html();
		btn.html(loadingText);

		$.ajax({
			url:that.attr('action'),
			method:that.attr('method'),
			data:that.serialize(),
			success:function(data){
				if(data.status == 200){
					location.reload();
				}
				
				alert(data.message);
			},
			error:function(xhr,status,err){
				if(xhr.status == 422){
					var errors = JSON.parse(xhr.responseText);

					var inpts = that.find('input, select, textarea').each(function(){
						$(this).removeClass('is-invalid');
						$(this).tooltip('hide');
						$(this).attr('title', '');
					});

					$.each(errors, function(key, value){
						alert(value);
					});
				}

				else{
					$('.debug-div').html(xhr.responseText);
				}
			},
			complete:function(){
				btn.removeAttr('disabled');
				btn.html(btnTxt);
			}
		});

		e.preventDefault();
	});


	$('.logout-button').on('click', function(){
		$('.logout-form').submit();
	});

	$('.compose-email-form-2').on('submit', function(e){
		var that = $(this);
		var submit = that.find('button[type=submit]');
		submit.attr('disabled', 'disabled');
		var btnText = submit.html();
		submit.html('Sending ' + loadingText());

		$.ajax({
			url: that.attr('action'),
			method: that.attr('method'),
			data: that.serialize(),
			enctype: that.attr('enctype'),
			success: function(data){
				if(data.status == 200){
					that.find('input, select').each(function(){
						$(this).val('');
					});

					that.find('textarea').each(function(){
						$(this).html('');
					});

					$.snackbar({content: data.message});
				}

				else{
					$.snackbar({content: data.message, html: true});
				}
				
			},

			error: function(xhr,status, err){
				if(xhr.status == 422){
					var errors = JSON.parse(xhr.responseText);

					$.each(errors, function(key, value){
						$.snackbar({content: value});
					})
				}

				else{
					$.snackbar({content: xhr.responseText, html: true});
				}
			},

			complete: function(){
				submit.html(btnText);
				submit.removeAttr('disabled');
			}
		});

		e.preventDefault();
	});


	$('.ajax-form').on('submit', function(e){
		var that = $(this);
		var submit = that.find('button[type=submit]');
		submit.attr('disabled', 'disabled');
		var btnText = submit.html();
		submit.html(loadingText());

		$.ajax({
			url: that.attr('action'),
			method: that.attr('method'),
			data: that.serialize(),
			enctype: that.attr('enctype'),
			success: function(data){
				if(data.status == 200){
					that.find('input, select').each(function(){
						$(this).val('');
					});

					that.find('textarea').each(function(){
						$(this).html('');
					});

					$.snackbar({content: data.message});
				}

				else{
					$.snackbar({content: data.message, html: true});
				}
				
			},

			error: function(xhr,status, err){
				if(xhr.status == 422){
					var errors = JSON.parse(xhr.responseText);

					$.each(errors, function(key, value){
						$.snackbar({content: value});
					})
				}

				else{
					$.snackbar({content: xhr.responseText, html: true});
				}
			},

			complete: function(){
				submit.html(btnText);
				submit.removeAttr('disabled');
			}
		});

		e.preventDefault();
	});

	if(document.getElementById('uploader') != null){
		var uploader = new qq.FineUploader({
			element: document.getElementById('uploader'),

			request: {
				endpoint: '/user/csv/add',
			},

			deleteFile: {
				enabled: true,
				endpoint: '/user/csv/delete',
			},

			retry: {
				enableAuto: true,
			}
		});
	}


	if($('#email-content').length){
		$('#email-content').froalaEditor();
	}


	function loadingText(){
		return '<div class="sk-three-bounce">' +
			        '<div class="sk-child sk-bounce1"></div>' +
			        '<div class="sk-child sk-bounce2"></div>' +
			        '<div class="sk-child sk-bounce3"></div>' +
			  	'</div>';
	}

});