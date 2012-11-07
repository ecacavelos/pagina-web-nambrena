<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex" />
	<title>Nambrena Industria Publicitaria</title>
	<!--<link rel="stylesheet" type="text/css" href="css/xy_input.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="global.css" />-->
	<!--<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
	<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery.validate.min.js"></script>-->
	<!--<script type="text/javascript" src="js/additional-methods.min.js"></script>-->
	<!--<script type="text/javascript" src="js/messages_es.js"></script>-->
	<!--<script type="text/javascript" src="js/script-subpages.js"></script>-->
	<!--<script type="text/javascript" src="js/script-forms.js"></script>-->
	<?php echo $this->Html->css('xy_input'); ?>
	<?php echo $this->Html->css('global'); ?>
	<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>	
	<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min'); ?>
	<?php echo $this->Html->script('jquery.validate.min'); ?>
	<?php echo $this->Html->script('additional-methods.min'); ?>
	<?php echo $this->Html->script('messages_es'); ?>	
	<?php echo $this->Html->script('jquery-spin'); ?>
	<?php echo $this->Html->script('script-subpages'); ?>
	<?php echo $this->Html->script('script-forms'); ?>
	<?php echo $this->Html->meta('icon'); ?>
	<noscript>
		<style type="text/css">
			#content-lower-menu {
				left: 0px;
			}
			#progressbar {
				display: none;
			}
		</style>
	</noscript>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#ancho').spin({
				max: 99,
				min: 1,
				<?php
					echo "imageBasePath: '".substr(str_replace("\\", "/", $this->webroot), 0)."img/spin/"."'";
				?>
			});
			$('#alto').spin({
				max: 99,
				min: 1,
				<?php
					echo "imageBasePath: '".substr(str_replace("\\", "/", $this->webroot), 0)."img/spin/"."'";
				?>
			});
		});
	</script>
</head>
<body>	
	<!--Script para detectar la resolucion del usuario.-->
	<!--<script type="text/javascript">document.write(screen.width+'x'+screen.height+';');</script>-->
	<!--<div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div>-->
	<div id="progressbar">
		<!--<img src="images/cargando.png" width="410" height="100" alt="">-->
		<?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width' => "410", 'height' => "100")); ?>
	</div>
	<div id="wrap">
		<div id="content">
			<div id="logo">
				<!--<img src="images/logo.png" width="304" height="322" alt="">-->
				<?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width' => "304", 'height' => "322")), '/', array('target' => '_self', 'escape' => false, 'class' => "transition-back")); ?>
				<?php
				//print_r($array_datos['Cartele']);
				if ($array_datos['Cartele']['tipo'] == 'front_light') {
					if ($array_datos['Cartele']['soporte'] == 'sobre_pared') {
						echo $this->Html->link($this->Html->image("back-arrow.png", array("alt" => "Volver", 'height' => '120px', 'width' => '120px', 'id' => 'back-arrow')), array('controller' => 'carteles', 'action' => 'front_light', 'sobre_pared'), array('escape' => false, 'class' => 'transition-back', 'title' => "Volver", 'id' => "back-arrow-link"));
					}
					if ($array_datos['Cartele']['soporte'] == 'sobre_poste') {
						echo $this->Html->link($this->Html->image("back-arrow.png", array("alt" => "Volver", 'height' => '120px', 'width' => '120px', 'id' => 'back-arrow')), array('controller' => 'carteles', 'action' => 'front_light', 'sobre_poste'), array('escape' => false, 'class' => 'transition-back', 'title' => "Volver", 'id' => "back-arrow-link"));
					}
					if ($array_datos['Cartele']['soporte'] == 'ya_poseo') {
						echo $this->Html->link($this->Html->image("back-arrow.png", array("alt" => "Volver", 'height' => '120px', 'width' => '120px', 'id' => 'back-arrow')), array('controller' => 'carteles', 'action' => 'front_light', 'ya_poseo'), array('escape' => false, 'class' => 'transition-back', 'title' => "Volver", 'id' => "back-arrow-link"));
					}
				}
				?>
			</div>
			<div id="dimensiones-image-carteles">
				<?php echo $this->Form->create('Cartele', array('id' => 'MainForm0', 'name' => 'opa', 'action' => 'ficha', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
				<fieldset id="xy_fields">
					<div id="ancho3_container">
						<?php echo $this->Form->input('ancho', array('name' => 'ancho', 'type' => 'number', 'label' => false, 'id' => 'ancho', 'value' => '1', 'min' => '1', 'max' => '99')); ?>
					</div>
					<?php echo $this->Html->image('carteles.dimension.png', array('alt' => "NAMBRE!", 'id' => 'carteles-ancho-alto-image')); ?>
					<div id="alto3_container">
						<?php echo $this->Form->input('alto', array('name' => 'alto', 'type' => 'number', 'label' => false, 'id' => 'alto', 'value' => '1', 'min' => '1', 'max' => '99')); ?>
					</div>
					<p><?php echo $this->Form->input('altura_piso', array('name' => 'altura_piso', 'type' => 'checkbox', 'label' => 'Altura mayor a 7 metros?', 'id' => 'altopiso3')); ?></p>
					<br />
					<button class="boton gray" id="xy_ok2" type="button" onclick="show_alert()">
						OK
					</button>
				</fieldset>
			</div>
			<div id="content-lower-menu2">
				<!--<input type="image" name="colocado" class="colocado" id="colocado" src="images/transporte.colocado.png" width="598" height="565" alt="">-->
				<!--<input type="image" name="no-colocado" class="no-colocado" id="no-colocado" src="images/transporte.colocado.no.png" width="598" height="565" alt="">-->
				<!--<input type="image" name="pickup" class="pickup" id="pickup" src="images/transporte.pickup.png" width="596" height="565" alt="">-->
				<!--<input type="image" name="envio" class="envio" id="envio" src="images/transporte.envio.png" width="598" height="565" alt="">-->
				<?php
					$pathColocado = $this->webroot;
					$pathColocado = $pathColocado . 'img/transporte.colocado.png';
					echo $this->Form->input('transporte.colocado.png', array('type' => 'image', 'name' => 'colocado', 'class' => 'colocado', 'id' => 'colocado', 'src' => $pathColocado, 'width' => '598', 'height' => '565'));
					$pathPickup = $this->webroot;
					$pathPickup = $pathPickup . 'img/transporte.pickup.png';
					echo $this->Form->input('transporte.pickup.png', array('type' => 'image', 'name' => 'pickup', 'class' => 'pickup', 'id' => 'pickup', 'src' => $pathPickup, 'width' => '598', 'height' => '565'));
					$pathEnvio = $this->webroot;
					$pathEnvio = $pathEnvio . 'img/transporte.envio.png';
					echo $this->Form->input('transporte.envio.png', array('type' => 'image', 'name' => 'envio', 'class' => 'envio', 'id' => 'envio', 'src' => $pathEnvio, 'width' => '598', 'height' => '565'));
					echo $this->Form->end();
				?>
			</div>
			<div id="content-lema">
				<!--<img src="transporte.lema.png" width="1020" height="105" alt="">-->
				<?php echo $this->Html->image('carteles.dimension_lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width' => "1020", 'height' => "105")); ?>
			</div>
		</div>
	</div>
</body>
</html>
