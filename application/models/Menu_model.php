<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function menus() {

        $consulta = $this->db->get('sys_intranet_admin.menuitem');
        return $consulta->result();
    }

    public function menus_padres() {

        $this->db->where('hpadre IS NULL');
        $consulta = $this->db->get('sys_intranet_admin.menuitem');
        return $consulta->result();
    }

    public function areas() {

        $this->db->where('array_length(ruta, 1) = 1');
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function sistemas() {

        $this->db->where('array_length(ruta, 1) = 2');
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function metodos() {

        $this->db->where('array_length(ruta, 1) = 4');
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function nuevo_guardar($titulo, $descripcion, $icono, $url, $orden, $hpadre, $harea, $id_sistema) {

        $datos = array(
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'icono' => $icono,
            'url' => $url,
            'orden' => $orden,
            'hpadre' => $hpadre,
            'harea' => $harea,
            'idsistema' => $id_sistema
        );

        $this->db->insert('sys_intranet_admin.menuitem', $datos);
    }

    public function editar_guardar($id, $titulo, $descripcion, $icono, $url, $orden, $hpadre, $harea) {

        $datos = array(
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'icono' => $icono,
            'url' => $url,
            'orden' => $orden,
            'hpadre' => $hpadre,
            'harea' => $harea,
        );

        $this->db->where('id', $id);
        $this->db->update('sys_intranet_admin.menuitem', $datos);
    }

    public function menu_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get('sys_intranet_admin.menuitem');
        return $consulta->row();
    }

    public function metodo($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->row();
    }

    function eliminar_menu($id) {

        $this->db->where('id', $id);
        $this->db->delete('sys_intranet_admin.menuitem');
    }
}
