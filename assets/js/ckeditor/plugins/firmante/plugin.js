CKEDITOR.plugins.add( 'firmante', {
    icons: 'firmante',
    init: function( editor ) {
			editor.addCommand( 'insertFirmante', {
			    exec: function( editor ) {
			        editor.insertHtml( '$FIRMANTE$');
			    }
			});
			editor.ui.addButton( 'firmante', {
			    label: 'Firmante',
			    command: 'insertFirmante',
			    toolbar: 'insert'
			});
    }
});