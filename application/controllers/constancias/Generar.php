<?php
class Generar extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

   function index(){
		$this->load->model('constancias/Tipoconstancia');
		$data['constancia']=$this->Tipoconstancia->select();
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		$this->add_view('constancias/inicio_generar',$data);
		$this->render();		   
	}
    function constancia() {
        $this->load->library('html2pdf');
		$this->load->model('constancias/Modelo_constancia');
		$this->load->model('constancias/Logo_constancia');
		$this->load->model('constancias/Tipoconstancia');
		$this->load->model('constancias/Tiponomina');
		$this->load->model('constancias/Tipotrabajador');
		$cedula=$this->input->post('cedula');
		$constancia=$this->input->post('constancia');
		$datosc=$this->Modelo_constancia->ver_constancia($cedula,$constancia);
		$id=$datosc[0];
		$hlogo1=$datosc[1];
		$hlogo2=$datosc[2];
		$encabezado=$datosc[3];
		$contenido=$datosc[4];
		$pie=$datosc[5];
		$datosf1=$this->Logo_constancia->logo($hlogo1)->row();
		$datosf2=$this->Logo_constancia->logo($hlogo2)->row();
		$ruta1=$datosf1->ruta;
		$ruta2=$datosf2->ruta;
		$data['encabezado']=$encabezado;	
		$data['contenido']=$contenido;	
		$data['pie']=$pie;	
		$data['ruta1']=substr($ruta1, 26);	
		$data['ruta2']=substr($ruta2, 26);	//  /var/www/html/Constancias/ 26
		//$this->add_view('constancias/constancia_p',$data);		
		//$this->render();			
   		$html=$this->load->view('constancias/constancia', $data, true);
		$html2pdf= new HTML2PDF();  
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('constancia.pdf');
	}	

}
?>
