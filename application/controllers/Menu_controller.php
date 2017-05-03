<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    public function index() {

        if (!$this->validate_access())
            return;

        $this->load->library('Template_table');

// Datos para llenar la tabla basica
        $resultset = $this->Menu_model->menus();
        $controller = get_class();
        $titulo = 'Lista de Menu';
        $table_headers = array(
            array("id", "Id", ""),
            array("titulo", "Titulo", "")
        );

        /* metodo , tooltip , color del boton , icono */
        $table_button = array(
            array("ver", "Ver", "btn-default", "glyphicon glyphicon-eye-open"),
            array("editar", "Editar", "btn-default", "glyphicon glyphicon-pencil"),
            array("borrar", "Eliminar", "btn-danger", "glyphicon glyphicon-trash")
        );

        /* metodo , tooltip , color del boton , icono */
        $header_button = array(
            array("nuevo", "Nuevo", "btn-primary", "glyphicon glyphicon-plus")
        );

        $this->add_view('mensaje_guardar');
        $vista = $this->template_table->basic_table($resultset, $table_headers, $table_button, $header_button, $titulo, $controller);
        $this->add_html($vista);
        $this->render();
    }

    public function nuevo() {

        if (!$this->validate_access())
            return;

        $this->load->helper('types_helper');

        $id_sistema = $this->input->post('id_sistema');
        $consulta['bloqueo'] = 0;

        if (!empty($id_sistema)) {
            $consulta['bloqueo'] = 1;
            $consulta['menus'] = $this->Menu_model->menus();
            $consulta['menus_padres'] = $this->Menu_model->menus_padres();
            $consulta['metodos'] = $this->Menu_model->metodos();
            $consulta['id_sistema'] = $id_sistema;
        }


        $consulta['sistemas'] = $this->Menu_model->sistemas();
        $consulta['areas'] = $this->Menu_model->areas();
        $this->add_view('menu_nuevo', $consulta);
        $this->render();
    }

    public function variable_nula($variable) {

        if (empty($variable)) {
            $variable = NULL;
        }

        return $variable;
    }

    public function nuevo_guardar() {

        $titulo = $this->input->post('titulo');
        $descripcion = $this->variable_nula($this->input->post('descripcion'));
        $icono = $this->variable_nula($this->input->post('icono'));
        $url = $this->variable_nula($this->input->post('url'));
        $orden = $this->variable_nula($this->input->post('orden'));
        $hpadre = $this->variable_nula($this->input->post('hpadre'));
        $harea = $this->variable_nula($this->input->post('harea'));
        $id_sistema = $this->input->post('id_sistema');

        $this->Menu_model->nuevo_guardar($titulo, $descripcion, $icono, $url, $orden, $hpadre, $harea, $id_sistema);
        $this->session->set_flashdata('data', $titulo . ' Ha sido añadida a la base de datos.');
        redirect('menu_controller/index');
    }

    public function ver($id = null) {

        if (!$this->validate_access())
            return;

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Menu_model->menu_ver($id);
            $consulta['padre'] = $this->Menu_model->menu_ver($consulta['consulta']->hpadre);
            $consulta['metodo'] = $this->Menu_model->metodo($consulta['consulta']->harea);
        } else {
            $consulta['consulta'] = "";
        }
        $this->add_view('menu_ver', $consulta);
        $this->render();
    }

    public function editar($id = null) {

        if (!$this->validate_access())
            return;

        $this->load->helper('types_helper');

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Menu_model->menu_ver($id);
            $consulta['menus_padres'] = $this->Menu_model->menus_padres();
            $consulta['metodos'] = $this->Menu_model->metodos();
        } else {
            $consulta['consulta'] = "";
        }
        $this->add_view('menu_editar', $consulta);
        $this->render();
    }

    public function editar_guardar() {

        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $descripcion = $this->variable_nula($this->input->post('descripcion'));
        $icono = $this->variable_nula($this->input->post('icono'));
        $url = $this->variable_nula($this->input->post('url'));
        $orden = $this->variable_nula($this->input->post('orden'));
        $hpadre = $this->variable_nula($this->input->post('hpadre'));
        $harea = $this->input->post('harea');
        $id_area = $this->variable_nula($this->input->post('id_area'));

        //la tabla donde se seleccion el area tiene un error, si se cambia la pagina donde se selecciono el area,
        //no tomara el valor y lo dejara como nulo, si esta vacio se le asigna el valor que peseia antes.
        if (empty($harea)) {
            $harea = $id_area;
        }

        $this->Menu_model->editar_guardar($id, $titulo, $descripcion, $icono, $url, $orden, $hpadre, $harea);
        $this->session->set_flashdata('data', $titulo . ' Ha sido actualizado.');
        redirect('menu_controller/index');
    }

    public function borrar($id) {

        if (!$this->validate_access())
            return;

        $this->Menu_model->eliminar_menu($id);
        redirect('menu_controller/index');
    }

}
