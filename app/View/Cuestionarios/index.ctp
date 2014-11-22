<div class="cuestionarios index">
	<h2><?php echo __('Cuestionarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('num_preguntas'); ?></th>
			<th><?php echo $this->Paginator->sort('publicado'); ?></th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cuestionarios as $cuestionario): ?>
	<tr>
		<td><?php echo h($cuestionario['Cuestionario']['id']); ?>&nbsp;</td>
		<td><?php echo h($cuestionario['Cuestionario']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($cuestionario['Cuestionario']['num_preguntas']); ?>&nbsp;</td>
		<td><?php echo h($cuestionario['Cuestionario']['publicado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cuestionario['Cuestionario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cuestionario['Cuestionario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cuestionario['Cuestionario']['id']), array(), __('Are you sure you want to delete # %s?', $cuestionario['Cuestionario']['id'])); ?>
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
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cuestionario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
