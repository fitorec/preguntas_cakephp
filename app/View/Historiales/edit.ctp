<div class="historiales form">
<?php echo $this->Form->create('Historial'); ?>
	<fieldset>
		<legend><?php echo __('Edit Historial'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('cuestionario_id');
		echo $this->Form->input('aciertos');
		echo $this->Form->input('calificacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Historial.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Historial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('controller' => 'cuestionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuestionario'), array('controller' => 'cuestionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
