<?php
class Usuarios extends MY_Controller {
   function index(){
		$this->load->model('constancias/Usuarios_model');	   
   	    $data['usuario']=$this->Usuarios_model->select();	   
		$this->add_view('constancias/usuario',$data);
		$data['retorno']=$this->Usuarios_model->listados(0,1);
		$this->add_view('constancias/listado_usuario_view',$data);			
		$this->render();
	}
	function guardar(){
		$usuario=$this->input->post('usuario');
		if($usuario==='0'){
			$this->load->model('constancias/Usuarios_model');	   
	   	    $data['usuario']=$this->Usuarios_model->select();	   
			$this->add_view('constancias/usuario',$data);
			$data['retorno']=$this->Usuarios_model->listados(0,1);
			$this->add_view('constancias/listado_usuario_view',$data);			
			$this->render();
		}
		else {
			$data['usuario']=$usuario;
			$this->load->model('constancias/Usuarios_model');
			$nombre = $this->Usuarios_model->nombreusuario($usuario);										
			$this->Usuarios_model->guardar($usuario,$nombre);	
			$this->add_view('constancias/usuario_agregado');
			$data['retorno']=$this->Usuarios_model->listados(0,1);
			$this->add_view('constancias/listado_usuario_view',$data);				
			$this->render();			
		}
	}
	function eliminar(){
			$id=$this->input->post('id');		
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Usuarios_model');
			$this->Usuarios_model->eliminar($id);			
			$data['retorno']=$this->Usuarios_model->listados(0,1);
			$this->load->view('constancias/usuario_contenido_listado',$data);
	}	
	function adelante(){
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Usuarios_model');
			$data['retorno']=$this->Usuarios_model->listados($inicio,1);
			$this->load->view('constancias/usuario_contenido_listado',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Usuarios_model');
			$data['retorno']=$this->Usuarios_model->listados($inicio,0);
			$this->load->view('constancias/usuario_contenido_listado',$data);
	}	


	function centro ($asunto){
		if (empty($asunto)) {
			return false;
		} 
		else {
			return true;
		}	
	}
	function usuario ($asunto){
		if (empty($asunto)) {
			return false;
		} 
		else {
			return true;
		}	
	}	

}
?>
