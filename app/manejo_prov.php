

<?php require_once('Model/proveedores.php'); ?>
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

<button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addproveedor">
  Agregar Proveedor
</button>
<table id="contenido" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Nit</th>
                  <th>Credito</th>
                  <th>Días de Credito</th>
                  <th>Pais</th>
                  <th>Nota</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                 <?php tabla($info); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Nit</th>
                  <th>Credito</th>
                  <th>Días de Credito</th>
                  <th>Pais</th>
                  <th>Nota</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                  </tr>
                </tfoot>
              </table>
<!-- Add -->
<div class="modal fade" id="addproveedor" tabindex="-1" role="dialog" aria-labelledby="addproveedorLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addproveedorLabel">Agregar Proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="nuevoprov">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- view -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#nuevoprov").load("nuevo_proveedor.php"); 
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