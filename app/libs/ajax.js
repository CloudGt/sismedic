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
			url: 'Controller/ProductoController.php?page=5&&nit='+nit,
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

	$("#btn_guardarprod").off("click");	
	$("#btn_guardarprod").on("click", function(e) {
		var descripcion  = $("#descripcion").val();
		var precio = $("#precio").val();
		var idprov = $("#idprov").val();
		var idpresentacion = $("#idpresentacion").val();
		var tipomedicamento = $("#tipomedicamento").val();
		var afecto = $("#afecto").val();
		var precioa = $("#precioa").val();
		var preciob = $("#preciob").val();
		var precioc = $("#precioc").val();
		var preciod = $("#preciod").val();
		var precioe = $("#precioe").val();
		var preciof = $("#preciof").val();
		
		$.ajax({
			url: 'Controller/ProductoController.php?page=6&&descripcion='+descripcion+'&&precio='+precio+'&&idprov='+idprov+'&&idpresentacion='+idpresentacion+'&&tipomedicamento='+tipomedicamento+'&&afecto='+afecto+'&&precioa='+precioa+'&&preciob='+preciob+'&&precioc='+precioc+'&&preciod='+preciod+'&&precioe='+precioe+'&&preciof='+preciof,
			data: {'descripcion':descripcion, 'precio':precio, 'idprov':idprov, 'idpresentacion':idpresentacion, 'tipomedicamento':tipomedicamento, 'afecto':afecto, 'precioa':precioa, 'preciob':preciob, 'precioc':precioc, 'preciod':preciod, 'precioe':precioe, 'preciof':preciof},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
 						alertify.success(data.msj);
						$("#infocliente").load(data.msj);
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error('error ajax' + error);
				
			}
		});	
				
	});

	$(".chkproducto").off("click");
	$(".chkproducto").on("click", function(e) {
		alertify.success("iddetalle");
		var iddetalle = $(this).attr("value");
		var estado = $(this).attr("estado");
		var valor = $(this).attr("checked");
		
		$.ajax({
			url: 'Controller/ProductoController.php?page=7&&iddetalle='+iddetalle+'&&estado='+estado+'&&valor'+valor,
			type: 'post',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
					
					alertify.success(data.msj);
					//$(".detalle-producto").load('doc_guardado.php?xdoc=2');
					setTimeout(function(){
					  //window.location.href = 'impresion.php?id='+data.idventa;
					 // $(".detalle-producto").load('detalle.php');
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


});
	$("#btn_addprod").off("click");	
	$("#btn_addprod").on("click", function(e) {
		var lote  = $("#lote").val();
		var fechavence = $("#fechavence").val();
		var fechaingreso = $("#fechaingreso").val();
		var documento = $("#documento").val();
		var idproducto = $("#idproducto").val();
		var cantidad = $("#cantidad").val();
		var usuario = $("#usuario").val();
		var serie_fac = $("#serie_fac").val();
		var id_proveedor = $("#id_proveedor").val();
		var id_bodega = $("#id_bodega").val();
		var preciounitario = $("#preciounitario").val();
		
		$.ajax({
			url: 'Controller/ProductoController.php?page=8&&lote='+lote+'&&fechavence='+fechavence+'&&fechaingreso='+fechaingreso+'&&documento='+documento+'&&idproducto='+idproducto+'&&cantidad='+cantidad+'&&usuario='+usuario+'&&serie_fac='+serie_fac+'&&id_proveedor='+id_proveedor+'&&id_bodega='+id_bodega+'&&preciounitario='+preciounitario,
			data: {'lote':lote, 'fechavence':fechavence, 'fechaingreso':fechaingreso, 'documento':documento, 'idproducto':idproducto, 'cantidad':cantidad, 'usuario':usuario, 'serie_fac':serie_fac, 'id_proveedor':id_proveedor, 'id_bodega':id_bodega, 'preciounitario':preciounitario},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if(data.success==true){
 						alertify.success(data.msj);
						//$("#infocliente").load(data.msj);
				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error('error ajax' + error);
				
			}
		});	
				
	});
		$("#btn_addprod_update").off("click");	
	$("#btn_addprod_update").on("click", function(e) {
		var idupdate  = $("#idupdate").val();
		var lote  = $("#lote").val();
		var fechavence = $("#fechavence").val();
		var fechaingreso = $("#fechaingreso").val();
		var documento = $("#documento").val();
		var idproducto = $("#idproducto").val();
		var cantidad = $("#cantidad").val();
		var usuario = $("#usuario").val();
		var serie_fac = $("#serie_fac").val();
		var id_proveedor = $("#id_proveedor").val();
		var id_bodega = $("#id_bodega").val();
		var preciounitario = $("#preciounitario").val();
		var cadena =  'Controller/ProductoController.php?page=9&&idupdate='+idupdate+'&&lote='+lote+'&&fechavence='+fechavence+'&&fechaingreso='+fechaingreso+'&&documento='+documento+'&&idproducto='+idproducto+'&&cantidad='+cantidad+'&&usuario='+usuario+'&&serie_fac='+serie_fac+'&&id_proveedor='+id_proveedor+'&&id_bodega='+id_bodega+'&&preciounitario='+preciounitario;

		$.ajax({
			url: 'Controller/ProductoController.php?page=9&&idupdate='+idupdate+'&&lote='+lote+'&&fechavence='+fechavence+'&&fechaingreso='+fechaingreso+'&&documento='+documento+'&&idproducto='+idproducto+'&&cantidad='+cantidad+'&&usuario='+usuario+'&&serie_fac='+serie_fac+'&&id_proveedor='+id_proveedor+'&&id_bodega='+id_bodega+'&&preciounitario='+preciounitario,
			data: {'idupdate':idupdate, 'lote':lote, 'fechavence':fechavence, 'fechaingreso':fechaingreso, 'documento':documento, 'idproducto':idproducto, 'cantidad':cantidad, 'usuario':usuario, 'serie_fac':serie_fac, 'id_proveedor':id_proveedor, 'id_bodega':id_bodega, 'preciounitario':preciounitario},
			type: 'POST',
			dataType: 'json',
			success: function(data) {

				if(data.success==true){
 						alertify.success(data.msj);
 						alertify.success(cadena);
 						console.log(cadena);
						//$("#infocliente").load(data.msj);

				}else{
					alertify.error(data.msj);
				}
			},
			error: function(jqXHR, textStatus, error) {
				alertify.error('error ajax' + error);
				
			}
		});	
				
	});