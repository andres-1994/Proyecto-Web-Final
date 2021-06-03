//confirmar eliminar elemento marcado con checkbox
function confirmacion(e){

	if (confirm("Está seguro que desea eliminar este registro?")) {
		
		return true;
		
	}else {
		e.preventDefault();
	}
}

let linkDelete = document.querySelectorAll(".link-operacion");

for(var i = 0;  i< linkDelete.length; i++){

	linkDelete[i].addEventListener('click', confirmacion);
}

// Script para saber si nos quedamos sin internet
const alert = document.getElementById('alert')

addEventListener('online', (e) => {

	setAlert(1)
})

addEventListener('offline', (e) => {

	setAlert(0)
})

const setAlert = (status) => {
	
	alert.classList.remove('alert-online')

	alert.classList.remove('alert-offline')

	status === 0 ?
		setTimeout(() => {

			alert.textContent = "Error de Conexion: Sin Internet!"
			alert.classList.add('alert--offline')
		}, 100):
		setTimeout(() => {

			alert.textContent = "Conexion a Internet segura!"
			alert.classList.add('alert--online')
		}, 100)
}

/*=============================================
             SCRIPT DE DATATABLE
=============================================*/
$(document).ready(function() {
		var t = $('#mi-tabla').DataTable({
				"columnDefs":[{
					"targets": [1,8],
					"orderable": false
				}],
				"responsive":true,
				"select": true,
				"dom": 'Blfrtip',
				"buttons":[
					{
						extend:    'excelHtml5',
                		text:      '<i class="fas fa-file-excel" style="color: green;"></i> ',
                		titleAttr: 'Exportar a Excel',
                		className: 'btn btn-success'
					},
					{
						extend:    'pdfHtml5',
                		text:      '<i class="fas fa-file-pdf" style="color: red;"></i> ',
               			titleAttr: 'Exportar a PDF',
                		className: 'btn btn-danger'	
					},
					{
						extend:    'print',
                		text:      '<i class="fa fa-print" style="color: blue;"></i> ',
                		titleAttr: 'Imprimir',
                		className: 'btn btn-info'
					}
				],
				"language": {
					"select":{
						rows:{
							_: "%d filas seleccionadas",
							1: "1 fila seleccionada"
						}
					},
					"search": "Buscar:",
					"lengthMenu": "Mostrar _MENU_ registros por página",
					"zeroRecords": "No se encontraron resultados",
					"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"infoFiltered": "(filtrado de un total de _MAX_ registros)",
					"infoEmpty": "No hay registros con esos datos",
					"emptyTable": "No existe registros en la tabla",
					"paginate": {
						"first":      "Primero",
						"last":       "Ultimo",
						"next":       "Siguiente",
						"previous":   "Anterior"
					}
				},
				"lengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "Todo"]],
				"pagingType": "full_numbers"
			});

		t.on( 'order.dt search.dt', function () {
				t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1;
				} );
		} ).draw();
});
/*=====  SCRIPT DE DATATABLES ======*/
