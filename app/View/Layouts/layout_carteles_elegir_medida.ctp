<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex" />
        <title>Nambrena Industria Publicitaria</title>
<!--        <link rel="stylesheet" type="text/css" href="css/xy_input.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="global.css" />-->
<!--        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />-->
<!--        -->
<!--		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<!--        <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<!--        -->
<!--		<script type="text/javascript" src="js/jquery.validate.min.js"></script>-->
<!--        <script type="text/javascript" src="js/additional-methods.min.js"></script>-->
<!--        <script type="text/javascript" src="js/messages_es.js"></script>-->
<!--        -->
<!--		<script type="text/javascript" src="js/script-subpages.js"></script>-->
<!--        <script type="text/javascript" src="js/script-forms.js"></script>-->

		<?php echo $this->Html->css('xy_input'); ?>
		<?php echo $this->Html->css('global'); ?>
		<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.18.custom'); ?>
		
		<?php echo $this->Html->script('jquery-1.7.1.min');?>
		<?php echo $this->Html->script('jquery-ui-1.8.18.custom.min');?>
		
		<?php echo $this->Html->script('jquery.validate.min');?>
		<?php echo $this->Html->script('additional-methods.min');?>
		<?php echo $this->Html->script('messages_es');?>
		
		
		<?php echo $this->Html->script('script-subpages');?>
		<?php echo $this->Html->script('script-forms');?>
		
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
        <!--Script para detectar la resoluc—n del usuario.-->
		<!--
		<script type="text/javascript">
			document.write(screen.width+'x'+screen.height+';');
		</script>
        -->
<!--        <div id="progressbar"><img src="images/cargando.png" width="410" height="100" alt=""></div>-->
    <div id="progressbar">
<!--    <img src="images/cargando.png" width="410" height="100" alt="">-->
	<?php echo $this->Html->image('cargando.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "410", 'height' => "100"))?>
    </div>
		<div id="wrap">
            <div id="content">
                <div id="logo">
<!--                    <img src="images/logo.png" width="304" height="322" alt="">-->
	<?php echo $this->Html->image('logo.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "304", 'height' => "322"))?>
                </div>	
                <div id="content-form" class="form_gradiente">
	                <p id="instrucciones">Ingres&aacute; las dimensiones que quer&eacute;s para tu cartel.</p>
	                <!--					<form id="MainForm">-->
					<?php echo $this->Form->create('Cartele',array('id' => 'MainForm' , 'name' => 'opa' ,'action' => 'ficha', 'inputDefaults' => array('div' => false, 'label' => false)));?>
						<fieldset id="xy_fields">
                            <p><label for="ancho">Ancho</label>
<!--                            <input id="ancho" name="ancho" type="number" class="text" min="1" required/>-->
							 <?php echo $this->Form->input('acho', array('name' => 'ancho', 'class' => 'text', 'required' , 'id' => 'ancho' , 'min' => '1'));?>
                            </p>
                            <p><label for="alto">Alto</label>
<!--                            <input id="alto" name="alto" type="number" class="text" min="1" required/>-->
							<?php echo $this->Form->input('alto', array('name' => 'alto', 'class' => 'text', 'required' , 'id' => 'alto' , 'min' => '1'));?>
                            </p>
                            <p><button class="boton gray" id="xy_ok" type="button" onclick="show_alert()">OK</button>
						</fieldset>
<!--					</form>    -->
					
					      
                </div>
			  	<div id="content-lower-menu2">
<!--                	<img class="frontlight" src="transporte.colocado.png" width="598" height="565" alt="">-->
<!--                	<img class="backlight" src="transporte.pickup.png" width="596" height="565" alt="">-->
<!--                	<img class="adhesivo" src="transporte.envio.png" width="598" height="565" alt="">-->
				<?php 
						
						echo $this->Html->link(
						$this->Html->image('transporte.colocado.png', array('class' => 'colocado' , 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "598", 'height' => "565")),
						"#",
						array('target' => '_self', 'escape' => false, 'onclick' => "document['opa'].submit()" )
						);
					  echo $this->Html->link(
						$this->Html->image('transporte.pickup.png', array('class' => 'pickup' , 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "596", 'height' => "565")),
						"#",
						array('target' => '_self', 'escape' => false, 'onclick' => "document['opa'].submit()" )
						);	
					   echo $this->Html->link(
						$this->Html->image('transporte.envio.png', array('class' => 'envio' , 'alt' => "NAMBRE!", 'border' => '0', 'width'=> "598", 'height' => "565")),
						"#",
						array('target' => '_self', 'escape' => false, 'onclick' => "document['opa'].submit()" )
						);	
					  
			    ?>
			    <?php echo $this->Form->end();?>  
                </div>
                <div id="content-lema">
<!--                	<img src="transporte.lema.png" width="1020" height="105" alt="">-->
				<?php  echo $this->Html->image('transporte.lema.png', array('alt' => "NAMBRE!", 'border' => '0', 'width'=> "1020", 'height' => "105"));?>
                </div>
            </div>
        </div>
    </body>
</html>