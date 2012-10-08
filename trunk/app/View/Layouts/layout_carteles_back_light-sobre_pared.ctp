<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex" />
	<title>Nambrena Industria Publicitaria</title>
	<!--<link rel="stylesheet" type="text/css" href="css/carteles_backlight_caras.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="global.css" />-->
	<!--<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
	<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--<script type="text/javascript" src="js/script-subpages.js"></script>-->
	<?php echo $this->Html->css('carteles_backlight_caras'); ?>
	<?php echo $this->Html->css('global'); ?>
	<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
	<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min'); ?>
	<?php echo $this->Html->script('script-subpages'); ?>
	<?php echo $this->Html->meta('icon');?>
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
	<!--<div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div><div id="wrap">-->
	<div id="progressbar"><?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")); ?></div>
	<div id="wrap">
		<div id="content">
			<div id="logo">
				<!--<a href="index.html" class="transition-back"><img src="images/logo.png" width="304" height="322" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'width'=> "304", 'height' => "322")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back")
				);
				?>
			</div>
			<div id="content-upper-left">
				<!--<a href="carteles.html" class="transition-back"><img src="images/header_small.carteles.png" width="417" height="201" alt=""></a>-->
				<!--<a href="carteles_backlight.html" class="transition-back"><img src="images/header_small.backlight.png" width="442" height="201" alt=""></a>-->
				<!--<img src="images/header_small.sobrepared.png" width="460" height="201" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('header_small.carteles.png', array('alt' => "NAMBRE!", 'width'=> "417", 'height' => "201")),
					array('controller' => 'carteles', 'action' => "index"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back")
				);
				?>
				<?php echo $this->Html->link(
					$this->Html->image('header_small.backlight.png', array('alt' => "NAMBRE!", 'width'=> "422", 'height' => "201")),
					array('controller' => 'carteles', 'action' => "back_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back")
				);
				?>
				<?php echo $this->Html->image('header_small.sobrepared.png', array('alt' => "NAMBRE!", 'width'=> "460", 'height' => "201")); ?>
				<?php echo $this->Html->link($this->Html->image("back-arrow.png", array("alt" => "Volver", 'height' => '120px', 'width' => '120px', 'id' => 'back-arrow')), array('controller' => 'carteles', 'action' => "back_light"), array('escape' => false, 'class' => 'transition-back', 'title' => "Volver")); ?>
			</div>
			<div id="content-lower-menu">
				<!--<img class="unacara" src="images/carteles_backlight_faz.unacara.png" width="589" height="478" alt="">-->								
				<?php echo $this->Html->link(
					$this->Html->image('carteles_backlight_faz.unacara.png', array( 'class' => "unacara" , 'alt' => "NAMBRE!", 'width'=> "589", 'height' => "478")),
					array('controller' => 'carteles', 'action' => "back_light" ,'sobre_pared', 'una_cara'),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);
				?>
				<!--<img class="separador_medio" src="images/separador.png"  width="39" height="351" alt="">-->
				<?php echo $this->Html->image('separador.png', array('class' => "separador_medio" , 'alt' => "NAMBRE!", 'width'=> "39", 'height' => "351")); ?>
				<!--<img class="doscara" src="images/carteles_backlight_faz.doblecara.png" width="589" height="478" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles_backlight_faz.doblecara.png', array( 'class' => "doscara" , 'alt' => "NAMBRE!", 'width'=> "589", 'height' => "478")),
					array('controller' => 'carteles', 'action' => "back_light" ,'sobre_pared', 'doble_cara'),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);
				?>	
			</div>
			<!--<div id="content-lema"><img src="images/carteles_backlight_faz.lema.png" width="1356" height="122" alt=""></div>-->
			<div id="content-lema"><?php echo $this->Html->image('carteles_backlight_faz.lema.png', array( 'alt' => "NAMBRE!", 'width'=> "1356", 'height' => "122")); ?></div>
		</div>
	</div>
</body>
</html>
