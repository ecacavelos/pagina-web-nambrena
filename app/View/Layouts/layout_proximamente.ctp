<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>Nambrena Industria Publicitaria</title>
    <!--<link rel="stylesheet" type="text/css" href="css/en_construccion.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="global.css" />-->
    <!--<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
    <!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
    <!--<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
	<!--<script type="text/javascript" src="js/script-subpages.js"></script>-->
	<?php echo $this->Html->css('en_construccion'); ?>
	<?php echo $this->Html->css('global'); ?>
	<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
	<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min'); ?>
	<?php echo $this->Html->script('script-subpages'); ?>
	<?php echo $this->Html->meta('icon');?>
	<style type="text/css">
        #content-lower-menu {
            left: 0px;
        }
		#progressbar{
			display: none;
		}
    </style>
</head>
    <body>
        <!--Script para detectar la resolucón del usuario.-->
		<!--<script type="text/javascript">document.write(screen.width+'x'+screen.height);</script>-->
        <div id="progressbar">
        	<!--<img src="images/cargando.png" width="410" height="100" alt="">-->
        	<?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")) ;?>
        </div>
		<div id="wrap">
            <div id="content">
                <div id="content-upper-right1a">
                    <!--<img src="images/index.seguinospues.png" width="307" height="59" alt="">-->
                    <?php echo $this->Html->link($this->Html->image("volver.png", array("alt" => "Volver al Inicio")), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'back-to-home', 'class' => 'transition-back', 'escape' => false)); ?>
                </div>                 
                <div id="content-en-construccion">
                	<!--<img src="images/en_construccion.main.png" width="1728" height="810" alt="">-->
                	<?php
                		if($cor_or_vin == 'cor'){
                			echo $this->Html->image('corporeos.proximamente.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1728", 'height' => "810"));
                		} else{
                			echo $this->Html->image('vinilos.proximamente.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1728", 'height' => "810"));
                		}
					?>
                </div>
            </div>
        </div>
    </body>
</html>