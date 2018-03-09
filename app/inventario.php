

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
                  <th>N</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Medida</th>
                  <th>Proveedor</th>
                  <th>Nota</th>
                  <th>Opcion</th>
                  <th>Código Barras</th>
                  
                </tr>
                </thead>
                <tbody>
                 <!-- <?php tabla($info); ?>  -->
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
                  <th>Código Barras</th>
                  
                  </tr>
                </tfoot>
              </table>

<script type="text/javascript">
$(document).ready(function() {
  $('#contenido').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>