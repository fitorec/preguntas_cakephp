<?php
#sección CSS
$this->Html->css(
	array(
		'cuestionarios_view.css',
	),
	'stylesheet',
	array('inline' => false)
);
$this->Html->script(
	array('cuestionarios_view'),
	array('inline' => false)
);
?>
<div class="container bs-docs-container">
	<h1 class="page-header"><?php echo $cuestionario['Cuestionario']['nombre']; ?></h1>
	<div>
	<?php
	echo $this->Html->link(
		'Iniciar',
		array('action' => 'login'),
		array(
			'class' => 'btn btn-primary btn-lg',
			'id' => 'btn-iniciar-historial',
			'data-historial-id' => 0,
		)
	); ?>
	</div>
<div id='contenedor-tablero'>
<form action="" method="post" id='mostrarPregunta'>
	<button class='btn btn-primary'>
			<i class='icon icon-eye'></i> Mostrar Siguiente Pregunta
			<span id='preguntaActual'>0</span>/<span id='numPreguntas'>0</span>
	</button>
	Respuestas correctas: <span class='bagge' id='numRespuestasCorrectas'>0</span>
	, incorrectas <span class='bagge' id='numRespuestasIncorrectas'>0</span>
</form>

<div id="tablero">
	<h1 id='pregunta-titulo' data-pregunta-key='-1'>¿Cuando sucedio tal cosa?</h1>
<div class="progress">
  <div id='barra-proceso' class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
  </div>
</div>
	<ol id="pregunta-respuestas">
	</ol>
	<a href='#' class='btn btn-success' id='btn-responder'>Responder</a>
</div><!-- /#tablero -->
</div><!-- /#contenedor-tablero -->
</div>
<?php
	echo $this->Form->create('Historial', array('controller' => 'historiales', 'action' => 'add'));
	echo $this->Form->input(
		'cuestionario_id',
		array('type'=>'hidden','value' => $cuestionario['Cuestionario']['id'])
	);
?>
</form>
<?php
	echo $this->Form->create('Historial', array('controller' => 'historiales', 'action' => 'finalizar'));
	echo $this->Form->input(
		'cuestionario_id',
		array('type'=>'hidden','value' => $cuestionario['Cuestionario']['id'])
	);
	echo $this->Form->input(
		'id',
		array('type'=>'hidden')
	);
	echo $this->Form->input(
		'aciertos',
		array('type'=>'hidden')
	);
	echo $this->Form->input(
		'data',
		array('type'=>'text')
	);
?>
</form>
<script>
	var preguntas = <?php echo json_encode($preguntas); ?>;
</script>
