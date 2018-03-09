<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="presentacion">Presentación</label>
  <div class="col-md-8">
    <select id="presentacion" name="presentacion" class="form-control">
      <option value="1">Presentacion 1</option>
      <option value="2">Presentacion 2</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Producto">Ingrese Nombre de producto</label>  
  <div class="col-md-8">
  <input id="Producto" name="Producto" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="proveedor">Seleccione Proveedor</label>
  <div class="col-md-8">
    <select id="proveedor" name="proveedor" class="form-control">
      <option value="1">Prov 1</option>
      <option value="2">Prov 2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Tipo_med">Venta</label>
  <div class="col-md-4">
    <select id="Tipo_med" name="Tipo_med" class="form-control">
      <option value="1">Etico</option>
      <option value="2">Popular</option>
      <option value="3">Leches</option>
      <option value="4">Genericos</option>
    </select>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Costo</span>
      <input id="Precio_costo" name="Precio_costo" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">A</span>
      <input id="precio_A" name="precio_A" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">B</span>
      <input id="precio_B" name="precio_B" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

  <div class="">
    <div class="input-group">
      <span class="input-group-addon">C</span>
      <input id="precio_c" name="precio_c" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>


  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">D</span>
      <input id="precio_e" name="precio_e" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">E</span>
      <input id="Precio_e" name="Precio_e" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">F</span>
      <input id="precio_f" name="precio_f" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="impuestos">IVA</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="impuestos-0">
      <input type="radio" name="impuestos" id="impuestos-0" value="0" checked="checked">
      Afecto
    </label>
    </div>
  <div class="radio">
    <label for="impuestos-1">
      <input type="radio" name="impuestos" id="impuestos-1" value="1">
      Excento
    </label>
    </div>
  </div>
</div>

</fieldset>
</form>
