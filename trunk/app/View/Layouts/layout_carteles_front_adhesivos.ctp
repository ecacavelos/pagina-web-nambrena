<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex" />
	<title>Nambrena Industria Publicitaria</title>
	<!--<link rel="stylesheet" type="text/css" href="css/carteles_frontlight_backlight.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="global.css" />-->
	<!--<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
	<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--<script type="text/javascript" src="js/script-subpages.js"></script>-->
	<?php echo $this->Html->css('carteles_frontlight_backlight'); ?>
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
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "304", 'height' => "322")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back")
				);
				?>
			</div>
			<div id="content-upper-left">
				<!--<a href="carteles.html" class="transition-back"><img src="images/header_medium.carteles.png" width="606" height="276" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('header_medium.carteles.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "606", 'height' => "276")),
					array('controller' => 'carteles', 'action' => "index"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back")
				);
				?>	
				<!--<img src="images/carteles_frontlight.frontlight.png" width="674" height="276" alt="">-->
				<?php echo $this->Html->image('carteles_frontlight.frontlight.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "674", 'height' => "276")); ?>
				
			</div>
			<div id="content-lower-menu">
				<!--<a href="carteles_frontlight_sobrepared.html" class="transition-out"><img class="sobrepared" src="images/carteles_frontlight.sobrepared.png" width="516" height="496" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles_frontlight.sobrepared.png', array('class' => "sobrepared", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "516", 'height' => "496")),
					array('controller' => 'carteles', 'action' => "front_light", "sobre_pared"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
				<!--<a href="carteles_frontlight_sobreposte.html" class="transition-out"><img class="sobreposte" src="images/carteles_frontlight.sobreposte.png" width="561" height="496" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles_frontlight.sobreposte.png', array('class' => "sobreposte", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "561", 'height' => "496")),
					array('controller' => 'carteles', 'action' => "front_light", "sobre_poste"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
				<!--<a href="carteles_frontlight_mantenimiento.html" class="transition-out"><img class="yaposeo" src="images/carteles_frontlight.yaposeo.png" width="393" height="496" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles_frontlight.yaposeo.png', array('class' => "yaposeo", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "393", 'height' => "496")),
					array('controller' => 'carteles', 'action' => "front_light", "ya_poseo"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
			</div>
			<div id="content-lema">
				<!--<img src="images/carteles_frontlight.lema.png" width="988" height="109" alt="">-->
				<?php echo $this->Html->image('carteles_frontlight.lema.png', array('alt' => "NAMBRE!", 'width'=> "988", 'height' => "109")); ?>
			</div>
		</div>
	</div>
</body>
</html>
