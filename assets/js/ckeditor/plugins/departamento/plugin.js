CKEDITOR.plugins.add( 'departamento', {
    icons: 'departamento',
    init: function( editor ) {
			editor.addCommand( 'insertDepartamento', {
			    exec: function( editor ) {
			        editor.insertHtml( '$DEPARTAMENTO$');
			    }
			});
			editor.ui.addButton( 'departamento', {
			    label: 'Departamento',
			    command: 'insertDepartamento',
			    toolbar: 'insert'
			});
    }
});