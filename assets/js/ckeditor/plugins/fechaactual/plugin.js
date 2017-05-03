CKEDITOR.plugins.add( 'fechaactual', {
    icons: 'fechaactual',
    init: function( editor ) {
			editor.addCommand( 'insertFechaactual', {
			    exec: function( editor ) {
			        editor.insertHtml( '$FECHAACTUAL$');
			    }
			});
			editor.ui.addButton( 'fechaactual', {
			    label: 'Fecha actual',
			    command: 'insertFechaactual',
			    toolbar: 'insert'
			});
    }
});