<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
        <!--       INCLUIR ESTO DE MANERA CORRECTA EN CAKE.
		########################################################
		###################################################
		LINK A LOS ARCHIVOS CSS
		#####################################################
		#####################################################  -->
		<!--        <link rel="stylesheet" type="text/css" href="carteles.css" />-->
		<?php echo $this->Html->css('carteles'); ?>


		<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
		<?php echo $this->Html->css('global'); ?>
		
		
		
		<!-- ACA HAY QUE INCLUIR ESTAS LIBRERIAS DE MANERA CORRECTA CON CAKE, ASI COMO ESTAN NO VA A FUNCIONAR.   
		########################################################
				###################################################
				linkeado a los scripts utilizados. JQuery y el scrip-a
				#####################################################
				#####################################################    -->
		
		<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
		
		<!--        <script type="text/javascript" src="js/script-subpages.js"></script>-->
		<?php echo $this->Html->script('script-subpages.js');?>
       
        <noscript>
            <style type="text/css">
                #content-lower-menu {
                    left: 0px;
                }
            </style>
        </noscript>
    </head>
	<body>
		<div id="wrap">
        	<div id="content">
				<div id="logo">
<!--					<a href="index.html" class="transition-back"><img src="images/logo.png" width="304" height="322" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "304", 'height' => "322")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>
				</div>
    			<div id="content-upper-left">
<!--                	<img src="images/header_big.carteles.png" width="948" height="246" alt="">-->
				<?php echo $this->Html->image('header_big.carteles.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "948", 'height' => "246"));
				
			   ?>
                </div>
			  	<div id="content-lower-menu">
<!--                	<a href="carteles_frontlight.html" class="transition-out"><img class="frontlight" src="images/carteles.frontlight.png" width="450" height="492" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.frontlight.png', array( 'class' => "frontlight" , 'alt' => "NAMBRE!", 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "front_light"),
					array('target' => '_self', 'escape' => false , 'class' => "transition-out")
				);
			   ?>
<!--                    <a href="carteles_frontlight.html" class="transition-out"><img class="frontlight" src="images/carteles.frontlight.png" width="450" height="492" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.backlight.png', array('class' => "backlight", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "back_light"),
					array('target' => '_self', 'escape' => false , 'class' => "transition-out")
				);
			   ?>
<!--                    <img class="adhesivo" src="images/carteles.adhesivo.png" width="450" height="492" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('carteles.adhesivo.png', array( 'class'=>"adhesivo", 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "450", 'height' => "492")),
					array('controller' => 'carteles', 'action' => "adhesivos"),
					array('target' => '_self', 'escape' => false)
				);
			   ?>

                    </div>
                <div id="content-lema">
<!--                <img src="images/carteles.lema.png" width="1458" height="122" alt="">-->
                <?php echo $this->Html->image('carteles.lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1458", 'height' => "122"));
			   ?>
                </div>
            </div>
        </div>
	</body>
</html>
