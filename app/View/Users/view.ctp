<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($user['User']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Historiales'); ?></h3>
	<?php if (!empty($user['Historial'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cuestionario Id'); ?></th>
		<th><?php echo __('Aciertos'); ?></th>
		<th><?php echo __('Calificacion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Historial'] as $historial): ?>
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
