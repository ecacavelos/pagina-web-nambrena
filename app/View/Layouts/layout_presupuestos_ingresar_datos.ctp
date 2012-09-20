<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
		
<!--		<link rel="stylesheet" type="text/css" href="css/xy_input.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
<!--        -->
<!--		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<!--        -->
<!--		<script type="text/javascript" src="js/jquery.validate.min.js"></script>-->
<!--        <script type="text/javascript" src="js/additional-methods.min.js"></script>-->
<!--        <script type="text/javascript" src="js/messages_es.js"></script>-->
<!--        -->
<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->
<!--        <script type="text/javascript" src="js/script-forms.js"></script>-->


		<?php echo $this->Html->css('xy_input'); ?>
		<?php echo $this->Html->css('global'); ?>
		<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
		
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
		<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min');?>
		
		<?php echo $this->Html->script('jquery.validate.min');?>
		<?php echo $this->Html->script('additional-methods.min');?>
		<?php echo $this->Html->script('messages_es');?>
		
		
		<?php echo $this->Html->script('script-subpages');?>
		<?php echo $this->Html->script('script-forms');?>
		<?php echo $this->Html->script('script_PDF_download.js'); ?>
		
		<?php // echo $this->Js->writeBuffer();?>
		
		<noscript>
            <style type="text/css">
                #content-lower-menu {
                    left: 0px;
                }
				#progressbar{
					display: none;
				}
            </style>
        </noscript>
    </head>
    <body>
        <!--Script para detectar la resoluc�n del usuario.-->
		<!--
		<script type="text/javascript">
			document.write(screen.width+'x'+screen.height+';');
		</script>
        -->
		<div id="progressbar">
			<!--<img src="images/cargando.png" width="410" height="100" alt="">-->
			<?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100"))?>
	    </div>
		<div id="wrap">
            <div id="content">
                <div id="main-logo">
					<!--<img src="images/index.logo.png" width="388" height="429" alt="">-->
					<?php echo $this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "388", 'height' => "429"))?>
					<?php echo $this->Html->link($this->Html->image("volver.png", array("alt" => "Volver al Inicio")), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'back-to-home', 'escape' => false)); ?>
                </div>
                <div id="content-form2" class="form_gradiente">
					<div id="contact_form">
					<form id="MainForm" name="contact" method="post" action="">
						<fieldset  id="final_fields">
                            <p><label for="nombre">Nombre</label><input id="nombre" name="nombre" type="text" class="text" required/>
                            </p>
                            <p><label for="apellido">Apellido</label><input id="apellido" name="apellido" type="text" class="text" required/>
                            </p>
                            <p><label for="empresa">Empresa</label><input id="empresa" name="empresa" type="text" class="text" required/>
                            </p>
                            <p><label for="email">Email</label><input id="email" name="email" type="email" class="text" required/>
                            </p>
                            <p><label for="email_verificacion">Email de Verificacion</label><input id="email_verificacion" name="email_verificacion" type="email" class="text" required/>
                            </p>
                            <p><label for="direccion">Direccion</label><input id="direccion" name="direccion" type="text" class="text" />
                            </p>
                            <p><label for="departamento">Ciudad</label><input id="departamento" name="departamento" type="text" class="text" required/>
                            </p>                            
                            <p><label for="telefono">Telefono</label><input id="telefono" name="telefono" type="tel" class="text" required/>
                            </p>                         
                            <p><input type="submit" name="submit" class="boton gray" id="submit_btn" value="OK" />
                            </p>
                        </fieldset>
					</form>
					<div id="leyenda_enviando" >Enviando...</div>
				</div>
                <div id="content-info" class="form_gradiente">
                	<h3>Seleccionaste los siguientes opciones !</h3>
                <?php $datos =  $this->Session->read();
                	  
                		
                		if ($datos['Cartele'] != null){
	                		
                			echo "Producto: Cartel </br>";
                			if ($datos['Cartele']['tipo'] == "front_light"){
	                			echo "Tipo: Front light"."</br>";		                			
	                		}
	                		if ($datos['Cartele']['tipo'] == "back_light"){
	                			echo "Tipo: Back light"."</br>";		                			
	                		}
	                		if ($datos['Cartele']['tipo'] == "adhesivo"){
	                			echo "Tipo: Adhesivo"."</br>";		                			
	                		}	                		
	                		if ($datos['Cartele']['soporte'] == "sobre_pared"){
	                			echo "Soporte: Sobre pared"."</br>";
	                		}	                		
	                		if ($datos['Cartele']['soporte'] == "sobre_poste"){
	                			echo "Soporte: Sobre poste"."</br>";
	                		}
	                		if ($datos['Cartele']['soporte'] == "ya_poseo"){
	                			echo "Soporte: Ya tengo soporte"."</br>";
	                		}
							
	                		if($datos['Cartele']['luminosidad'] == 0)
	                			echo "Luminosidad: Sin Luz"."</br>";
	                		if($datos['Cartele']['luminosidad'] == 1)
	                			echo "Luminosidad: Con Luz"."</br>";
	                		if($datos['Cartele']['mantenimiento'] == 0)
	                			echo "Mantenimiento: Sin Mantenimiento"."</br>";
	                		if($datos['Cartele']['mantenimiento'] == 1)
	                			echo "Luminosidad: Con Mantenimiento"."</br>";
	                			
	                		if($datos['Cartele']['tipoEnvio'] == 'envio')
	                			echo "Instalaci&oacute;n: Te enviamos el cartel!"."</br>";	                			
	                		if($datos['Cartele']['tipoEnvio'] == 'colocado')
	                			echo "Instalaci&oacute;n: Te colocamos el cartel!"."</br>";	                		
	                		if($datos['Cartele']['tipoEnvio'] == 'pickup')
	                			echo "Instalaci&oacute;n: Lo pasas a buscar!"."</br>";
                		}
                		if ($datos['Corporeo'] != null){                			
                			echo "Producto: Corporeo </br>";
                			if($datos['Corporeo']['tipoEnvio'] == 'colocado')
	                			echo "Instalaci&oacute;n: Te colocamos el cartel!"."</br>";
	                		if($datos['Corporeo']['tipoEnvio'] == 'no-colocado')
	                			echo "Instalaci&oacute;n: Sin instalaci&oacute;n"."</br>";
                		}
                		if ($datos['Impresione'] != null){
                			
                			echo "Producto: Impresi&oacute;n </br>";
                			if($datos['Impresione']['tipo'] == 'Front light')
	                			echo "Tipo: Front light"."</br>";
                			if($datos['Impresione']['tipo'] == 'Back light')
	                			echo "Tipo: Back light"."</br>";
                			if($datos['Impresione']['tipo'] == 'Adhesivo')
	                			echo "Tipo: Adhesivo"."</br>";
                			if($datos['Impresione']['tipo'] == 'Microperforado')
	                			echo "Tipo: Microperforado"."</br>";
	                			
	                		if($datos['Impresione']['tipoEnvio'] == 'envio')
	                			echo "Instalaci&oacute;n: Te enviamos la impresi&oacute;n!"."</br>";
	                		if($datos['Impresione']['tipoEnvio'] == 'pickiup')
	                			echo "Instalaci&oacute;n: Lo pasas a buscar!"."</br>";	                			
	                		
                		}
                		if ($datos['Vinilo'] != null){                			
                			echo "Producto: Vinilo </br>";                			
                		}
                		
                		echo "Ancho:  ". $datos['ancho']." metros </br>";
                		echo "Alto:  ". $datos['alto']." metros </br>";
                		if ($datos['Cartele'] != null){
                			
                			echo "Altura desde el piso: "; 
                			
                			if ($datos['altura_piso'] == 0){                				
								echo "MENOR a " . $limite_altura . " metros<br>";
                			} else {
                				echo "MAYOR a " . $limite_altura . " metros<br>";
                			}
                			
                		}		
                		echo "</br>"
                ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>