    <html>
        <head>
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../bootstrap/jquery/jquery-ui/jquery-ui.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
            <script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
            <script src="../bootstrap/jquery/jquery-ui/jquery-ui.js"></script>

            <script>
         $(document).ready(function(){  
                $.ajax({ 
                    type: "POST", 
                    url: "../PHP/CargaClientes.php", 
                    data: array
             }).done(function(respuesta){
                 if(respuesta.codigo > 0){
                     console.log(JSON.stringify(respuesta));
                 }
             })
                   
         
         });
            </script>
        </head>
        <style>
            input{
                float:left;
                display:block;
            }
        </style>
        <body>
        <div class="col-xs-10 col-md-10 col-xl-10 ">
        <form class="form-horizontal" id="Form_Cliente">
    <fieldset>

    <!-- Form Name -->
    <legend>Clientes</legend>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Codigo:</label>  
    <div class="col-md-4">
    <input id="txtCliente" name="textinput" type="text" placeholder="Codigo" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Razón Social:</label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Razon" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Contacto:</label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Contact Name" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput"></label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Contact Name 2" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Nit:</label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="NIT" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Teléfono:</label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Phone" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="textinput">Dirección Fiscal:</label>  
    <div class="col-md-4">
    <input id="textinput" name="textinput" type="text" placeholder="Dirección" class="form-control input-md" required="">
        
    </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="selectbasic">Clasificación:</label>
    <div class="col-md-4">
        <select id="selectbasic" name="selectbasic" class="form-control">
        <option value="1">Clasificación A</option>
        <option value="2">Promotores</option>
        <option value="">Clasificación C</option>
        <option value="">Clasificación D</option>
        <option value="">Clasificación E</option>
        <option value="">Mayorista</option>
        <option value="">Ruta</option>
        <option value="">Farmacia Interna</option>
        <option value="">Publico</option>
        </select>
    </div>
    </div>

    <!-- Button -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton"></label>
    <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Registrar</button>
    </div>
    </div>

    </fieldset>
    </form>
        </div>
            

        </body>
    </html>
