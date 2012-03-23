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
<!--        <img src="images/cargando.png" width="410" height="100" alt="">-->
		<?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100"))?>
        </div>
		<div id="wrap">
            <div id="content">
                <div id="main-logo">
<!--                    <img src="images/index.logo.png" width="388" height="429" alt="">-->
				<?php echo $this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "388", 'height' => "429"))?>
                </div>
                <div id="content-form2" class="form_gradiente">
<!--					<form id="MainForm">-->
					<?php echo $this->Form->create('Presupuesto', array('id' => 'MainForm' ,'action' => 'generate_pdf', 'inputDefaults' => array('div' => false, 'label' => false)));?>
						<fieldset id="final_fields">
                            <p><label for="nombre">Nombre</label>
<!--                            <input id="nombre" name="nombre" type="text" class="text" required/>-->
							<?php echo $this->Form->input('nombre', array('name' => 'nombre', 'class' => 'text', 'required' , 'id' => 'nombre'));?>
                            </p>     
                            <p><label for="apellido">Apellido</label>
<!--                            <input id="apellido" name="apellido" type="text" class="text" required/>-->
                            <?php echo $this->Form->input('apellido', array('name' => 'apellido', 'class' => 'text', 'required' , 'id' => 'apellido'));?>
                            </p>
                            <p><label for="empresa">Empresa</label>
<!--                            <input id="empresa" name="empresa" type="text" class="text" required/>-->
							<?php echo $this->Form->input('empresa', array('name' => 'empresa', 'class' => 'text', 'required' , 'id' => 'empresa'));?>
                            </p>
                            <p><label for="email">Email</label>
<!--                            <input id="email" name="email" type="email" class="text" required/>-->
							<?php echo $this->Form->input('email', array('name' => 'email', 'class' => 'text', 'required' , 'id' => 'email', 'type' => 'email'));?>
                            </p>
                            <p><label for="email_verificacion">Email de Verificacion</label>
<!--                            <input id="email_verificacion" name="email_verificacion" type="email" class="text" required/>-->
							<?php echo $this->Form->input('email_verificacion', array('name' => 'email_verificacion', 'class' => 'text', 'required' , 'id' => 'email_verificacion', 'type' => 'email'));?>
                            </p>
                            <p><label for="telefono">Telefono</label>
<!--                            <input id="telefono" name="telefono" type="tel" class="text" required/>-->
                            <?php echo $this->Form->input('telefono', array('name' => 'telefono', 'class' => 'text', 'required' , 'id' => 'telefono'));?>
                            </p>
                            <p><label for="departamento">Ubicacion</label>
<!--                            <input id="departamento" name="departamento" type="text" class="text" required/>-->
                            <?php echo $this->Form->input('departamento', array('name' => 'departamento', 'class' => 'text', 'required' , 'id' => 'departamento'));?>
                            </p>
                            <p><label for="direccion">Direccion</label>
<!--                            <input id="direccion" name="direccion" type="text" class="text" />-->
                            <?php echo $this->Form->input('direccion', array('name' => 'direccion', 'class' => 'text', 'id' => 'direccion'));?>
                            </p>
                            <p><label for="hora_trabajo">Hora de Trabajo (hh:mm)</label>
<!--                            <input id="hora_trabajo" name="hora_trabajo" type="time" class="text" required=/>-->
							<?php echo $this->Form->input('hora_trabajo', array('name' => 'hora_trabajo', 'required' , 'class' => 'text', 'id' => 'hora_trabajo' , 'type'=>"time"));?>
                            </p>
                            <p><button class="boton gray" id="form_ok" type="submit">OK</button>
                            </p>                         
                        </fieldset>
					</form>
                </div>
                <div id="content-info" class="form_gradiente">
                	<h3>Seleccionaste los siguientes opciones !</h3>
                <?php $carteles =  $this->Session->read('Cartele');
                		if ($carteles['tipo'] == "front_light"){
                			echo "Tipo: Front Light"."</br>";	
                			
                		}
                		if ($carteles['tipo'] == "back_light"){
                			echo "Tipo: Back Light"."</br>";	
                			
                		}
                		if ($carteles['tipo'] == "adhesivo"){
                			echo "Tipo: Adhesivo"."</br>";	
                			
                		}
                		
                		if ($carteles['soporte'] == "sobre_pared"){
                			echo "Soporte: Sobre pared"."</br>";
                		}
                		
                		if ($carteles['soporte'] == "sobre_poste"){
                			echo "Soporte: Sobre poste"."</br>";
                		}
                		if ($carteles['soporte'] == "ya_poseo"){
                			echo "Soporte: Ya tengo soporte"."</br>";
                		}
                		if($carteles['luminosidad'] == 0)
                			echo "Luminosidad: Sin Luz"."</br>";
                		if($carteles['luminosidad'] == 1)
                			echo "Luminosidad: Con Luz"."</br>";
                		if($carteles['mantenimiento'] == 0)
                			echo "Mantenimiento: Sin Mantenimiento"."</br>";
                		if($carteles['mantenimiento'] == 1)
                			echo "Luminosidad: Con Mantenimiento"."</br>";
                			
                		echo "</br>"
                ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>