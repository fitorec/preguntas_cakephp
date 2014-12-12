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
		<td>
			<div class="btn-group" role="group" aria-label="...">
				<?php
				echo $this->Html->link(
					__('Responder'),
					array('action' => 'view', $cuestionario['Cuestionario']['id']),
					array('class' => 'btn btn-default')
				);
				if( $tipo_usuario == 'Profesor') {
					echo $this->Form->postLink(
						__('Borrar'),
						array('action' => 'delete', $cuestionario['Cuestionario']['id']),
						array('class' => 'btn btn-default'),
						__('Are you sure you want to delete # %s?', $cuestionario['Cuestionario']['id'])
					);
					echo $this->Html->link(
						__('Editar'),
						array('action' => 'edit', $cuestionario['Cuestionario']['id']),
						array('class' => 'btn btn-default')
					);
				}
				?>
			</div>
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
		<?php if( $tipo_usuario == 'Profesor'): ?>
		<li><?php echo $this->Html->link(__('Agregar Cuestionario'), array('action' => 'add')); ?></li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
	</ul>
</div>
