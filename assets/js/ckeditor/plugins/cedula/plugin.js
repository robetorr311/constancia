CKEDITOR.plugins.add( 'cedula', {
    icons: 'cedula',
    init: function( editor ) {
			editor.addCommand( 'insertCedula', {
			    exec: function( editor ) {
			        editor.insertHtml( '$CEDULA$');
			    }
			});
			editor.ui.addButton( 'cedula', {
			    label: 'Cedula',
			    command: 'insertCedula',
			    toolbar: 'insert'
			});
    }
});