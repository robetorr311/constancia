CKEDITOR.plugins.add( 'cargofirmante', {
    icons: 'cargofirmante',
    init: function( editor ) {
			editor.addCommand( 'insertCargofirmante', {
			    exec: function( editor ) {
			        editor.insertHtml( '$CARGOFIRMANTE$');
			    }
			});
			editor.ui.addButton( 'cargofirmante', {
			    label: 'Cargo Firmante',
			    command: 'insertCargofirmante',
			    toolbar: 'insert'
			});
    }
});