<?php
echo $this->Form->create('admins', array('action' => 'index'));

if ($this->request->is('post')) {
	echo '<div id="bien"><p>Se actualizó el archivo de configuración.</p></div>';
}

echo $this->Form->input('a001', array('label' => '00: ', 'default' => $preciom2_poste));
echo $this->Form->input('a002', array('label' => '01: ', 'default' => $factor_altura));
echo $this->Form->input('a003', array('label' => '02: ', 'default' => $limite_altura));
echo '<br>';
echo $this->Form->input('a004', array('label' => '03: ', 'default' => $cartel_reflectorprecio));
echo $this->Form->input('a005', array('label' => '04: ', 'default' => $cartel_instalacionfactor));
echo $this->Form->input('a006', array('label' => '05: ', 'default' => $cartel_frontlight));
echo $this->Form->input('a007', array('label' => '06: ', 'default' => $cartel_backlight));
echo $this->Form->input('a008', array('label' => '07: ', 'default' => $cartel_adhesivo));
echo $this->Form->input('a009', array('label' => '08: ', 'default' => $cartel_frontlight_lona));
echo $this->Form->input('a010', array('label' => '09: ', 'default' => $cartel_backlight_lona));
echo $this->Form->input('a011', array('label' => '10: ', 'default' => $cartel_adhesivo_lona));
echo '<br>';
echo $this->Form->input('a012', array('label' => '11: ', 'default' => $impresion_frontlight));
echo $this->Form->input('a013', array('label' => '12: ', 'default' => $impresion_backlight));
echo $this->Form->input('a014', array('label' => '13: ', 'default' => $impresion_adhesivo));
echo $this->Form->input('a015', array('label' => '14: ', 'default' => $impresion_microperforado));
echo '<br>';

echo $this->Form->end('Guardar');
echo '<br>';
?>