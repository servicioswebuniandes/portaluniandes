<html>
  <head>
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.formtowizard.js"></script>
    <script src="js/custom-form.js"></script>

    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/styles.css">
    <link rel="stylesheet" href="/sites/all/themes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/normalize.css">
    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/fonts.css">
  </head>
  <body class="donate_form">

  <form method="post" class="container" action="/sites/all/modules/custom/form_select/services/procesar_datos.php">
      <header>
        <h3><?php print $_GET['titulo'] ?></h3>
      </header>

      <section class="step-form">
        <ul>
            <li class="step-number s1"><span class="active">1</span></li>
            <li class="step-number s2"><span>2</span></li>
            <li class="step-number s3"><span>3</span></li>
        </ul>
    </section>


    <form id="donateform" action="">

        <fieldset>
            <div class="form-group">
                <label for="nombres">Nombres :</label>
                <input class="form-control" type="text" name="nombreComprador" id="nombres_" placeholder="Nombres" required="" />
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos : </label>
                <input class="form-control" type="text" name="apellidoComprador" id="apellidos_" placeholder="Apellidos" required=""/>
            </div>

            <div class="form-group">
                <label for="correo">E-mail: </label>
                <input class="form-control" type="email" name="emailComprador" id="correo_" placeholder="Email" required=""/>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
                <label for="valor">Monto de la donación:</label>
                <input class="form-control" type="text" name="valor" id="valor" placeholder="Monto" required=""/>
            </div>

            <div class="form-group form-select">
                <label for="designacion">Iniciativa o causa</label>
                <select class="form-control" name="designacion" id="designacion" required="">
                    <option value="" disabled selected>Quiero apoyar a</option>
                    <option value="PI15@FASPRFECLT" >Liberando tiempo: Mujeres y Lavadoras</option>
                    <option value="PE20@SEQESGENUE" selected="selected">Quiero Estudiar Beca con Compromiso</option>
                    <option value="PE20@SEQESFDEDE" >Quiero Estudiar Beca con Compromiso Facultad de Derecho</option>
                    <option value="PE20@SEQESGENDE" >Quiero Estudiar Beca con Compromiso Deportes</option>
                    <option value="PE20@SEQESGENCE" >Beca Quiero Estudiar LiderAndes</option>
                    <option value="PE20@FAFOPGENFO" >FOPRE- Fondo de Programas Especiales</option>
                    <option value="PE20@SEDROFCSRO" >Fondo Dora Röthlisberger</option>
                    <option value="PE20@SEHYEGENHY" >Fondo Henri Yerly</option>
                    <option value="PP15@FEGWEFAHWE" >Fondo Gretel Wernher</option>
                    <option value="PE20@SECABFDECA" >Beca Ciro Angarita Barón</option>
                    <option value="PE20@SAPEGFECMA" >Beca Maestría en Economía - PEG 50 Años</option>
                    <option value="PE20@FEQESFINEG" >Quiero Estudiar Beca con Compromiso Ingenieros del 74</option>
                    <option value="PE20@SEQASDICBC" >Quiero Estudiar Beca con Compromiso Alberto Sarria</option>
                    <option value="PE20@SEQBBGENBC" >Quiero Estudiar Beca con Compromiso Beca por Becados</option>
                    <option value="AF13@FASPRFDEPP" > Proyecto Paiis</option>
                </select>
            </div>

            <div class="form-group form-select">
                <label for="don_forma_pago">Forma de pago:</label>
                <select class="form-control" name="forma_pago" id="don_forma_pago" required="">
                    <option value="" disabled selected>Forma de pago</option>
                    <option value="PLIN"  >Pago en Línea</option>
                    <option value="CONS"  >Consignación</option>
                    
                </select>
            </div>

            <div class="form-group form-select">
                <label for="recurrence">Recurrencia</label>
                <select class="form-control" name="recurrence" id="recurrence" required="">
                    <option value="" disabled selected>Recurrencia</option>
                    <option value="">Unico pago</option>
                </select>
            </div>

            <div class="form-group form-select">
                <label for="duration">Duración</label>
                <select class="form-control" name="duration" id="duration" required="">
                    <option value="" disabled selected>Duración</option>
                    <option value="PLIN">1 año</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group form-select">
                <label>Tipo de identificación</label>
                <select class="form-control" name="tipoDocumentoIdentificacion" id="tipoDocumentoIdentificacion" required="">
                    <option value="" disabled selected>Tipo de identificación</option>
                    <option value="1">Cédula de ciudadanía</option>
                    <option value="2">Nit</option>
                    <option value="3">Cédula de de extranjería</option>
                    <option value="4">Tarjeta de identidad</option>
                    <option value="5">Pasaporte</option>
                    <option value="6">Tarjeta Social Security</option>
                </select>
            </div>

            <div class="form-group">
                <label>Numero de identificación</label>
                <input class="form-control" type="number" name="documentoIdentificacion" id="documento" placeholder="Numero de identificación" />
            </div>

            <div class="form-group">
                <label>Nombres</label>
                <input class="form-control" type="text" name="nombreComprador" id="nombres" placeholder="Nombres" required=""/>
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input class="form-control" type="text" name="apellidoComprador" id="apellidos" placeholder="Apellidos" required=""/>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="emailComprador" id="correo" placeholder="Email" required=""/>
            </div>

            <div class="form-group form-select">
                <label>País</label>
                <select class="form-control" name="pais" id="don_country" required="">
                    <option value="" disabled selected>País</option>
                </select>
            </div>

            <div class="form-group form-select">
                <label>Departamento</label>
                <select class="form-control" name="estado" id="don_depto" required="">
                    <option value="" disabled selected>Departamento</option>
                </select>
            </div>

            <div class="form-group form-select">
                <label>Ciudad</label>
                <select class="form-control" name="ciudadCorrespondencia" id="don_city" required="">
                    <option value="" disabled selected>Ciudad</option>

                </select>
                <input class="form-control" type="text" name="ciudad" id="ciudadLiteral" value="BOGOTA D.C." required="">
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input class="form-control" type="text" name="direccionCorrespondencia" id="don_address" placeholder="Dirección" required=""/>
            </div>


            <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control" type="tel" name="telefono" id="don_phone" placeholder="Teléfono" required=""/>
            </div>

            <div class="form-group">
                <label>Celular</label>
                <input class="form-control" type="tel" name="telefonoMovil" id="don_mobie" placeholder="Celular" required=""/>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="don_accept_terms" id="don_accept_terms" required="">
                <label for="don_accept_terms" class="form-check-label">
                    <a href="#">Acepto las condiciones y terminos de uso</a>
                </label>
            </div>
        </fieldset>

        <p>
            <button id="SaveAccount" class="btn btn-primary submit">Realizar Donación</button>
        </p>
    </form>
</form>



  </body>
</html>