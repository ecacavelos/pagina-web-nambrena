<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>



<!--        <link rel="stylesheet" type="text/css" href="css/carteles_mantenimiento.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->


		<?php echo $this->Html->css('carteles_mantenimiento'); ?>
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
    <!--        <div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div><div id="wrap">-->
      <div id="progressbar"><?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")) ;?></div>
        <div id="wrap">
			<div id="content">
			  <div id="logo">
<!--			  <a href="index.html" class="transition-back"><img src="images/logo.png" width="304" height="322" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'width'=> "304", 'height' => "322")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>	

				</div>
			  <div id="content-upper-left">
<!--               		<a href="carteles.html" class="transition-back"><img src="images/header_small.carteles.png" width="417" height="201" alt=""></a>-->
			 <?php echo $this->Html->link(
					$this->Html->image('header_small.carteles.png', array('alt' => "NAMBRE!", 'width'=> "417", 'height' => "201")),
					array('controller' => 'carteles', 'action' => "index"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>	

<!--					<a href="carteles_backlight.html" class="transition-back"><img src="images/header_small.backlight.png" width="442" height="201" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('header_small.backlight.png', array('alt' => "NAMBRE!", 'width'=> "422", 'height' => "201")),
					array('controller' => 'carteles', 'action' => "back_light"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>	
				

<!--					<img src="images/header_small.sobrepared.png" width="460" height="201" alt="">-->
				<?php echo $this->Html->image('header_small.yaposeo.png', array('alt' => "NAMBRE!", 'width'=> "460", 'height' => "201"));?>	

   			  	</div>
                <div id="content-lower-menu">
<!--                	<img class="sinmantenimiento" src="images/carteles_frontlight_mantenimiento.sinmantenimiento.png" width="615" height="585" alt="">-->
<!--                    <img class="separador_medio" src="images/separador.png"  width="39" height="351" alt="">-->
<!--                    <img class="conmantenimiento" src="images/carteles_frontlight_mantenimiento.conmantenimiento.png" width="615" height="585" alt="">-->

						<?php echo $this->Html->link(
							$this->Html->image('carteles_frontlight_mantenimiento.sinmantenimiento.png', array( 'class' => "sinmantenimiento" , 'alt' => "NAMBRE!", 'width'=> "615", 'height' => "585")),
							array('controller' => 'carteles', 'action' => "back_light" ,'ya_poseo', 'sin_mantenimiento'),
							array('target' => '_self', 'escape' => false, 'class' => "transition-out" )
							);
			  		    ?>	
						
			  		    <?php echo $this->Html->image('separador.png', array('class' => "separador_medio" , 'alt' => "NAMBRE!", 'width'=> "39", 'height' => "351"));
			   			?>
            
						<?php echo $this->Html->link(
							$this->Html->image('carteles_frontlight_mantenimiento.conmantenimiento.png', array( 'class' => "conmantenimiento" , 'alt' => "NAMBRE!", 'width'=> "615", 'height' => "585")),
							array('controller' => 'carteles', 'action' => "back_light" ,'ya_poseo', 'con_mantenimiento'),
							array('target' => '_self', 'escape' => false, 'class' => "transition-out" )
							);
			  		    ?>	
                </div>
              <<div id="content-lema">
<!--              <img src="images/carteles_frontlight_mantenimiento.lema.png" width="1356" height="122" alt="">-->
			  <?php echo $this->Html->image('carteles_frontlight_mantenimiento.lema.png', array('alt' => "NAMBRE!", 'width'=> "1356", 'height' => "122"));?>
              </div>
			</div>
		</div>
    </body>
</html>
