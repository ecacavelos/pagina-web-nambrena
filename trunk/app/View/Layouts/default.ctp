<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>:::Nambrena Industria Publicitaria:::</title>


<!--		<link rel="stylesheet" type="text/css" href="css/frontpage.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<!--        <script type="text/javascript" src="js/script-frontpage.js"></script>-->
        
		
		<?php echo $this->Html->css('frontpage'); ?>
		<?php echo $this->Html->css('global'); ?>
		<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom');?>
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
		<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min.js');?>
		<?php echo $this->Html->script('script-frontpage.js');?>
       
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
			document.write(screen.width+'x'+screen.height);
		</script>
        --><!--
        Version 08/02/2012 15:45
        -->
<!--        <div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div><div id="wrap">-->
            <div id="progressbar"><?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100")) ;?></div>
            <div id="wrap">
            <div id="content">
                <div id="main-logo">
                
				<!--
				###################################
				###############################
                EL HTML ORIGINAL ESTA COMENTADO ARRIBA DEL CODIGO CAKEPHP PARA GENERAR LOS ELEMENTOS HTML
                ##########################################################################
                #####################################################################-->
<!--          <img src="images/index.logo.png" width="388" height="429" alt="">-->
			   <?php echo $this->Html->link(
					$this->Html->image('index.logo.png', array('alt' => "NAMBRE!", 'width'=> "388", 'height' => "429")),
					'/',
					array('target' => '_self', 'escape' => false)
				); 
			   ?>
                </div>
                <div id="content-social-icons">

<!--            <img src="images/index.icontw.png" width="83" height="81" alt=""><img src="images/index.iconfb.png" width="83" height="81" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('index.icontw.png', array('alt' => "NAMBRE!", 'width'=> "83", 'height' => "81")),
					'http://twitter.com/#!/Nambrena_nmb',
					array('target' => '_blank', 'escape' => false)
				);
			   ?><?php echo $this->Html->link(
					$this->Html->image('index.iconfb.png', array('alt' => "NAMBRE!", 'width'=> "83", 'height' => "81")),
					'http://www.facebook.com/pages/Nambrena-nmb/217230554954632',
					array('target' => '_blank', 'escape' => false)
				);
			   ?><?php echo $this->Html->link(
					$this->Html->image('index.iconbl.png', array('alt' => "NAMBRE!", 'width'=> "83", 'height' => "81")),
					'http://www.nambrena.com.py/blog/',
					array('target' => '_blank', 'escape' => false)
				);
			   ?>               
                </div>                    
                <div id="content-upper-right1a">
<!--                    <img src="images/index.seguinospues.png" width="307" height="59" alt="">-->
                
                <?php $this->Html->image('index.seguinospues.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "307", 'height' => "59"));
			   ?>
                </div>
                <div id="content-upper-right2">
<!--                    <img src="images/index.lema.png" width="780" height="103" alt="">-->
                <?php 
					echo $this->Html->image('index.lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "780", 'height' => "103"));
			   ?>
			   
                </div>
                <div id="content-lower-menu">
<!--                	<a href="carteles.html" class="transition-out"><img src="images/index.carteles.png" width="404" height="401" alt=""></a>-->
	                <?php echo $this->Html->link(
						$this->Html->image('index.carteles.png', array('alt' => "NAMBRE!", 'width'=> "404", 'height' => "401")),
						array('controller' => 'carteles'),
						array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);?>
<!--                    <img src="images/index.corporeos.png" width="465" height="401" alt="">-->
                    <?php echo $this->Html->link(
						$this->Html->image('index.corporeos.png', array('alt' => "NAMBRE!", 'width'=> "465", 'height' => "401")),
						array('controller' => 'corporeos'),
						array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);?>
<!--                    <img src="images/index.impresiones.png" width="504" height="401" alt="">-->
                    <?php echo $this->Html->link(
						$this->Html->image('index.impresiones.png', array('alt' => "NAMBRE!", 'width'=> "508", 'height' => "401")),
						array('controller' => 'impresiones'),
						array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);?>
<!--                    <img src="images/index.cortedevinilos.png" width="449" height="401" alt="">-->
                    <?php echo $this->Html->link(
						$this->Html->image('index.cortedevinilos.png', array('alt' => "NAMBRE!", 'width'=> "441", 'height' => "401")),
						array('controller' => 'vinilos'),
						array('target' => '_self', 'escape' => false, 'class' => "transition-out")
					);?>
                </div>
                <div class="clear"></div>
            </div>
            </div>
        </div>
        <?php echo $this->Session->flash(); ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>