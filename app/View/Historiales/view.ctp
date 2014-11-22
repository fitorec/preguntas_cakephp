<div class="historiales view">
<h2><?php echo __('Historial'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($historial['Historial']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historial['User']['username'], array('controller' => 'users', 'action' => 'view', $historial['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuestionario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historial['Cuestionario']['nombre'], array('controller' => 'cuestionarios', 'action' => 'view', $historial['Cuestionario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aciertos'); ?></dt>
		<dd>
			<?php echo h($historial['Historial']['aciertos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calificacion'); ?></dt>
		<dd>
			<?php echo h($historial['Historial']['calificacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Historial'), array('action' => 'edit', $historial['Historial']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Historial'), array('action' => 'delete', $historial['Historial']['id']), array(), __('Are you sure you want to delete # %s?', $historial['Historial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('controller' => 'cuestionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuestionario'), array('controller' => 'cuestionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
