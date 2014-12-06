if (!String.prototype.format) {
  String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) { 
      return typeof args[number] != 'undefined'
        ? args[number]
        : match
      ;
    });
  };
}

num_preguntas = 0;
$(function() {
	// Handler for .ready() called.
	var divPregunta = '<div class="input text" id="div_pregunta-{0}">' +
		'<label for="CuestionarioPregunta">{1}.- Pregunta <button class="btn btn-danger quitar-pregunta" title="quitar pregunta">-</button></label>' +
		'<input type="text" id="CuestionarioPregunta" name="data[Preguntas][{2}][nombre]">' +
		'<table class="respuestas">' +
		'<thead><tr><th>#</th><th>respuesta</th><th>cierta</th><th>quitar</th></tr>' +
		'</thead>' +
		'<tbody>' +
		'</tbody>'+
		'</table>' +
		'<button class="btn btn-primary add-respuesta">+ Respuesta</button>' +
		'</div>';
	var $preguntasContenedor = $('#preguntas-contenedor');
	$('#btn-add-pregunta').click(function (event) {
		console.log('Entro a la funcion ');
		event.preventDefault();
		++num_preguntas;
		$preguntasContenedor.append(divPregunta.format(num_preguntas, num_preguntas, num_preguntas));
		agregarPregunta(num_preguntas);
	});
	
	$preguntasContenedor.on( "click", ".quitar-pregunta", function(event) {
		$(this).closest('div').remove();
		event.preventDefault();
	});
	$preguntasContenedor.on( "click", ".quitar-respuesta", function(event) {
		$(this).closest('tr').remove();
		event.preventDefault();
	});

	$preguntasContenedor.on( "click", ".add-respuesta", function(event) {
		var idParts = $(this).closest('div').attr('id').split("-");
		event.preventDefault();
		agregarPregunta(idParts[1])
	});
	
});

function agregarPregunta(num_pregunta) {
	var tr = "<tr><td>{0}</td>"
	+ "<td><input name='data[Preguntas][{1}][respuestas][{2}][valor]'></td>"
	+ "<td><input name='data[Preguntas][{3}][respuestas][{4}][es_cierta]' type='checkbox'></td>"
	+ "<td><button title='quitar respuesta' class='btn btn-danger quitar-respuesta'>-</button></td></tr>";
	$table = $('#div_pregunta-'+num_pregunta).find('table.respuestas tbody');
	numRespuestas = $table.find('tr').length;
	$table.append(tr.format(numRespuestas+1, num_pregunta, numRespuestas, num_pregunta, numRespuestas));
}
