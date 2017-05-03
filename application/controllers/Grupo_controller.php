<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupo_controller extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Grupo_model');
        $this->load->model('Area_model');
    }

    public function index() {
        
if (!$this->validate_access())
 return;

        $this->load->library('Template_table');

// Datos para llenar la tabla basica
        $resultset = $this->Grupo_model->grupos();
        $controller = get_class();
        $titulo = 'Lista de Grupos';
        $table_headers = array(
            array("nombre", "Nombre",""),
            array("descripcion", "Descripcion","")
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
            $consulta['consulta'] = $this->Grupo_model->grupo_ver($id);
            $consulta['areas'] = $this->Grupo_model->areas($id);
        } else {
            $consulta['consulta'] = "";
        }
        $this->add_view('grupo_ver', $consulta);
        $this->render();
    }

    public function nuevo() {

        if (!$this->validate_access())
            return;
        
        $consulta['consulta'] = $this->Area_model->areas_final();
        $this->add_view('grupo_nuevo', $consulta);
        $this->render();
    }

    public function nuevo_guardar() {

        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $areas = $this->input->post('areas');

        $this->Grupo_model->grupo_guardar($nombre, $descripcion, $areas);
        $this->session->set_flashdata('data', $nombre . ' Ha sido añadida a la base de datos.');
        redirect('grupo_controller/index');
    }

    public function editar($id = NULL) {

        if (!$this->validate_access())
            return;

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Grupo_model->grupo_ver($id);
            $consulta['areas'] = $this->Grupo_model->areas($id);
            $consulta['l_areas'] = $this->Area_model->areas_final();
        } else {
            $consulta['consulta'] = "";
        }

        $this->add_view('grupo_editar', $consulta);
        $this->render();
    }

    public function editar_guardar() {


        $id = $this->input->post('id');
        $descripcion = $this->input->post('descripcion');
        $nombre = $this->input->post('nombre');

        $this->Grupo_model->grupo_editar_guardar($nombre, $id, $descripcion);
        $this->session->set_flashdata('data', 'Se han actualizado los registros de ' . $nombre . '.');
        redirect('grupo_controller/index');
    }

    public function agregar_area() {


        $id = $this->input->post('id');
        $areas = $this->input->post('areas');

        $this->Grupo_model->agregar_area($id, $areas);
        redirect('grupo_controller/editar/' . $id);
    }

    public function eliminar_area() {

        $id = $this->input->post('id');
        $areas = $this->input->post('areas');

        $this->Grupo_model->eliminar_area($areas);
        redirect('grupo_controller/editar/' . $id);
    }

    public function borrar($id) {

        if (!$this->validate_access())
            return;

        $this->Grupo_model->eliminar_grupo($id);
        redirect('grupo_controller/index');
    }

}
