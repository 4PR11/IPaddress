function setPagination(table){
	$(document).ready(function() {
	    $(table).DataTable( {
	    	"ordering": false,
	    	"bPaginate": false,
	    	"sDom": '<fi><"#clear"><t><prl>',
	    	"bAutoWidth": true,
	        "language": {
		        "search": "Поиск:",
	            "lengthMenu": "Выводить _MENU_ записей на страницу",
	            "zeroRecords": "Ничего не найдено, извините",
	            "info": "Показано страниц _PAGE_ из _PAGES_",
	            "infoEmpty": "Нет данных",
	            "infoFiltered": "(фильтр по _MAX_ кол-ву записей)",
	            "paginate": {
				"first": "Первая",
				"previous": "Предыдущая",
				"next": "Следующая",
				"last": "Последняя"
				}
	        }
	    } );
	} );
}