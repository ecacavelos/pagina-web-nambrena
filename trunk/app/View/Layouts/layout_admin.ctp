<?php
	echo "<p>Vista de Admin.</p>";
	
	if ($logeado == '1') {
		echo '<p id="msg_logeado">';
		echo 'Estas logeado. ';
		echo $this->Html->link('Cerrar Sesión', array('controller' => 'users', 'action' => 'logout'));
		echo '</p>';
	} else {
		echo $this->Html->link('Iniciar Sesión', array('controller' => 'users', 'action' => 'login'));
	}
	
	
?>
