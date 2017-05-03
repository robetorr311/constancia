<?php

class Usuario_model extends CI_Model {

    public $tbl_name = 'sys_intranet_admin.usuario';

    public function __construct() {
        parent:: __construct();
    }

    public function get($usr) {
        return $this->db
                        ->where('usuario', $usr)
                        ->get($this->tbl_name);
    }

    public function is_valid($usuario, $clave) {
        $this->db->where('usuario', $usuario);
        $consulta = $this->db->get($this->tbl_name);

        if ($consulta->num_rows() > 0) {
            $consulta = $consulta->row();
            if ($consulta->clave == $clave) {
                if ($consulta->estatus == 0) {
                    $this->session->set_flashdata('data', 'Usuario bloqueado.');
                    return FALSE;
                } else {
                    $this->session->set_userdata('usr_id', $consulta->id);
                    $this->session->set_userdata('usr_usuario', $consulta->usuario);
                    return TRUE;
                }
            } else {
                $this->session->set_flashdata('data', 'Contraseña Incorrecta.');
                return FALSE;
            }
        } else {
            $this->session->set_flashdata('data', 'Usuario Incorrecto.');
            return FALSE;
        }
    }

    public function is_super($usr_id)
    {
		$cond = array(
            'id' => $usr_id,
        );
		$objUsuario = $this->db
		->where($cond)
		->get('sys_intranet_admin.usuario')
		->row();

		if ($objUsuario->super)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

    public function has_access($usr_id, $ruta = array()) {

		//  Si es un SuperUsuario no se valida nada más.
		if($this->is_super($usr_id))
		{
			return TRUE;
		}

		// FIXME: Este proceso de concatenar con un recorrido foreach
		// no parece ser algo optimo.
        $r = '{';
        foreach ($ruta as $item) {
            $r .= ($r != '{') ? ',' : '';
            $r .= strtolower($item);
        }
        $r .= '}';

        $cond = array(
            'usr_id' => $usr_id,
            'rut_ruta' => $r,
        );
        $resultado = $this->db->where($cond)->get('sys_intranet_admin.v_usuario_area');

        if ($resultado->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function usuarios() {

        $consulta = $this->db->get('sys_intranet_admin.usuario');
        return $consulta->result();
    }

    function correo($correo) {

        $consulta = $this->db->get_where('sys_intranet_admin.usuario', array('email' => $correo));
        if ($consulta->num_rows() > 0) {
            return TRUE;
        }
    }

        function usuario($usuario) {

        $consulta = $this->db->get_where('sys_intranet_admin.usuario', array('usuario' => $usuario));

        if ($consulta->num_rows() > 0) {
            return TRUE;
        }
    }
    
    function nuevo_guardar($usuario, $password, $nombre, $apellido, $correo, $grupos) {

        $datos = array(
            'usuario' => $usuario,
            'clave' => $password,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $correo,
            'estatus' => 1);

        $this->db->insert('sys_intranet_admin.usuario', $datos);
        $id = $this->db->insert_id('sys_intranet_admin.usuario_id_seq');

        if (!empty($grupos)) {
            foreach ($grupos as $item) {

                $datos = array(
                    'hgrupo' => $item,
                    'husuario' => $id);
                $this->db->insert('sys_intranet_admin.usuario_grupo', $datos);
            }
        }
    }

    public function usuario_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get('sys_intranet_admin.usuario');
        return $consulta->row();
    }

    public function agregar_grupos_usuario($id, $grupos) {

        foreach ($grupos as $item) {

            $datos = array(
                'hgrupo' => $item,
                'husuario' => $id);
            $this->db->insert('sys_intranet_admin.usuario_grupo', $datos);
        }
    }

    public function eliminar_grupos_usuario($grupos) {

        foreach ($grupos as $item) {

            $this->db->where('id', $item);
            $this->db->delete('sys_intranet_admin.usuario_grupo');
        }
    }

    function editar_guardar($id, $password, $nombre, $apellido, $estatus) {

        if (empty($password)) {
            $datos = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'estatus' => $estatus);
        } else {
            $datos = array(
                'clave' => $password,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'estatus' => $estatus);
        }
        $this->db->where('id', $id);
        $this->db->update('sys_intranet_admin.usuario', $datos);
    }

    public function desactivar_usuario($id) {

        $datos = array(
            'estatus' => 0);

        $this->db->where('id', $id);
        $this->db->update('sys_intranet_admin.usuario', $datos);
    }

}
