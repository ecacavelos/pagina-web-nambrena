<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
        
<!--       INCLUIR ESTO DE MANERA CORRECTA EN CAKE.  -->
        <link rel="stylesheet" type="text/css" href="frontpage.css" />
        
<!-- ACA HAY QUE INCLUIR ESTAS LIBRERIAS DE MANERA CORRECTA CON CAKE, ASI COMO ESTAN NO VA A FUNCIONAR.       -->
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/script-a.js"></script>
        
    </head>
    <body>
        <!--Script para detectar la resoluc—n del usuario.-->
		<!--
        <script type="text/javascript">
			document.write(screen.width+'x'+screen.height);
		</script>
        --><!--
        Version 08/02/2012 15:45
        --><div id="wrap">
            <div id="content">
                <div id="logo">
                
<!--
###################################
###################################
                EL HTML ORIGINAL ESTA COMENTADO ARRIBA DEL CODIGO CAKEPHP PARA GENERAR LOS ELEMENTOS HTML
                ##########################################################################
                #####################################################################-->
<!--                    <img src="images/nmb_front_001.png" width="388" height="429" alt="">-->
			   <?php echo $this->Html->link(
					$this->Html->image('nmb_front_001.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "388", 'height' => "429")),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			   ?>
                </div>
                <div id="content-upper-right1b">

<!--                    <img src="images/nmb_front_002.png" width="83" height="81" alt=""><img src="images/nmb_front_003.png" width="83" height="81" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('nmb_front_002.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "83", 'height' => "81")),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			   ?>
                </div>                    
                <div id="content-upper-right1a">
<!--                    <img src="images/nmb_front_004.png" width="307" height="59" alt="">-->
                
                <?php echo $this->Html->link(
					$this->Html->image('nmb_front_004.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "307", 'height' => "59")),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			   ?>
                </div>
                <div id="content-upper-right2">
<!--                    <img src="images/nmb_front_005.png" width="780" height="103" alt="">-->
                <?php echo $this->Html->link(
					$this->Html->image('nmb_front_005.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "780", 'height' => "103")),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			   ?>
                </div>
                <div id="content-lower"> 
                	<a href="carteles.html" class="transition-out"><img src="images/nmb_front_006.png" width="400" height="401" alt=""></a>
                    <img src="images/nmb_front_007.png" width="465" height="401" alt="">
                    <img src="images/nmb_front_008.png" width="504" height="401" alt="">
                    <img src="images/nmb_front_009.png" width="449" height="401" alt="">
                </div>
            </div>
        </div>
    </body>
</html>