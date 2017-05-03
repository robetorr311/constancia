<?php
class Firma extends MY_Controller {
    public function index() 
	{
	   	$usu = $this->session->userdata('usuario');
		$this->load->model('constancias/Firma_model');
		$registro=$this->Firma_model->registro();
		$director=$registro[0]; 
		$cargodirector=$registro[1]; 
		$rutafirma=$registro[2]; 
		$datos=array($director, 
				$cargodirector, 
				$rutafirma);		
   	    $data['registro']=$datos;
		$this->add_view("constancias/firma_view",$data);
		$this->render();
    }
   public function actualizar() 
	{
		$archivo='archivo';
		$this->load->model('constancias/Firma_model');
		$config['upload_path'] = './assets/img/constancias/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '50000';
		$this->load->library('upload', $config);
		if (empty($_FILES['archivo']['name']))
		{
			$director=$this->input->post('director');
			$cargodirector=$this->input->post('cargodirector');	
			$husuario= $this->session->userdata('usr_id');
			$rutafirma='/var/www/html/Constancias/assets/img/constancias/firma.png';
			$datos=array($director, 
					$cargodirector, 
					$rutafirma);			 
			$data['error']='Sin archivos cargados';
			$data['registro']=$datos;
			$this->add_view('constancias/firma_view', $data);
			$this->render();	
		}
		else {
				$director=$this->input->post('director');
				$cargodirector=$this->input->post('cargodirector');	
				$this->form_validation->set_rules('director','Director','required');
				$this->form_validation->set_rules('cargodirector','Cargodirector','required');			
				if($this->form_validation->run() === true){
		            if ($this->upload->do_upload($archivo))
		            {
		                $data = $this->upload->data();
		            }
		            else
		            {
		                $data['error'] = $this->upload->display_errors();
						$e=1;
		            }
					$nombrearchivo=$data['file_name'];
					$tipoarchivo=$data['file_type'];
					$sizearchivo=$data['file_size'];
					$ruta="/var/www/html/Constancias/assets/img/constancias/".$nombrearchivo;			            
					$this->Firma_model->actualizar($director , $cargodirector , $ruta);
					$this->add_view('constancias/firma_actualizada');
					$this->render();

		        }
		}




    }

}
?>