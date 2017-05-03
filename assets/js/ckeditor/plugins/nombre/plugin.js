CKEDITOR.plugins.add( 'nombre', {
    icons: 'nombre',
    init: function( editor ) {
			editor.addCommand( 'insertNombre', {
			    exec: function( editor ) {
			        editor.insertHtml( '$NOMBRE$');
			    }
			});
			editor.ui.addButton( 'nombre', {
			    label: 'Nombre',
			    command: 'insertNombre',
			    toolbar: 'insert'
			});
    }
});
