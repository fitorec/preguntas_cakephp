<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Formulario de registro'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end('Registrate'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actiones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('action' => 'login')); ?></li>
		<li><?php echo $this->Html->link(__('Recuperar contraseña'), array('controller' => 'users', 'action' => 'passwords')); ?> </li>
	</ul>
</div>
