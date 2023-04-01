<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends Base_Controller {

	/**
     * List of Jadwals
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Jadwal';
		$this->data['subview'] = 'jadwal/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Jadwal Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');

		$this->load->model('guru_m');
		$data['data_guru'] = $this->guru_m->tampil_semua();
		$this->load->model('mata_pelajaran_m');
		$data['mata_pelajaran'] = $this->mata_pelajaran_m->all();
		$this->load->model('kelas_m');
		$data['kelas'] = $this->kelas_m->tampil_kelas();
		$this->load->view('jadwal/form', $data);
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
        $this->load->model('jadwal_m');
		echo json_encode($this->jadwal_m->getJson($this->input->post()));
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
				'field' => 'hari',
				'label' => 'Hari',
				'rules' => 'required'
			]
		];

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
     * Create a New Jadwal
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['kelas_id'] 				= $this->input->post('kelas_id');
		$data['mata_pelajaran_id'] 		= $this->input->post('mata_pelajaran_id');
		$data['guru_id'] 				= $this->input->post('guru_id');
		$data['hari'] 		    		= $this->input->post('hari');
		$data['jam'] 		    		= $this->input->post('jam');
		$this->db->insert('jadwal', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Jadwal
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['kelas_id'] 				= $this->input->post('kelas_id');
		$data['mata_pelajaran_id'] 		= $this->input->post('mata_pelajaran_id');
		$data['guru_id'] 				= $this->input->post('guru_id');
		$data['hari'] 		    		= $this->input->post('hari');
		$data['jam'] 		    		= $this->input->post('jam');


		$this->db->where('id', $this->input->post('id'));
		$this->db->update('jadwal', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Jadwal
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('jadwal');
	}

}


