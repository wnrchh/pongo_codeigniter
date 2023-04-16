<?php
defined('BASEPATH') OR exit('No direct script access allowed');

		require 'vendor/autoload.php';
		use Spipu\Html2Pdf\Html2Pdf;

class Pdf extends Base_Controller {

	/**
     * Sop Settings
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	public function __construct()
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

		$html2pdf 		= new Html2Pdf('L', 'A4', 'en');

		$query = $this->db->query("SELECT nama, jenis_kelamin, nis, kelas, foto FROM siswa")->result();


		$data['query'] 	= $query;
		$content 		= $this->load->view('pdf/siswa',$data,true);
		$html2pdf->writeHTML($content);
		$html2pdf->output();

		
	}

	public function guru()
	{

		$html2pdf 		= new Html2Pdf('P', 'A4', 'en');

		$query = $this->db->query("SELECT nama,mata_pelajaran,alamat,no_hp,foto FROM guru")->result();


		$data['query'] 	= $query;
		$content 		= $this->load->view('pdf/guru',$data,true);
		$html2pdf->writeHTML($content);
		$html2pdf->output();
	}


}
