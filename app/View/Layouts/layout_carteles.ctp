<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="robots" content="noindex" />
	<title>Nambrena Industria Publicitaria</title>
	<!--<link rel="stylesheet" type="text/css" href="css/carteles.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="global.css" />-->
	<!--<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
	<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--<script type="text/javascript" src="js/script-subpages.js"></script>-->
	<?php echo $this->Html->css('carteles'); ?>
	<?php echo $this->Html->css('global'); ?>
	<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
	<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min'); ?>
	<?php echo $this->Html->script('script-subpages'); ?>
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
				<!--<img src="images/header_big.carteles.png" width="948" height="246" alt="">-->
				<?php
					echo $this->Html->image('header_big.carteles.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "948", 'height' => "246"));
					echo $this->Html->link($this->Html->image("back-arrow.png", array("alt" => "Volver", 'height' => '120px', 'width' => '120px', 'id' => 'back-arrow')), array('controller' => 'pages', 'action' => 'display', 'home'), array('escape' => false, 'class' => 'transition-back', 'title' => "Volver"));
				?>
			</div>
			<div id="content-lower-menu">
				<!--<a href="carteles_frontlight.html" class="transition-out"><img class="frontlight" src="images/carteles.frontlight.png" width="450" height="492" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.frontlight.png', array( 'class' => "frontlight" , 'alt' => "NAMBRE!", 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "front_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
				<!--<a href="carteles_frontlight.html" class="transition-out"><img class="frontlight" src="images/carteles.frontlight.png" width="450" height="492" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.backlight.png', array('class' => "backlight", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "back_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
				<!--<img class="adhesivo" src="images/carteles.adhesivo.png" width="450" height="492" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.adhesivo.png', array('class'=>"adhesivo", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "adhesivos"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
				?>
			</div>
			<div id="content-lema">
				<!--<img src="images/carteles.lema.png" width="1458" height="122" alt="">-->
				<?php echo $this->Html->image('carteles.lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1458", 'height' => "122")); ?>
			</div>
		</div>
	</div>
</body>
</html>
