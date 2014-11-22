<div class="historiales index">
	<h2><?php echo __('Historiales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cuestionario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('aciertos'); ?></th>
			<th><?php echo $this->Paginator->sort('calificacion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($historiales as $historial): ?>
	<tr>
		<td><?php echo h($historial['Historial']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($historial['User']['username'], array('controller' => 'users', 'action' => 'view', $historial['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($historial['Cuestionario']['nombre'], array('controller' => 'cuestionarios', 'action' => 'view', $historial['Cuestionario']['id'])); ?>
		</td>
		<td><?php echo h($historial['Historial']['aciertos']); ?>&nbsp;</td>
		<td><?php echo h($historial['Historial']['calificacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $historial['Historial']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $historial['Historial']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $historial['Historial']['id']), array(), __('Are you sure you want to delete # %s?', $historial['Historial']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Historial'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('controller' => 'cuestionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuestionario'), array('controller' => 'cuestionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
