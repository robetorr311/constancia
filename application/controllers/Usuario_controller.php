<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_controller extends MY_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('Usuario_model');
        $this->load->model('Grupo_model');
    }

    public function index() {

        if (!$this->validate_access())
            return;

        $this->load->library('Template_table');

// Datos para llenar la tabla basica
        $resultset = $this->Usuario_model->usuarios();
        $controller = get_class();
        $titulo = 'Lista de Grupos';
        $table_headers = array(
            array("nombre", "Nombre", ""),
            array("apellido", "Apellido", ""),
            array("email", "Email", ""),
            array("usuario", "Usuario", "")
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

    public function ver($id = null) {

        if (!$this->validate_access())
            return;

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Usuario_model->usuario_ver($id);
            $consulta['grupos'] = $this->Grupo_model->grupos_usuario($id);
        } else {
            $consulta['consulta'] = "";
        }
        $this->add_view('usuario_ver', $consulta);
        $this->render();
    }

    public function nuevo() {

        if (!$this->validate_access())
            return;

        $this->load->library('form_validation');
        $consulta['grupos'] = $this->Grupo_model->grupos();
        $this->add_view('usuario_nuevo', $consulta);
        $this->render();
    }

    public function nuevo_guardar() {

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div>', '</div>');
        if ($this->form_validation->run('usuario_nuevo') == FALSE) {
            $this->nuevo();
        } else {

            $usuario = $this->input->post('usuario');
            $password = md5($this->input->post('password1'));
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $correo = $this->input->post('correo');
            $grupos = $this->input->post('grupos');

            $this->Usuario_model->nuevo_guardar($usuario, $password, $nombre, $apellido, $correo, $grupos);
            $this->session->set_flashdata('data', $usuario . ' Ha sido añadida a la base de datos.');
            redirect('usuario_controller/index');
        }
    }

    public function password() {

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        if ($password1 != $password2) {
            $this->form_validation->set_message('password', 'Las contraseñas no coinciden.');
            return FALSE;
        }
    }

    public function usuario($usuario) {

        if ($this->Usuario_model->usuario($usuario)) {
            $this->form_validation->set_message('usuario', 'El nombre de usuario ' . $usuario . ' ya existe en la base de datos.');
            return FALSE;
        }
    }

    public function correo($correo) {

        if ($this->Usuario_model->correo($correo)) {
            $this->form_validation->set_message('correo', 'El correo ' . $correo . ' ya existe en la base de datos.');
            return FALSE;
        }
    }

    public function editar($id = NULL) {

        if (!$this->validate_access())
            return;

        $this->load->library('form_validation');

        if (is_numeric($id)) {
            $consulta['consulta'] = $this->Usuario_model->usuario_ver($id);
            $consulta['grupos'] = $this->Grupo_model->grupos_usuario($id);
            $consulta['l_grupos'] = $this->Grupo_model->grupos();
        } else {
            $consulta['consulta'] = "";
        }

        $this->add_view('usuario_editar', $consulta);
        $this->render();
    }

    public function editar_guardar() {

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div>', '</div>');
        if ($this->form_validation->run('usuario_editar') == FALSE) {
            $id = $this->input->post('id');
            $this->editar($id);
        } else {

            $id = $this->input->post('id');
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password1');
            if (!empty($password)) {
                $password = md5($password);
            }
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $estatus = $this->input->post('estatus');
            $this->Usuario_model->editar_guardar($id, $password, $nombre, $apellido, $estatus);
            $this->session->set_flashdata('data', $usuario . ' Ha sido actualizado.');
            redirect('usuario_controller/index');
        }
    }

    public function agregar_grupos_usuario() {


        $id = $this->input->post('id');
        $grupos = $this->input->post('grupos');

        $this->Usuario_model->agregar_grupos_usuario($id, $grupos);
        redirect('usuario_controller/editar/' . $id);
    }

    public function eliminar_grupos_usuario() {

        $id = $this->input->post('id');
        $grupos = $this->input->post('grupos');

        $this->Usuario_model->eliminar_grupos_usuario($grupos);
        redirect('usuario_controller/editar/' . $id);
    }

    public function borrar($id) {

        if (!$this->validate_access())
            return;

        $this->Usuario_model->desactivar_usuario($id);
        redirect('usuario_controller/index');
    }

}
