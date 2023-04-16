<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends Base_Controller {
	
	/**
* Dashboard
*
* @access  public
* @param
* @return  view
*/
	function __construct()
	{
		parent::__construct();


	}
	
	public function index()
	{
						
		header('Content-Type: application/json');
    	echo json_encode('errors');
	}


	public function siswa()
	{
		
		include_once APPPATH.'/third_party/xlsxwriter.class.php';

		$query = $this->db->query("SELECT nama, jenis_kelamin, nis, kelas, foto FROM siswa")->result();

		


	  $filename = "siswa-".date('d-m-Y-H-i-s').".xlsx";
	  header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
	  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	  header('Content-Transfer-Encoding: binary');
	  header('Cache-Control: must-revalidate');
	  header('Pragma: public');


	  $styles = array('widths'=>[5,25,18,17,12,20], 'height'=>50, 'font'=>'Arial','font-size'=>12,'font-style'=>'bold', 'fill'=>'#000000', 'halign'=>'center', 'border'=>'left,right,top,bottom');




	  $writer = new XLSXWriter();
	  $writer->setAuthor('SmartSchool');

	  $header = array(
	    'No '=>'integer', 
	    'Nama'=>'string', 
	    'Jenis Kelamin'=>'string',  
        'NIS'=>'string',  
        'Kelas'=>'string',
        'Foto' =>'string'
	  );


	  $writer->writeSheetHeader('Sheet1',$header, $styles);
	  


	$no = 1;
	foreach($query as $value){

	 	$obj 		= json_decode($value->foto);
       $foto 		= $obj['0']->{'file_thumbnail'};
       $tmpsisa	= $no % 11;

$tampil_foto = $foto;


			$styles2 = array('height'=>30, 'font'=>'Arial','font-size'=>12,'font-style'=>'bold', 'fill'=>'#fff', 'halign'=>'center', 'border'=>'left,right,top,bottom');
		

	    $writer->writeSheetRow('Sheet1',[$no, 
	    								$value->nama, 
	    								$value->jenis_kelamin, 
	    								$value->nis, 
	    								$value->kelas,
	    								$tampil_foto],
	    								$styles2);

	    $no++;
	  }
	  $writer->writeToStdOut();
	}

	public function guru()
	{
		
		include_once APPPATH.'/third_party/xlsxwriter.class.php';

		$query = $this->db->query("SELECT nama,mata_pelajaran,alamat,no_hp FROM guru")->result();

		


	  $filename = "guru-".date('d-m-Y-H-i-s').".xlsx";
	  header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
	  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	  header('Content-Transfer-Encoding: binary');
	  header('Cache-Control: must-revalidate');
	  header('Pragma: public');


	  $styles = array('widths'=>[5,16,20,19,18], 'height'=>50, 'font'=>'Arial','font-size'=>12,'font-style'=>'bold', 'fill'=>'#ffffff', 'halign'=>'center', 'border'=>'left,right,top,bottom', );




	  $writer = new XLSXWriter();
	  $writer->setAuthor('SmartSchool');

	  $header = array(
	    'No '=>'integer', 
	    'Nama'=>'string', 
	    'Mata Pelajaran'=>'string',
	    'Alamat'=>'string',
	    'No HP'=>'string',
	  );


	  $writer->writeSheetHeader('Sheet1',$header, $styles);
	  


	$no = 1;
	foreach($query as $value){



			$styles2 = array('height'=>30, 'font'=>'Arial','font-size'=>12,'font-style'=>'bold', 'fill'=>'#fff', 'halign'=>'center', 'border'=>'left,right,top,bottom');
		

	    $writer->writeSheetRow('Sheet1',[$no, 
	    								$value->nama, 
	    								$value->mata_pelajaran,
	    								$value->alamat,
	    								$value->no_hp],
	    								$styles2);

	    $no++;
	  }
	  $writer->writeToStdOut();
	}

}