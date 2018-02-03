$("document").ready(function(){

	// Ejemplo Datatable [poner clase a la tabla, se debe hacer una funcion por tabla].

	$('#dataTable').DataTable({
		// "order": [[ 0, "desc" ]]
		"ordering": false,
		"pageLength": 50
	});	

	// Ejemplo Datepicker [poner clase a input, se puede limitar mediante los parametros]

	$( function() {
		$( ".fecha" ).datepicker({
			dateFormat: 'dd-mm-yy'//, 
			// minDate: -5, 
			//maxDate: "+0D"
		});
	});	


	// Configuracion meses datepicker.

	$.datepicker.regional['es'] = {
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mc', 'Ju', 'Vi', 'Sa']
	}

	$.datepicker.setDefaults($.datepicker.regional['es']);

	// Colapsa menu bootstrap.

	/*

	$(document).on('click','.navbar-collapse.in',function(e) {
		if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
			$(this).collapse('hide');
		}
	});	

	*/

	// Obtiene todos los  datos del formulario serializados.  [ var parametros = datosForm("#id-form") ]

	function datosForm(idForm) {
	    var datos = $(idForm).serializeArray(),
	           res = {};

	    $.each(datos, function(i, v) {
	        res[v.name] = v.value;
	    });

	    return res;
	} 

});

// Ejemplo Autocomplete. [cambiar la ruta del proceso]

$( function() {
	$( ".autocomplete1" ).autocomplete({
	  source: 'procesar_autocompletado.php'
	});
});    

$( ".autocomplete1" ).autocomplete({ autoFocus: true });
$( ".autocomplete1" ).autocomplete({ minLength: 2 });	
