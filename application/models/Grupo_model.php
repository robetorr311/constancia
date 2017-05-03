<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupo_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    public function grupos() {

        $consulta = $this->db->get('sys_intranet_admin.grupo');
        return $consulta->result();
    }

    public function grupo_guardar($nombre, $descripcion, $areas) {

        $datos = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        );
        $this->db->insert('sys_intranet_admin.grupo', $datos);
        $id = $this->db->insert_id();

        if (!empty($areas)) {
            foreach ($areas as $item) {

                $datos = array(
                    'harea' => $item,
                    'hgrupo' => $id);
                $this->db->insert('sys_intranet_admin.grupo_area', $datos);
            }
        }
    }

    public function grupo_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get('sys_intranet_admin.grupo');
        return $consulta->row();
    }

    public function areas($id) {

        $this->db->where('grp_id', $id);
        $consulta = $this->db->get('sys_intranet_admin.v_grupo_area');
        return $consulta->result();
    }

    public function grupo_editar_guardar($nombre, $id, $descripcion) {

        $datos = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion);
        $this->db->where('id', $id);
        $this->db->update('sys_intranet_admin.grupo', $datos);
    }

    function eliminar_grupo($id) {

        $this->db->where('id', $id);
        $this->db->delete('sys_intranet_admin.grupo');
    }

    public function agregar_area($id, $areas) {

        foreach ($areas as $item) {

            $datos = array(
                'harea' => $item,
                'hgrupo' => $id);
            $this->db->insert('sys_intranet_admin.grupo_area', $datos);
        }
    }

    public function eliminar_area($areas) {

        foreach ($areas as $item) {

            $this->db->where('id', $item);
            $this->db->delete('sys_intranet_admin.grupo_area');
        }
    }

        public function grupos_usuario($id) {

        $this->db->where('husuario', $id);
        $this->db->select('usuario_grupo.id, grupo.id as id_grupo, nombre, descripcion');
        $this->db->join('sys_intranet_admin.grupo', 'hgrupo = grupo.id');
        $consulta = $this->db->get('sys_intranet_admin.usuario_grupo');
        return $consulta->result();
    }
}
