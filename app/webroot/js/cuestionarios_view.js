$(function() {
	$('#btn-iniciar-historial').click(function(event){
		var $btnIniciarHistorial = $(this);
		var element = document.documentElement;
		if(element.requestFullscreen) {
			element.requestFullscreen();
		  } else if(element.mozRequestFullScreen) {
			element.mozRequestFullScreen();
		  } else if(element.webkitRequestFullscreen) {
			element.webkitRequestFullscreen();
		  } else if(element.msRequestFullscreen) {
			element.msRequestFullscreen();
		  }
		  $(window).blur(function(event) {
			  console.log('adios');
		  });
		  if($(this).attr('data-historial-id') == 0) {
			  $(this).text('Continuar con el cuestionario');
			  var $historialForm = $('#HistorialAddForm');
			  console.log($historialForm.attr('action'));
			  $.ajax({
				  type: "POST",
				  dataType: "json",
				  url: $historialForm.attr('action'),
				  data:  $historialForm.serialize(),
				  success: function(data, status, jqXHR ) {
					$btnIniciarHistorial.attr('data-historial-id',data.Historial.id);
				  }
			});//end ajax
	      }
		  event.preventDefault();
	});
});

/*
 * Script Juego jugar
 */
var index = 0;

/*
 *
 */
$(function() {
	$('#numPreguntas').text(preguntas.length);
	$tablero = $('#tablero');
	$tablero.fadeOut();
	var $barra = $('#barra-proceso');
	$('#mostrarPregunta').submit(
		function (event) {
			var numPreguntas = preguntas.length;
			var preguntasContestadas = parseInt($('#preguntaActual').text());
			// Se encarga de encontrar de forma aleatoria una pregunta no contestada
			var key;
			do {
				key = getRandomInt(0, numPreguntas -1);
				//key = index++;
			} while(preguntas[key].contestada == true);
			if (preguntas[key].contestada == false) {
					$('#pregunta-titulo')
						.html(preguntas[key].pregunta)
						.attr('data-pregunta-key', key);
					//Borramos y creamos la lista de respuestas.
					var $listaRespuestas = $('#pregunta-respuestas');
					$listaRespuestas.find('li').remove();
					$.each(preguntas[key].respuestas, function(i, respuesta) {
						var li = "<li id='item-"+(i+1)+"' data-valida='"+respuesta.valida+"'>"
							+respuesta.txt+"</li>";
						$listaRespuestas.append(li);
					});
					preguntas[key].contestada = true;
			}

			++preguntasContestadas;
			$('#preguntaActual').text(preguntasContestadas);
			if (preguntasContestadas == numPreguntas) {
				$('#mostrarPregunta button')
					.removeClass('btn-primary')
					.addClass('disabled ')
					.attr('disabled', 'true');
				//
				$('#HistorialCuestionarioId').val($('#btn-iniciar-historial').attr('data-historial-id'));
				$('#HistorialAciertos').val($('#numRespuestasCorrectas').text());
				$('#HistorialData').val(JSON.stringify(preguntas));
				$('#HistorialFinalizarForm').submit();
				/*
				$.ajax({
				  type: "POST",
				  dataType: "json",
				  url: $('#HistorialFinalizarForm').attr('action'),
				  data:  {
					  id: $('#btn-iniciar-historial').attr('data-historial-id'),
					  aciertos: ,
					  preguntas: 
				  },
				  success: function(data, status, jqXHR ) {
					console.log(data);
				  }
				});//end ajax */
			}
			$tablero.fadeIn();
			event.preventDefault();
			mostrarTablero();
			actualizarFicha();
		}
	);
	$('#pregunta-respuestas').on('click', 'li', function(event) {
		// Click sobre una respuesta
	});
	///
	$('div#tablero ol#pregunta-respuestas').on('click', 'li', function(event) {
		event.preventDefault();
		$(this).toggleClass('activo');
	});
	///
});
//////////////////////
$(function() {
	// Handler for .ready() called.
	$('#btn-responder').click(function() {
			ocultarTablero();
	});
});
//////////////////////

function validarRespuesta() {
	error = false;
	var key = $('#pregunta-titulo').attr('data-pregunta-key');
	$('#pregunta-respuestas li').each(function() {
			$li = $(this);
			if ($li.attr('data-valida') == "true") {
			if(!$li.hasClass('activo')) {
					error =  true;
				}
			} else {
				if($li.hasClass('activo')) {
						error =  true;
					}
				}
			});
			if(error) {
				preguntas[key].correcta = false;
			} else {
				preguntas[key].correcta = true;
			}
}

function ocultarTablero() {
	actualizarBarra(100);
	validarRespuesta();
	$('#tablero').fadeOut();
	var numCorrectas = 0, numIncorrectas = 0;
	$.each(preguntas, function(i, pregunta) {
		if(typeof pregunta.correcta !== 'undefined') {
			if (pregunta.correcta) {
				numCorrectas++;
			} else {
				numIncorrectas++;
			}
		}
	});
	$('#numRespuestasCorrectas').text(numCorrectas);
	$('#numRespuestasIncorrectas').text(numIncorrectas);
	$('#mostrarPregunta').fadeIn();
}

function mostrarTablero() {
	actualizarBarra(0);
	$('#tablero').fadeIn();
	$('#mostrarPregunta').fadeOut();
}

function actualizarBarra(proceso) {
	if (proceso < 0 || proceso > 100) {
		return;
	}
	var $barra = $('#barra-proceso');
	$barra.attr('aria-valuenow', proceso);
	$barra.css('width', proceso + '%');
}

function actualizarFicha() {
	var $barra = $('#barra-proceso');
	var ancho = $barra.attr('aria-valuenow');
	//console.log('Ancho' +ancho );
	if(ancho < 100) {
		ancho++;
		actualizarBarra(ancho);
		setTimeout('actualizarFicha()', 200);
	} else {
		ocultarTablero();
	}
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
