            <form action="<?php echo $send; ?>" method="POST" class="form">
               <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" required="true" name="nombre" id="nombre" placeholder="Nombre">
               </div>
               <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" class="form-control" required="true" name="direccion" id="direccion" placeholder="Direccion">
               </div>
               <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="number" class="form-control" required="true" name="telefono" id="telefono" placeholder="Telefono">
               </div>
               <div class="form-group">
                  <label for="credito">Credito</label>
                  <input type="text" class="form-control" required="true" name="credito" id="credito" placeholder="Credito">
               </div>
               <div class="form-group">
                  <label for="dias_credito">Dias del Credito</label>
                  <input type="number" class="form-control" required="true" name="dias_credito" id="dias_credito" placeholder="Dias del credito">
               </div>
               <div class="form-group">
                  <label for="nit">Nit</label>
                  <input type="text" class="form-control" required="true" name="nit" id="nit" placeholder="Nit">
               </div>
               <div class="form-group">
                  <?php require_once('paises.html'); ?>
               </div>
               <div class="form-group">
                  <label for="nota">Nota</label>
                  <textarea class="form-control" name="nota" id="nota" placeholder="Nota"></textarea>
               </div>
               <div class="modal-footer">
                  <button type="submit" name="new" class="btn btn-success">Guardar</button>
               </div>
            </form>

