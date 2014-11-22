<div class="cuestionarios view">
<h2><?php echo __('Cuestionario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cuestionario['Cuestionario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($cuestionario['Cuestionario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Preguntas'); ?></dt>
		<dd>
			<?php echo h($cuestionario['Cuestionario']['num_preguntas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicado'); ?></dt>
		<dd>
			<?php echo h($cuestionario['Cuestionario']['publicado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuestionario'), array('action' => 'edit', $cuestionario['Cuestionario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cuestionario'), array('action' => 'delete', $cuestionario['Cuestionario']['id']), array(), __('Are you sure you want to delete # %s?', $cuestionario['Cuestionario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuestionario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Historiales'); ?></h3>
	<?php if (!empty($cuestionario['Historial'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cuestionario Id'); ?></th>
		<th><?php echo __('Aciertos'); ?></th>
		<th><?php echo __('Calificacion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuestionario['Historial'] as $historial): ?>
		<tr>
			<td><?php echo $historial['id']; ?></td>
			<td><?php echo $historial['user_id']; ?></td>
			<td><?php echo $historial['cuestionario_id']; ?></td>
			<td><?php echo $historial['aciertos']; ?></td>
			<td><?php echo $historial['calificacion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'historiales', 'action' => 'view', $historial['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'historiales', 'action' => 'edit', $historial['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historiales', 'action' => 'delete', $historial['id']), array(), __('Are you sure you want to delete # %s?', $historial['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
