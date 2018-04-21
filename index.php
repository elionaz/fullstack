<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica</title>
    <!-- hojas de estilo usadas  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div></div><br>
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
        <form class="form-horizontal" action="php/insertar_datos.php" method="post"> <!-- Formulario para la recoleccion de datos -->
        <fieldset>

            <legend>Formulario</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nombre(s)</label>  
                <div class="col-md-8">
                    <input id="nombre_user" name="nombre_user" type="text" minlength="2" placeholder="Ingrese su nombre" class="form-control input-md" required autofocus>  
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Apellido Paterno</label>  
                <div class="col-md-8">
                    <input id="ap_user" name="ap_user" type="text" minlength="2" placeholder="Ingrese su apellido paterno" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Apellido Materno</label>  
                <div class="col-md-8">
                    <input id="am_user" name="am_user" type="text" minlength="2" placeholder="Ingrese su apellido materno" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Fecha de Nacimiento</label>  
                <div class="col-md-8">
                    <input id="nac_user" name="nac_user" type="date" class="form-control input-md" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Lugar de Nacimiento</label>
                <div class="col-md-8">
                    <select id="lnac_user" name="lnac_user" class="form-control" required>
                    <?php include("php/estados"); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Sexo</label>  
                <div class="col-md-8">
                    <select id="sexo_user" name="sexo_user" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <option value="H">Hombre</option>
                        <option value="M">Mujer</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Código Postal</label>  
                <div class="col-md-8">
                    <input id="cp_user" name="cp_user" type="number" minlength="5" placeholder="Ingrese el CP de su domicilio" class="form-control input-md" required>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">RFC</label>  
                <div class="col-md-8">
                    <input id="rfc_user" name="rfc_user" type="text" placeholder="" class="form-control input-md" required readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">CURP</label>  
                <div class="col-md-8">
                    <input id="curp_user" name="curp_user" type="text" placeholder="" class="form-control input-md" required readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Ciudad</label>  
                <div class="col-md-8">
                    <input id="ciudad_user" name="ciudad_user" type="text" class="form-control input-md" required readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Municipio</label>  
                <div class="col-md-8">
                    <input id="municipio_user" name="municipio_user" type="text" class="form-control input-md" required readonly> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Colonia</label>
                <div class="col-md-8">
                    <select id="colonia_user" name="colonia_user" class="form-control">
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-6">
                    <button id="guardar_form" name="guardar_form" class="btn btn-primary">Guardar</button>
                </div>
                <div class="col-md-2">
                    <a href="reporte.php"><input type="button" value="Exportar" class="btn btn-warning"></a>
                </div>
            </div>

            </fieldset>
            </form>
        </div>
    </div>

    <!-- librerias y funciones js usadas  -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/datos.js"></script>
    <script src="js/calcularCurp.js"></script>
</body>
</html>