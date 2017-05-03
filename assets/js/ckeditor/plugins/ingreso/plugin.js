CKEDITOR.plugins.add( 'ingreso', {
    icons: 'ingreso',
    init: function( editor ) {
			editor.addCommand( 'insertIngreso', {
			    exec: function( editor ) {
			        editor.insertHtml( '$FECHADEINGRESO$');
			    }
			});
			editor.ui.addButton( 'ingreso', {
			    label: 'Ingreso',
			    command: 'insertIngreso',
			    toolbar: 'insert'
			});
    }
});