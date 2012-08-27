<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>



<!--    	<link rel="stylesheet" type="text/css" href="css/carteles_frontlight_luz.css" />-->
<!--		<link rel="stylesheet" type="text/css" href="global.css" />-->
<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->


		<?php echo $this->Html->css('carteles_frontlight_luz'); ?>
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

<!--					<a href="carteles_frontlight.html" class="transition-back"><img src="images/header_small.frontlight.png" width="442" height="201" alt=""></a>-->
				<?php echo $this->Html->link(
					$this->Html->image('header_small.adhesivo.png', array('alt' => "NAMBRE!", 'width'=> "422", 'height' => "201")),
					array('controller' => 'carteles', 'action' => "adhesivos"),
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>	
				

<!--					<img src="images/header_small.sobrepared.png" width="460" height="201" alt="">-->
				<?php echo $this->Html->image('header_small.sobreposte.png', array('alt' => "NAMBRE!", 'width'=> "460", 'height' => "201"));?>	

   			  	</div>
                <div id="content-lower-menu">
<!--                	<img class="sinluz" src="images/carteles_frontlight_sobrepared.sinluz.png" width="589" height="478" alt="">-->
						<?php echo $this->Html->link(
							$this->Html->image('carteles_frontlight_sobreposte.sinluz.png', array( 'class' => "sinluz" , 'alt' => "NAMBRE!", 'width'=> "589", 'height' => "478")),
							array('controller' => 'carteles', 'action' => "adhesivos" ,'sobre_poste', 'sin_luz'),
							array('target' => '_self', 'escape' => false, 'class' => "transition-out" )
							);
			  		    ?>	
						
<!--                    <img class="separador_medio" src="images/separador.png"  width="39" height="351" alt="">-->
						<?php echo $this->Html->image('separador.png', array('class' => "separador_medio" , 'alt' => "NAMBRE!", 'width'=> "39", 'height' => "351"));
			   			?>
<!--                    <img class="conluz" src="images/carteles_frontlight_sobrepared.conluz.png" width="589" height="478" alt="">-->
						<?php echo $this->Html->link(
							$this->Html->image('carteles_frontlight_sobreposte.conluz.png', array( 'class' => "conluz" , 'alt' => "NAMBREE!", 'width'=> "589", 'height' => "478")),
							array('controller' => 'carteles', 'action' => "adhesivos" ,'sobre_poste', 'con_luz'),
							array('target' => '_self', 'escape' => false, 'class' => "transition-out" )
							);
			  		    ?>	
                </div>
<!--              <div id="content-lema">	<img src="images/carteles_frontlight_sobreposte.lema.png" width="1356" height="124" alt=""></div>-->
				<div id="content-lema">	
			    <?php echo $this->Html->image('carteles_frontlight_sobreposte.lema.png', array('alt' => "NAMBRE!", 'width'=> "1356", 'height' => "124"));
			    ?>
				</div>
			</div>
		</div>
    </body>
</html>
