<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/html2pdf_v4.03/html2pdf.class.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Htmlpdf extends HTML2PDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF

       // El pie del pdf
       public function Footer(){

      }
    }
?>
