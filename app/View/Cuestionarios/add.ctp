<div class="cuestionarios form">
<?php echo $this->Form->create('Cuestionario'); ?>
	<fieldset>
		<legend><?php echo __('Add Cuestionario'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	<button class='btn btn-success btn-add-pregunta'>+ Pregunta</button>
	<?php
		echo $this->Form->input('pregunta');
	?>
	<table>
		<thead>
			<tr>
				<th>respuesta</th>
				<th>cierta</th>
				<th>acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input name=''></td>
				<td><input type='checkbox'></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<ul>
		<li>
			<?php
				echo $this->Form->input('respuesta');
			?>
		</li>
		<li>
			<?php
				echo $this->Form->input('respuesta');
			?>
		</li>
		<li>
			<button class='btn btn-success btn-add-respuesta'>+ Respuesta</button>
		</li>
	</ul>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cuestionarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Historiales'), array('controller' => 'historiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial'), array('controller' => 'historiales', 'action' => 'add')); ?> </li>
	</ul>
</div>
