<div class="cuestionarios form">
<?php echo $this->Form->create('Cuestionario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cuestionario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('num_preguntas');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cuestionario.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cuestionario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
