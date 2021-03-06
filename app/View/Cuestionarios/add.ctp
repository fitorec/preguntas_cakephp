<?php
$this->Html->script(
	array('cuestionarios_agregar'),
	array('inline' => false)
);
#sección CSS
$this->Html->css(
	array(
		'cuestionario_add.css',
	),
	'stylesheet',
	array('inline' => false)
);
?>
<div class="cuestionarios form">
<?php echo $this->Form->create('Cuestionario'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Cuestionario'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	<div id='preguntas-contenedor'></div>
	<button class='btn btn-success' id='btn-add-pregunta'>+ Pregunta</button>
	</fieldset>
<?php echo $this->Form->end(__('Agregar Cuestionario')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link('Lista de Cuestionarios', array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Lista de Historiales', array('controller' => 'historiales', 'action' => 'index')); ?> </li>
	</ul>
</div>
