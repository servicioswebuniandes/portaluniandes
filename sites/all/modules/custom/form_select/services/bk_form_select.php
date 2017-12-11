<html>
<head>
    <script src="/sites/all/modules/custom/form_select/js/jquery.min.js"></script>
    <script src="/sites/all/modules/custom/form_select/js/scripts.js"></script>
    
    <script src="/sites/all/modules/custom/form_select/js/jquery.validate.js"></script>
    <script src="/sites/all/modules/custom/form_select/js/jquery.formtowizard.js"></script>
    <script src="/sites/all/modules/custom/form_select/js/custom-form.js"></script>

    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/styles.css">
    <link rel="stylesheet" href="/sites/all/themes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/normalize.css">
    <link rel="stylesheet" href="/sites/all/themes/donaciones/css/fonts.css">
</head>
<body class="donate_form">

  <form method="post" id="donateform" action="/sites/all/modules/custom/form_select/services/procesar_datos.php">
      <header>
        <h3><?php print $_GET['titulo'] ?></h3>
    </header>

    <section class="step-form">
        <ul class="step_form">
            <li class="step-number s1 active">
                <span class="step-next">1</span>
                <button href="#" id="step1Prev" class="step-prev prev">1</button>
                <p class="info-step-txt">¿Quién eres?</p>
            </li>
            <li class="step-number s2">
                <span class="step-next-2">2</span>
                <button href="#" id="step2Prev" class="step-prev prev">2</button>
                <p class="info-step-txt">Tu donación</p>
            </li>
            <li class="step-number s3">
                <span class="step-next-3">3</span>
                <p class="info-step-txt">Cuéntanos de ti</p>
            </li>
        </ul>
    </section>


    <form id="donateform" action="">

        <fieldset>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input class="form-control" type="text" name="nombreComprador" id="nombres_" placeholder="Nombres" required="" tabindex="1"/>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos </label>
                <input class="form-control" type="text" name="apellidoComprador" id="apellidos_" placeholder="Apellidos" required="" tabindex="2"/>
            </div>

            <div class="form-group">
                <label for="correo">E-mail</label>
                <input class="form-control" type="email" name="emailComprador" id="correo_" placeholder="Email" required="" tabindex="3"/>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
                <label for="valor">Monto de la donación</label>
                <input class="form-control value"  type="text" name="valor" id="valor" placeholder="Monto en pesos colombianos" tabindex="4"/>
                <input class="form-control hidden" type="number" name="val_value" id="val_value" placeholder="Monto" required=""/>
            </div>
            <?php if (isset($_GET['codigo'])){
             print '<select name="designacion" id="designacion" required="" hidden>';
             print '<option value="'.$_GET['codigo'].'" > Código causa</option>';
             print '</select>';   
         }else{
            ?>

            <div class="form-group form-select">
                <label for="designacion">Iniciativa o causa</label>
                <select class="form-control" name="designacion" id="designacion" required="" tabindex="5">
                    <option value="" hidden disabled selected>Quiero apoyar a</option>
                    <option value="PI15@FASPRFECLT" >Liberando tiempo: Mujeres y Lavadoras</option>
                    <option value="PE20@SEQESGENUE" selected="selected">Quiero Estudiar </option>
                    <option value="PE20@SEQESFDEDE" >Quiero Estudiar Facultad de Derecho</option>
                    <option value="PE20@SEQESGENDE" >Quiero Estudiar Deportes</option>
                    <option value="PE20@SEQESGENCE" >Beca Quiero Estudiar LiderAndes</option>
                    <option value="PE20@FAFOPGENFO" >FOPRE- Fondo de Programas Especiales</option>
                    <option value="PE20@SEDROFCSRO" >Fondo Dora Röthlisberger</option>
                    <option value="PE20@SEHYEGENHY" >Fondo Henri Yerly</option>
                    <option value="PP15@FEGWEFAHWE" >Fondo Gretel Wernher</option>
                    <option value="PE20@SECABFDECA" >Beca Ciro Angarita Barón</option>
                    <option value="PE20@SAPEGFECMA" >Beca Maestría en Economía - PEG 50 Años</option>
                    <option value="PE20@FEQESFINEG" >Quiero Estudiar Ingenieros del 74</option>
                    <option value="PE20@SEQASDICBC" >Quiero Estudiar Alberto Sarria</option>
                    <option value="PE20@SEQBBGENBC" >Quiero Estudiar Beca por Becados</option>
                    <option value="AF13@FASPRFDEPP" > Proyecto Paiis</option>
                </select>
            </div>
            <?php 
        }
        ?>

        <div class="form-group form-select">
            <label for="don_forma_pago">Forma de pago:</label>
            <select class="form-control" name="forma_pago" id="don_forma_pago" required="" tabindex="6">
                <option value="" hidden disabled selected>Forma de pago</option>
                <option value="PLIN"  >Pago en Línea</option>
                <option value="CONS"  >Consignación</option>

            </select>
        </div>
        <?php 
        if($_GET['rec']==1){
            ?>
            <div class="form-group form-select">
                <label for="recurrence">Recurrencia</label>
                <select class="form-control" name="frecuencia" id="recurrence" required="" style="display: none;" tabindex="7">
                    <option value="" hidden disabled selected>Recurrencia</option>
                    <option value="U">Unico pago</option>
                    <option value="M">Mensual</option>
                </select>
            </div>

            <div class="form-group form-select">
                <label for="duration">Duración</label>
                <select class="form-control" name="duracionM" id="duration" required=""  style="display: none;" tabindex="8">
                    <option value="" disabled selected>Duración</option>
                    <option value="1">Un año</option>
                </select>
            </div>
            <?php 
        }else{
            print "<input type='hidden' name='frecuencia' id='recurrence' value='U' >";
            print "<input type='hidden' name='duracionM'  id='duracionM' value='null' >";
        }
        ?>
    </fieldset>

    <fieldset>
        <div class="form-group form-select">
            <label>Tipo de identificación</label>
            <select class="form-control" name="tipoDocumentoIdentificacion" id="tipoDocumentoIdentificacion" required="" tabindex="9">
                <option value="" hidden disabled selected>Tipo de identificación</option>
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
            <input class="form-control" type="text" name="documentoIdentificacion" id="documento" placeholder="Numero de identificación" required="" tabindex="10"/>
        </div>

        <div class="form-group">
            <label>Nombres</label>
            <input class="form-control" type="text" name="nombreComprador" id="nombres" placeholder="Nombres" required="" tabindex="11"/>
        </div>

        <div class="form-group">
            <label>Apellidos</label>
            <input class="form-control" type="text" name="apellidoComprador" id="apellidos" placeholder="Apellidos" required="" tabindex="12"/>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="emailComprador" id="correo" placeholder="Email" required="" tabindex="13"/>
        </div>

        <div class="form-group form-select">
            <label>País</label>
            <select class="form-control" name="pais" id="don_country" required="" tabindex="14">
                <option value="" disabled selected>País</option>
            </select>
        </div>

        <div class="form-group form-select">
            <label>Departamento</label>
            <select class="form-control" name="estado" id="don_depto" required="" tabindex="15">
                <option value="" hidden disabled selected>Departamento</option>
            </select>
        </div>

        <div class="form-group form-select">
            <label>Ciudad</label>
            <select class="form-control" name="ciudadCorrespondencia" id="don_city" required="" tabindex="16">
                <option value="" hidden disabled selected>Ciudad</option>

            </select>
            <input class="form-control" type="text" name="ciudad" id="ciudadLiteral" value="BOGOTA D.C." required="" tabindex="17">
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input class="form-control" type="text" name="direccionCorrespondencia" id="don_address" placeholder="Dirección" required="" tabindex="18"/>
        </div>


        <div class="form-group">
            <label>Teléfono</label>
            <input class="form-control" type="number" name="telefono" id="don_phone" placeholder="Teléfono" required="" tabindex="19"/>
        </div>

        <div class="form-group">
            <label>Celular</label>
            <input class="form-control" type="number" name="telefonoMovil" id="don_mobie" placeholder="Celular" required="" tabindex="20"/>
        </div>

        <div class="form-group">
            <label for="comments">Comentarios</label>
            <textarea class="form-control" name="comentarios" id="don_comments" rows="1" tabindex="21" placeholder="Escribe aquí tus comentarios"></textarea>
        </div>


        <section class="check-form">
            <div class="form-check">
                <div class="item-form-check">
                    <input type="checkbox" class="form-check-input" name="don_accept_terms" id="don_accept_terms" required="" tabindex="22">
                    <label for="don_accept_terms" class="form-check-label">
                        <a href="/donaciones/terminos-y-condiciones/" target="_blank">Acepto las condiciones y terminos de uso</a>
                    </label>
                </div>
            </div>

            <div class="form-check">
                <div class="item-form-check">
                    <input type="checkbox" class="form-check-input" name="ticket" id="ticket" checked>
                    <label for="ticket" class="form-check-label">Requiero certificado de donaciones</label>
                </div>
            </div>
        </section>    </fieldset>

        <section class="btn-block btn-step-final">
            <button  id ="final-btn" class="btn-default btn-border-green">Realizar Donación</button>
        </section>
    </form>
</body>
</html>