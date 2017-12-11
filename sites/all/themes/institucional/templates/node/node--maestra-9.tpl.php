<?php

?>
<div class="contenedor-principal container-fluid">

    <div class="container-fluid miga-de-pan">
        <?php
        if (!empty($GLOBALS["breadcrumb"])){
            $breadcrumb = $GLOBALS["breadcrumb"];
            print $breadcrumb;
        }
        ?>
    </div>

    <div class="container-fluid info-contacto-superior">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="title-bloques"> <h1><span></span><?php print $node->title ?></h1></div>
                    <div class='info-contacto1'>
                        <?php
                        if (!empty($node->field_texto_su_iz_m9)){
                            print $node->field_texto_su_iz_m9["und"][0]["value"];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7">
                    <?php
                    if (!empty($node->field_mapa_m9)){
                        print $node->field_mapa_m9["und"][0]["value"];
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid info-contacto-inferior">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class='info-contacto2'>
                        <?php
                        if (!empty($node->field_texto_inf_iz_m9)){
                            print $node->field_texto_inf_iz_m9["und"][0]["value"];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class='info-contacto3'>
                        <?php
                        if (!empty($node->field_texto_inf_cen_m9)){
                            print $node->field_texto_inf_cen_m9["und"][0]["value"];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class='info-contacto4'>
                        <?php
                        if (!empty($node->field_texto_inf_der_m9)){
                            print $node->field_texto_inf_der_m9["und"][0]["value"];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
