

<?php require_once('Model/inventario.php'); ?>
<style type="text/css">
  .activo {
     width: 1rem;
     height: 1rem;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
     background: #5cb85c;
}
 .noactivo {
     width: 1rem;
     height: 1rem;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
     background: red;
}
</style>

<button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addproducto">
  Agregar Producto
</button>
<table id="contenido" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Medida</th>
                  <th>Proveedor</th>
                  <th>Nota</th>
                  <th>Opcion</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                  <?php inventario($info);?>  
                </tbody>
                <tfoot>
                <tr>
                  <th>N</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Medida</th>
                  <th>Proveedor</th>
                  <th>Nota</th>
                  <th>Opcion</th>
                  
                  
                  </tr>
                </tfoot>
              </table>


<!-- Add -->
<div class="modal fade" id="addproducto" tabindex="-1" role="dialog" aria-labelledby="addproductoLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addproductoLabel">Agregar Proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="nuevoprod">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- view -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#nuevoprod").load("nuevo_prod.php"); 
})
 </script>

<script type="text/javascript">
$(document).ready(function() {
  $('#contenido').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>