<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_controller extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Area_model');
    }

    public function index() {

        if (!$this->validate_access())
            return;

        $this->load->library('Template_table');

// Datos para llenar la tabla basica
        $resultset = $this->Area_model->areas();
        $controller = get_class();
        $titulo = 'Lista de Areas';
        $table_headers = array(
            array("espacio", "Nombre", ""),
            array("ruta", "Ruta", ""),
            array("id_padre", "Id Padre", ""),
            array("id", "Id", "")
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
        $vista = $this->template_table->basic_table($resultset, $table_headers, $table_button,$header_button, $titulo, $controller);
        $this->add_html($vista);
        $this->render();
    }

    public function ver($id = null) {

        if (!$this->validate_access())
            return;

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Area_model->area_ver($id);
        } else {
            $consulta['consulta'] = "";
        }
        $this->add_view('area_ver', $consulta);
        $this->render();
    }

    public function nuevo() {

        if (!$this->validate_access())
            return;

        $consulta['consulta'] = $this->Area_model->padres();
        $this->add_view('area_nuevo', $consulta);
        $this->render();
    }

    public function nuevo_guardar() {

        $nombre = $this->input->post('nombre');
        $hpadre = $this->input->post('hpadre');
        $this->Area_model->area_guardar($nombre, $hpadre);
        $this->session->set_flashdata('data', $nombre . ' Ha sido añadida a la base de datos.');
        redirect('area_controller/index');
    }

    public function editar($id = NULL) {

        if (!$this->validate_access())
            return;

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Area_model->area_ver($id);
            $consulta['padres'] = $this->Area_model->padres();
        } else {
            $consulta['consulta'] = "";
        }

        $this->add_view('area_editar', $consulta);
        $this->render();
    }

    public function editar_guardar() {

        $id = $this->input->post('id');
        $hpadre = $this->input->post('hpadre');
        $nombre = $this->input->post('nombre');

        $this->Area_model->area_editar_guardar($nombre, $id, $hpadre);
        $this->session->set_flashdata('data', 'Se han actualizado los registros de ' . $nombre . '.');
        redirect('area_controller/index');
    }

    public function borrar($id) {

        if (!$this->validate_access())
            return;

        $this->Area_model->eliminar_area($id);
        redirect('area_controller/index');
    }

}
