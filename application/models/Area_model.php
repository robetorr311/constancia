<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
        $this->table_name = 'sys_intranet_admin.area';
    }

    public function get($id)
    {
        return $this->db->where('id', $id)->get($this->table_name);
    }

    public function areas() {

        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function areas_final() {

        $this->db->where('array_length(ruta, 1) = 4');
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function padres() {

        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->result();
    }

    public function area_guardar($nombre, $hpadre) {

        $datos = array(
            'nombre' => $nombre,
            'hpadre' => $hpadre,
        );

        $this->db->insert('sys_intranet_admin.area', $datos);
    }

    public function area_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get('sys_intranet_admin.v_area_ruta');
        return $consulta->row();
    }

    public function area_editar_guardar($nombre, $id, $hpadre) {

        $datos = array(
            'nombre' => $nombre,
            'hpadre' => $hpadre);
        $this->db->where('id', $id);
        $this->db->update('sys_intranet_admin.area', $datos);
    }

    function eliminar_area($id) {

        $this->db->where('id', $id);
        $this->db->delete('sys_intranet_admin.area');
    }

}
