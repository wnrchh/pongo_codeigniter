<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends Base_Controller {

	/**
     * List of Nilais
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Nilai';
		$this->data['subview'] = 'nilai/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Nilai Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->model('siswa_m');
		$data['siswa'] = $this->siswa_m->all();
		$this->load->model('mata_pelajaran_m');
		$data['mata_pelajaran'] = $this->mata_pelajaran_m->all();
		$this->load->view('nilai/form', $data);
	}

		public function form_update()
	{
		$data['index'] 		= $this->input->post('index');

		$siswa_id 			= $this->input->post('siswa_id');
		$data['siswa_id'] 	= $siswa_id;



		$this->load->model('siswa_m');
		$data['siswa'] = $this->siswa_m->get_id($siswa_id);
		$this->load->model('mata_pelajaran_m');
		$data['mata_pelajaran'] = $this->mata_pelajaran_m->all();
		$this->load->view('nilai/form_update', $data);
	}

	/**
     * Datagrid Data
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

	public function data()
	{
        header('Content-Type: application/json');
        $this->load->model('nilai_m');
		echo json_encode($this->nilai_m->getJson($this->input->post()));
	}

	/**
     * Validate Input
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

    public function validate()
	{
		$rules = [
			[
				'field' => 'siswa_id',
				'label' => 'Siswa',
				'rules' => 'required'
			]		];

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			header("Content-type:application/json");
			echo json_encode('success');
		} else {
			header("Content-type:application/json");
			echo json_encode($this->form_validation->get_all_errors());
		}
	}

	/**
     * Create Update Action
     *
     * @access 	public
     * @param 	
     * @return 	method
     */

	public function action()
	{
		if (!$this->input->post('id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	/**
     * Create a New Nilai
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{



		$mata_pelajaran_id		    = $this->input->post('mata_pelajaran_id');



		foreach ($mata_pelajaran_id as $key => $value) {
			# code...

		$data['siswa_id'] 		    			= $this->input->post('siswa_id');
		$data['mata_pelajaran_id'] 				= $value;
		$data['nilai_angka'] 		            = $this->input->post('nilai_angka_'.$value);
		$data['nilai_huruf'] 		            = $this->input->post('nilai_huruf_'.$value);
		$data['keterangan'] 		            = $this->input->post('keterangan_'.$value);
		$this->db->insert('nilai', $data); 
		}





		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Nilai
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{


		$mata_pelajaran_id		    = $this->input->post('mata_pelajaran_id');
		foreach ($mata_pelajaran_id as $key => $value) {



				//hapus bagian yang pernah di insert
		$this->db->where('siswa_id', $this->input->post('siswa_id'));
		$this->db->where('mata_pelajaran_id', $value);
		$this->db->delete('nilai');
		
		# bagian insert ulang
		$data['siswa_id'] 		    			= $this->input->post('siswa_id');
		$data['mata_pelajaran_id'] 				= $value;
		$data['nilai_angka'] 		            = $this->input->post('nilai_angka_'.$value);
		$data['nilai_huruf'] 		            = $this->input->post('nilai_huruf_'.$value);
		$data['keterangan'] 		            = $this->input->post('keterangan_'.$value);
		$this->db->insert('nilai', $data); 
		}





		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Nilai
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('nilai');
	}


		public function rumus_nilai()
	{	
		$nilai_angka = $this->input->post('nilai_angka');
if ($nilai_angka != 0){

		switch ($nilai_angka) {
		    case ($nilai_angka > 86):
		    $nilai_huruf = 'A';
		    break;
		    case ($nilai_angka > 81):
		    $nilai_huruf = 'A-';
		    break;
		    case ($nilai_angka > 76):
		    $nilai_huruf = 'B+';
		    break;
		    case ($nilai_angka > 71):
		    $nilai_huruf = 'B';
		    break;
		    case ($nilai_angka > 66):
		    $nilai_huruf = 'B-';
		    break;
		    case ($nilai_angka > 61):
		    $nilai_huruf = 'C+';
		    break;
		    case ($nilai_angka > 56):
		    $nilai_huruf = 'C';
		    break;
		    case ($nilai_angka > 51):
		    $nilai_huruf = 'C-';
		    break;
		    case ($nilai_angka > 46):
		    $nilai_huruf = 'D+';
		    break;
		    case ($nilai_angka > 0):
		    $nilai_huruf = 'D';
		    break;
		  default:
		    $nilai_huruf = 'D';
		}
	}else{
		$nilai_huruf = 'D';
	}

		echo "<option value=".$nilai_huruf.">".$nilai_huruf."</option>";
	}


	public function rumus_keterangan()
	{	
		$nilai_angka = $this->input->post('nilai_angka');
if ($nilai_angka != 0 ){

		switch ($nilai_angka) {
		    case ($nilai_angka > 81):
		    $keterangan = 'SB';
		    break;
		    case ($nilai_angka > 66):
		    $keterangan = 'B';
		    break;
		    case ($nilai_angka > 51 ):
		    $keterangan = 'C';
		    break;
		    case ($nilai_angka > 0 ):
		    $keterangan = 'K';
		    break;
		  	default:
		    $keterangan = 'K';
		  }
		}else{
		$keterangan = 'K';
	}

		echo "<option value=".$keterangan.">".$keterangan."</option>";
	}




}
