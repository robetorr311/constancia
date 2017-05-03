CKEDITOR.plugins.add( 'anio', {
    icons: 'anio',
    init: function( editor ) {
			editor.addCommand( 'insertAnio', {
			    exec: function( editor ) {
			        editor.insertHtml( '$ANIO$');
			    }
			});
			editor.ui.addButton( 'anio', {
			    label: 'Tiempo de Servicio',
			    command: 'insertAnio',
			    toolbar: 'insert'
			});
    }
});