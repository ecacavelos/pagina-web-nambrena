<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
<!--        <link rel="stylesheet" type="text/css" href="xy_input.css" />-->
		<?php echo $this->Html->css('xy_input'); ?>


<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
		<?php echo $this->Html->css('global'); ?>
		
<!--        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
	
<!--        <script type="text/javascript" src="js/script-subpages.js"></script>-->
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
        <!--Script para detectar la resoluc—n del usuario.-->
		<!--
        <script type="text/javascript">
			document.write(screen.width+'x'+screen.height);
		</script>
        -->
		<div id="wrap">
            <div id="content">
                <div id="main-logo">
<!--                    <img src="images/index.logo.png" width="388" height="429" alt="">-->
				<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "388", 'height' => "429")),
					'/',
					array('target' => '_self', 'escape' => false, 'class' => "transition-back" )
				);
			   ?>

                </div>
              <div id="content-form">
					<p>Input</p>
                    <form>
                    	X (metros): <input type="text" name="tama–ox" /><br />
                    	Y (metros): <input type="text" name="tama–oy" />
                    </form>
                    <button id="boton_ok" type="button">OK</button>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>