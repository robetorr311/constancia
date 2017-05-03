CKEDITOR.plugins.add( 'conceptos', {
    icons: 'conceptos',
    init: function( editor ) {
			editor.addCommand( 'insertConceptos', {
			    exec: function( editor ) {
			        editor.insertHtml( '$CONCEPTOSYSALARIOS$');
			    }
			});
			editor.ui.addButton( 'conceptos', {
			    label: 'conceptos',
			    command: 'insertConceptos',
			    toolbar: 'insert'
			});
    }
});