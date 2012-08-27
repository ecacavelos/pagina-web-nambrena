<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
	<!--        <link rel="stylesheet" type="text/css" href="css/impresiones.css" />-->
	<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
	<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
	<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
	<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->
	    <?php echo $this->Html->css('impresiones.css'); ?>
		<?php echo $this->Html->css('global'); ?>
		<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
		<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min');?>
		<?php echo $this->Html->script('script-subpages');?>
	
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
<!--		<div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div>-->
      <div id="progressbar"><?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")) ;?></div>		
		<div id="wrap">
        	<div id="content">
				<div id="logo">
<!--				<a href="index.html" class="transition-back"><img src="images/logo.png" width="304" height="322" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "304", 'height' => "322")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>
				</div>
    			<div id="content-upper-left">
<!--    			<img src="images/header_big.impresiones.png" width="1000" height="205" alt="">-->
    			<?php echo $this->Html->image('header_big.impresiones.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "948", 'height' => "246"));?>
    			</div>
				<div id="content-lower-menu">
<!--                    <img class="frontlight" src="images/impresiones.frontlight.png" width="440" height="400" alt="">-->
<!--                    <img class="backlight" src="images/impresiones.backlight.png" width="440" height="400" alt="">-->
<!--                    <img class="adhesivo" src="images/impresiones.adhesivo.png" width="440" height="400" alt="">-->
<!--                    <img class="microperforado" src="images/impresiones.microperforado.png" width="440" height="400" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('impresiones.frontlight.png', array( 'class' => "frontlight" , 'alt' => "NAMBRE!", 'width'=> "440", 'height' => "400")),
					array('controller' => 'impresiones', 'action' => "front_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
			   ?>
			   <?php echo $this->Html->link(
					$this->Html->image('impresiones.backlight.png', array( 'class' => "backlight" , 'alt' => "NAMBRE!", 'width'=> "440", 'height' => "400")),
					array('controller' => 'impresiones', 'action' => "back_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
			   ?>
   			   <?php echo $this->Html->link(
					$this->Html->image('impresiones.adhesivo.png', array( 'class' => "adhesivo" , 'alt' => "NAMBRE!", 'width'=> "440", 'height' => "400")),
					array('controller' => 'impresiones', 'action' => "adhesivo"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
			   ?>
			   <?php echo $this->Html->link(
					$this->Html->image('impresiones.microperforado.png', array( 'class' => "microperforado" , 'alt' => "NAMBRE!", 'width'=> "440", 'height' => "400")),
					array('controller' => 'impresiones', 'action' => "microperforado"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-out")
				);
			   ?>
			   
			   
				</div>
                <div id="content-lema">
<!--                <img src="images/impresiones.lema.png" width="1435" height="118" alt="">-->
			  <?php echo $this->Html->image('impresiones.lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1435", 'height' => "188"));
			   ?>
                </div>
            </div>
        </div>
	</body>
</html>
