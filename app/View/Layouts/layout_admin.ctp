<?php
	echo "<p>Vista de Admin.<br>";
	
	if ($logeado == '1') {
		echo 'Estas logeado.</p>';
		echo $content_for_layout;
		echo $this->Html->link('Cerrar Sesión', array('controller' => 'users', 'action' => 'logout'));
	} else {
		echo '</p>';
		echo $this->Html->link('Iniciar Sesión', array('controller' => 'users', 'action' => 'login'));
	}
	
?>
