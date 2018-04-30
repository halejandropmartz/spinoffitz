$(document).ready(function() {

	// GUARDAR REGISTRO

	$('#guardar-registro').on('submit', function(e) {
		e.preventDefault();
		var datos = $(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data) {
				console.log(data);
				var resultado = data;
				if (resultado.respuesta == 'exito') {
					swal('¡Muy bien!', 'El administrador se guardó correctamente', 'success');
				} else {
					swal('¡Qué mal!', 'Ha ocurrido un error', 'error');
				}
			}
		}).fail( function( jqXHR, textStatus, errorThrown ) {
			if (jqXHR.status === 0) {
				alert('Not connect: Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (textStatus === 'parsererror') {
				alert('Requested JSON parse failed.');
				console.log(jqXHR.responseText);
			} else if (textStatus === 'timeout') {
				alert('Time out error.');
			} else if (textStatus === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error: ' + jqXHR.responseText);
			}

		});
	});

	// GUARDAR REGISTRO CON ARCHIVO

	$('#guardar-registro-archivo').on('submit', function(e) {
		e.preventDefault();
		var datos = new FormData(this);
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			contentType: false,
			processData: false,
			async: true,
			cache: false,
			success: function(data) {
				console.log(data);
				var resultado = data;
				if (resultado.respuesta == 'exito') {
					swal('¡Muy bien!', 'El administrador se guardó correctamente', 'success');
				} else {
					swal('¡Qué mal!', 'Ha ocurrido un error', 'error');
				}
			}
		}).fail( function( jqXHR, textStatus, errorThrown ) {
			if (jqXHR.status === 0) {
				alert('Not connect: Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (textStatus === 'parsererror') {
				alert('Requested JSON parse failed.');
				console.log(jqXHR.responseText);
			} else if (textStatus === 'timeout') {
				alert('Time out error.');
			} else if (textStatus === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error: ' + jqXHR.responseText);
			}

		});
	});

	// ELIMINAR REGISTRO

	$('.borrar_registro').on('click', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var tipo = $(this).attr('data-tipo');
		swal({
			title: '¿Estás seguro?',
			text: "Un registro eliminado no se puede recuperar",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar',
			cancelButtonText: 'Cancelar'
		}).then(function() {
			$.ajax({
				type: 'post',
				data: {id: id, registro: 'eliminar'},
				url: 'modelo-' + tipo + '.php',
				dataType: "json",
				success: function(data) {
					console.log(data);
					var resultado = data;
					if (resultado.respuesta == 'exito') {
						swal(
							'Eliminado',
							'El registro fue eliminado',
							'success'
							)
						jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
					} else {
						swal('¡Qué mal!', 'No se pudo eliminar el registro', 'error').catch(swal.noop);;
					}
				}
			});
		}).catch(swal.noop);
	})

});