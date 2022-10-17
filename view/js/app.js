$(document).ready(function(){
	fetch();
	//add
	$('#addnew').click(function(){
		$('#add').show();
		$('#edit').hide();
		$('#delete').hide();
	});
	$('#addForm').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		//console.log(addform);
		$.ajax({
			method: 'POST',
			url: '/crud_pdo_ajax/controller/add.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}

				$('#add').hide();
			}
		});
	});
	//

	//edit
	$(document).on('click', '.edit', function(){
		var id = $(this).data('id'); //l'id est ajouté avec fetch
		getDetails(id); //
		$('#add').hide();
		$('#edit').show();
		$('#delete').hide();
	});
	$('#editForm').submit(function(e){
		e.preventDefault();
		var editform = $(this).serialize();
		// console.log(this);
		$.ajax({
			method: 'POST',
			url: '/crud_pdo_ajax/controller/edit.php',
			data: editform,
			dataType: 'json',
			success: function(response){
				//console.log(response);
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}

				$('#edit').hide();
			}
		});
	});
	//

	//delete
	$(document).on('click', '.delete', function(){
		//console.log(this)
		var id = $(this).data('id');
		//console.log(id)
		getDetails(id);
		$('#add').hide();
		$('#edit').hide();
		$('#delete').show();
	});

	$('.id').click(function(){
		//console.log(this)
		var id = $(this).val();
		//console.log(id)
		$.ajax({
			method: 'POST', 
			url: '/crud_pdo_ajax/controller/delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
				
				$('#delete').hide();
			}
		});
	});

	//close message
	$(document).on('click', '#close_message', function(){
		$('#alert').hide();
	});

	//close
	$(document).on('click', '.close', function(){
		$('#add').hide();
		$('#delete').hide();
		$('#edit').hide();
	});

});

function fetch(){
	//console.log('Fetch')
	$.ajax({
		method: 'POST',
		url: '/crud_pdo_ajax/controller/fetch.php',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}

function getDetails(id){
	$.ajax({
		method: 'POST',
		url: '/crud_pdo_ajax/controller/fetch_row.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').hide();
				$('#delete').hide();
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				//console.log(response);
				$('.id').val(response.data.id); //renvoie l'id dans l'attribut pour futur sql'
				$('.firstname').val(response.data.firstname);
				$('.lastname').val(response.data.lastname);
				$('.address').val(response.data.address);
				$('.fullname').html(response.data.firstname + ' ' + response.data.lastname);
			}
		}
	});
}