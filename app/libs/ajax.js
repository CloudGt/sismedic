$(function(){
	var ENV_WEBROOT = "../";
	
	$(".btn-agregar-producto").off("click");
	$(".btn-agregar-producto").on("click", function(e) {
		var cantidad = $("#txt_cantidad").val();
		var producto_id = $("#cbo_producto").val();
		if(producto_id!=0){
			if(cantidad!=''){
				$.ajax({
					url: 'Controller/ProductoController.php?page=1',
					type: 'post',
					data: {'producto_id':producto_id, 'cantidad':cantidad},
					dataType: 'json',
					success: function(data) {
						if(data.success==true){
							$("#txt_cantidad").val('');
							alertify.success(data.msj);
							$(".detalle-producto").load('detalle.php');
						}else{
							alertify.error(data.msj);
						}
					},
					error: function(jqXHR, textStatus, error) {
						alertify.error(error);
					}
				});				
			}else{
				alertify.error('Ingrese una cantidad');
			}
		}else{
			alertify.error('Seleccione un producto');
		}
	});
	
	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: 'Controller/ProductoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('detalle.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	
	$(".guardar-carrito").off("click");
	$(".guardar-carrito").on("click", function(e) {
		$.ajax({
			url: 'Controller/ProductoController.php?page=3',
			type: 'post',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#txt_cantidad").val('');
					alertify.success(data.msj);
					//$(".detalle-producto").load('doc_guardado.php?xdoc=2');
					setTimeout(function(){
					  //window.location.href = 'impresion.php?id='+data.idventa;
					  $(".detalle-producto").load('detalle.php');
					}, 3000);
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error(error);
			}
		});				
	});

	$("#btn_verificanit").off("click");	
	$("#btn_verificanit").on("click", function(e) {
		var nit = $("#nit").val();

		$.ajax({
			url: 'Controller/ProductoController.php?page=5&&nit='+nit.toUpperCase(),
			data: {'nit':nit},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					$("#nit").val('');
					alertify.success(data.msj);
					
					//setTimeout(function(){
					  $("#infocliente").load(data.msj);
					//}, 1000); 
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error('error ajax' + error);
				
			}
		});	
				
	});

});