CKEDITOR.plugins.add( 'cargo', {
    icons: 'cargo',
    init: function( editor ) {
			editor.addCommand( 'insertCargo', {
			    exec: function( editor ) {
			        editor.insertHtml( '$CARGO$');
			    }
			});
			editor.ui.addButton( 'cargo', {
			    label: 'Cargo',
			    command: 'insertCargo',
			    toolbar: 'insert'
			});
    }
});