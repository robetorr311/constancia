<?php
class Formato extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');
   	    $data['trabajador']=$this->Tipotrabajador->select();
		$data['nomina']=$this->Tiponomina->select();
		$data['constancia']=$this->Tipoconstancia->select();		
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		$this->add_view('constancias/modelo_constancia',$data);
		$data['retorno']=$this->Modelo_constancia->listados(0,1);
		$this->add_view('constancias/listado_modelo_constancia',$data);		
		$this->render();		
	}
    function guardar() {
    	$e=0;
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Logo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');		
		$logo1="logo1";
		$logo2="logo2";
		$config['upload_path'] = './assets/img/constancias/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '50000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$this->load->library('upload', $config);
		if (empty($_FILES['logo1']['name']))
		{
				$encabezado=$this->input->post('encabezado'); 
				$contenido=$this->input->post('contenido'); 
				$pie=$this->input->post('pie'); 
				$nomina=$this->input->post('nomina'); 
				$trabajador=$this->input->post('trabajador'); 
				$constancia=$this->input->post('constancia'); 	
				$husuario= $this->session->userdata('usr_id');			
				$data['encabezado']=$encabezado; 
				$data['contenido']=$contenido; 
				$data['pie']=$pie; 
				$optiontrabajador=$this->Tipotrabajador->select_post($trabajador);
				$optionconstancia=$this->Tipoconstancia->select_post($constancia);
				$optionnomina=$this->Tiponomina->select_post($nomina);
				$data['trabajador']=$optiontrabajador.$this->Tipotrabajador->select();
				$data['nomina']=$optionnomina.$this->Tiponomina->select();
				$data['constancia']=$optionconstancia.$this->Tipoconstancia->select();
				$data['error']='Sin archivos cargados';
				$this->add_view('constancias/modelo_constancia', $data);
				$this->render();	
		}
		else {
				$this->form_validation->set_rules('contenido','Contenido','required');
				$this->form_validation->set_rules('pie','Editor1','Pie');
				$this->form_validation->set_rules('encabezado','Encabezado','required');
				if($this->form_validation->run() === true){
		            if ($this->upload->do_upload($logo1))
		            {
		                $data1 = $this->upload->data();
		            }
		            else
		            {
		                $data['error'] = $this->upload->display_errors();
						$e=1;
		            }
					if (empty($_FILES['logo2']['name']))
					{
						$nombrearchivo2='sinlogo.png';
						$tipoarchivo2='image/png';
						$sizearchivo2='1';	
					}
					else {
			            if ($this->upload->do_upload($logo2))
			            {    	
			                $data2 = $this->upload->data();
			            }
			            else
			            {
			                $data['error'] = $this->upload->display_errors();
			                $e=1;
						} 
						$nombrearchivo2=$data2['file_name'];
						$tipoarchivo2=$data2['file_type'];
						$sizearchivo2=$data2['file_size'];						
					}

					$encabezado=$this->input->post('encabezado'); 
					$contenido=$this->input->post('contenido'); 
					$pie=$this->input->post('pie'); 
					$nomina=$this->input->post('nomina'); 
					$trabajador=$this->input->post('trabajador'); 
					$constancia=$this->input->post('constancia'); 	
					$husuario= $this->session->userdata('usr_id');
					$nombrearchivo1=$data1['file_name'];
					$tipoarchivo1=$data1['file_type'];
					$sizearchivo1=$data1['file_size'];

					$hmodelo_constancia=$this->Modelo_constancia->iddoc();
					$hlogo1=$this->Logo_constancia->guardar($hmodelo_constancia, $nombrearchivo1, $tipoarchivo1, $sizearchivo1);
					$hlogo2=$this->Logo_constancia->guardar($hmodelo_constancia, $nombrearchivo2, $tipoarchivo2, $sizearchivo2);
					$this->Modelo_constancia->guardar($hmodelo_constancia , $trabajador , $nomina , $hlogo1 , $hlogo2 , $encabezado , $contenido , $pie , $constancia );
					$data['hmodelo_constancia']=$hmodelo_constancia;
					$this->add_view('constancias/modelo_constancia_guardado', $data);
					$this->render();									
				}										
		}	
	}	
    function actualizar() {
		$hmodelo_constancia=$this->input->post('id'); 
    	$e=0;
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Logo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');		
		$logo1="logo1";
		$logo2="logo2";
		$config['upload_path'] = './assets/img/constancias/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '50000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$this->load->library('upload', $config);

		if (empty($_FILES['logo1']['name']))
		{

				$encabezado=$this->input->post('encabezado'); 
				$contenido=$this->input->post('contenido'); 
				$pie=$this->input->post('pie'); 
				$nomina=$this->input->post('nomina'); 
				$trabajador=$this->input->post('trabajador'); 
				$constancia=$this->input->post('constancia'); 	
				$husuario= $this->session->userdata('usr_id');			
				$data['encabezado']=$encabezado; 
				$data['contenido']=$contenido; 
				$data['pie']=$pie; 
				$optiontrabajador=$this->Tipotrabajador->select_post($trabajador);
				$optionconstancia=$this->Tipoconstancia->select_post($constancia);
				$optionnomina=$this->Tiponomina->select_post($nomina);
				$data['trabajador']=$optiontrabajador.$this->Tipotrabajador->select();
				$data['nomina']=$optionnomina.$this->Tiponomina->select();
				$data['constancia']=$optionconstancia.$this->Tipoconstancia->select();
				$data['error']='Sin archivos cargados';
				$this->add_view('constancias/modelo_constancia', $data);
				$this->render();	
		}
		else {
				$this->form_validation->set_rules('contenido','Contenido','required');
				$this->form_validation->set_rules('pie','Editor1','Pie');
				$this->form_validation->set_rules('encabezado','Encabezado','required');
				if($this->form_validation->run() === true){
		            if ($this->upload->do_upload($logo1))
		            {
		                $data1 = $this->upload->data();
		            }
		            else
		            {
		                $data['error'] = $this->upload->display_errors();
						$e=1;
		            }
					if (empty($_FILES['logo2']['name']))
					{
						$nombrearchivo2='sinlogo.png';
						$tipoarchivo2='image/png';
						$sizearchivo2='1';	
					}
					else {
			            if ($this->upload->do_upload($logo2))
			            {    	
			                $data2 = $this->upload->data();
			            }
			            else
			            {
			                $data['error'] = $this->upload->display_errors();
			                $e=1;
						} 
						$nombrearchivo2=$data2['file_name'];
						$tipoarchivo2=$data2['file_type'];
						$sizearchivo2=$data2['file_size'];						
					}

					$encabezado=$this->input->post('encabezado'); 
					$contenido=$this->input->post('contenido'); 
					$pie=$this->input->post('pie'); 
					$nomina=$this->input->post('nomina'); 
					$trabajador=$this->input->post('trabajador'); 
					$constancia=$this->input->post('constancia'); 	
					$husuario= $this->session->userdata('usr_id');
					$nombrearchivo1=$data1['file_name'];
					$tipoarchivo1=$data1['file_type'];
					$sizearchivo1=$data1['file_size'];
					$hlogo1=$this->Logo_constancia->guardar($hmodelo_constancia, $nombrearchivo1, $tipoarchivo1, $sizearchivo1);
					$hlogo2=$this->Logo_constancia->guardar($hmodelo_constancia, $nombrearchivo2, $tipoarchivo2, $sizearchivo2);
					$this->Modelo_constancia->guardar($hmodelo_constancia , $trabajador , $nomina , $hlogo1 , $hlogo2 , $encabezado , $contenido , $pie , $constancia );
					$data['hmodelo_constancia']=$hmodelo_constancia;
					$this->add_view('constancias/modelo_constancia_guardado', $data);
					$this->render();									
				}										
		}	
	}		
    function constancia() {
        $this->load->library('html2pdf');
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Logo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');
		$hmodelo_constancia=$this->input->post('hmodelo_constancia');
		if (empty($hmodelo_constancia)) { $hmodelo_constancia=$this->input->get('id'); }		 
		$datosc=$this->Modelo_constancia->constancia($hmodelo_constancia)->row();
		$trabajador=$datosc->htipotrabajador;
		$nomina=$datosc->htiponomina;
		$hlogo1=$datosc->hlogo1;
		$hlogo2=$datosc->hlogo2;
		$encabezado=$datosc->encabezado;
		$contenido=$datosc->contenido;
		$pie=$datosc->pie;
		$constancia=$datosc->htipoconstancia;
		$datosf1=$this->Logo_constancia->logo($hlogo1)->row();
		$datosf2=$this->Logo_constancia->logo($hlogo2)->row();
		$ruta1=$datosf1->ruta;
		$ruta2=$datosf2->ruta;
		$data['encabezado']=$encabezado;	
		$data['contenido']=$contenido;	
		$data['pie']=$pie;	
		$data['ruta1']=substr($ruta1, 26);	
		$data['ruta2']=substr($ruta2, 26);	//  /var/www/html/Constancias/ 26
   		$html=$this->load->view('constancias/constancia', $data, true);
		$html2pdf= new HTML2PDF();  
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('constancia.pdf');
	}	
	function adelante(){
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Modelo_constancia');
			$data['retorno']=$this->Modelo_constancia->listados($inicio,1);
			$this->load->view('constancias/contenido_modelo_constancia',$data);
	}
	function eliminar(){
			$id=$this->input->post('id');
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Modelo_constancia');
			$data['hcentro']=$hcentro;
			$this->Modelo_constancia->eliminar($id);
			$data['retorno']=$this->Modelo_constancia->listados(0,1);
			$this->load->view('constancias/contenido_modelo_constancia',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$this->load->model('constancias/Modelo_constancia');
			$data['hcentro']=$hcentro;
			$data['retorno']=$this->Modelo_constancia->listados($inicio,0);
			$this->load->view('constancias/contenido_modelo_constancia',$data);
	}	
	function registro(){

		$id=$this->input->post('id');	   
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Logo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');			
		$registro=$this->Modelo_constancia->registro($id);
		$id=$registro[0]; 
		$htipotrabajador=$registro[1]; 
		$htiponomina=$registro[2]; 
		$hlogo1=$registro[3]; 
		$hlogo2=$registro[4]; 
		$encabezado=$registro[5]; 
		$contenido=$registro[6]; 
		$pie=$registro[7]; 
		$htipoconstancia=$registro[8]; 
		$tipotrabajador=$registro[9]; 
		$tiponomina=$registro[10]; 
		$tipoconstancia=$registro[11];		
		$optiontrabajador=$this->Tipotrabajador->select_post($htipotrabajador);
		$optionconstancia=$this->Tipoconstancia->select_post($htipoconstancia);
		$optionnomina=$this->Tiponomina->select_post($htiponomina);
		$trabajador=$optiontrabajador.$this->Tipotrabajador->select();
		$nomina=$optionnomina.$this->Tiponomina->select();
		$constancia=$optionconstancia.$this->Tipoconstancia->select(); 		
		$datos=array($id, 
				$htipotrabajador, 
				$htiponomina, 
				$hlogo1, 
				$hlogo2, 
				$encabezado, 
				$contenido, 
				$pie, 
				$htipoconstancia, 
				$trabajador, 
				$nomina, 
				$constancia);		

   	    $data['registro']=$datos;

		$this->load->view('constancias/edit_modelo_constancia',$data);
	}
}
?>
