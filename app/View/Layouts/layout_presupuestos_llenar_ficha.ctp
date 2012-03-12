<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
<!--        <link rel="stylesheet" type="text/css" href="final_form.css" />-->
		<?php echo $this->Html->css('final_form'); ?>


<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
		<?php echo $this->Html->css('global'); ?>
		
<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
	
<!--        <script type="text/javascript" src="js/script-subpages.js"></script>-->
		<?php echo $this->Html->script('script-subpages');?>
		
		<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->
		<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min.js');?>
		
		<noscript>
            <style type="text/css">
                #content-lower-menu {
                    left: 0px;
                }
            </style>
        </noscript>
    </head>
    <body>
        <!--Script para detectar la resolucón del usuario.-->
		<!--
        <script type="text/javascript">
			document.write(screen.width+'x'+screen.height);
		</script>
        -->
        <!--        <div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div><div id="wrap">-->
      <div id="progressbar"><?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")) ;?></div>
        <div id="wrap">
            <div id="content">
                <div id="main-logo">
                    <img src="images/index.logo.png" width="388" height="429" alt="">
                </div>
              <div id="content-form">
					<p>Prueba de Input</p>
<!--                    <form>-->
<!--                    	<table id="content_tabla">-->
<!--                        <tr>-->
<!--                    	<td>Nombre:</td><td><input type="text" name="nombre" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Apellido:</td><td><input type="text" name="apellido" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Empresa:</td><td><input type="text" name="empresa" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Email:</td><td><input type="text" name="email" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Email de Verificación:</td><td><input type="text" name="email_verificacion" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Teléfono:</td><td><input type="text" name="telefono" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Ubicación (Departamento):</td><td><input type="text" name="departamento" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Dirección:</td><td><input type="text" name="direccion" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                        <td>Hora de Trabajo:</td><td><input type="text" name="hora_trabajo" /></td>-->
<!--                        </tr>-->
<!--                        </table>-->
<!--                    </form>-->

				<?php
					echo $this->Form->create('Presupuestos', array('action' => 'generate_pdf'));
					echo $this->Form->input('Nombre*:');
					echo $this->Form->input('Apellido*:');
					echo $this->Form->input('Empresa*:');
					echo $this->Form->input('Email*:');
					echo $this->Form->input('Verificacion de email*:');
					echo $this->Form->input('Telefono*:');
					echo $this->Form->input('Departamento:');
					echo $this->Form->input('Direccion:');
					echo $this->Form->input('Horario:');
					echo $this->Form->end('Generar presupuesto');
				?>

                </div>
                 <div id="content-form2">
					<p>Datos seleccionados</p>

				<?php

				$cartel_array = array ("Cartele" => $this->Session->read('Cartele'));
				echo "Tipo: {$cartel_array['Cartele']['tipo']} \n";
				echo "<br \ >";
				echo "Soporte: {$cartel_array['Cartele']['soporte']} \n";
				echo "<br \ >";
				if ($cartel_array['Cartele']['luminosidad'] == 1){
					
					echo "Luz: Si";
					echo "<br \ >";
				}
				if ($cartel_array['Cartele']['luminosidad'] == 0){
					
					echo "Luz: No";
					echo "<br \ >";
				}
				if ($cartel_array['Cartele']['mantenimiento'] == 1){
					
					echo "Mantenimiento: Si";
					echo "<br \ >";
				}
				if ($cartel_array['Cartele']['mantenimiento'] == 0){
					
					echo "Mantenimiento: No";
					echo "<br \ >";
				}
				
				echo "Ancho: {$cartel_array['Cartele']['ancho']} \n";
				echo "<br \ >";
				echo "Largo: {$cartel_array['Cartele']['largo']} \n";
				echo "<br \ >";
				
				//print_r($cartel_array);
				
				?>

                </div>
                
               
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>