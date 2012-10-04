<?php
echo $this->Form->create('admins', array('action' => 'index'));

if ($this->request->is('post')) {
	echo '<div id="bien"><p>Se actualizó el archivo de configuración.</p></div>';
}

echo $this->Form->input('a001', array('label' => 'Poste) precio_m2: ', 'default' => $preciom2_poste));
echo $this->Form->input('a002', array('label' => 'Altura) factor: ', 'default' => $factor_altura));
echo $this->Form->input('a003', array('label' => 'Altura) limite: ', 'default' => $limite_altura));
echo '<br>';
echo $this->Form->input('a004', array('label' => 'Cartel) reflector_precio: ', 'default' => $cartel_reflectorprecio));
echo $this->Form->input('a005', array('label' => 'Cartel) instalacion_factor: ', 'default' => $cartel_instalacionfactor));
echo $this->Form->input('a006', array('label' => 'Cartel) frontLight: ', 'default' => $cartel_frontlight));
echo $this->Form->input('a007', array('label' => 'Cartel) backLight: ', 'default' => $cartel_backlight));
echo $this->Form->input('a008', array('label' => 'Cartel) adhesivo: ', 'default' => $cartel_adhesivo));
echo $this->Form->input('a009', array('label' => 'Cartel) frontLight_MANTENIMIENTO: ', 'default' => $cartel_frontlight_lona));
echo $this->Form->input('a010', array('label' => 'Cartel) backLight_MANTENIMIENTO: ', 'default' => $cartel_backlight_lona));
echo $this->Form->input('a011', array('label' => 'Cartel) adhesivo_MANTENIMIENTO: ', 'default' => $cartel_adhesivo_lona));
echo '<br>';
echo $this->Form->input('a012', array('label' => 'Impresion) frontLight: ', 'default' => $impresion_frontlight));
echo $this->Form->input('a013', array('label' => 'Impresion) backLight: ', 'default' => $impresion_backlight));
echo $this->Form->input('a014', array('label' => 'Impresion) adhesivo: ', 'default' => $impresion_adhesivo));
echo $this->Form->input('a015', array('label' => 'Impresion) microperforado: ', 'default' => $impresion_microperforado));
echo '<br>';

echo $this->Form->end('Guardar');
echo '<br>';
?>