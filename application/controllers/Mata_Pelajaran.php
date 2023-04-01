<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_Pelajaran extends Base_Controller {

	/**
     * List of Mata_Pelajarans
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Mata_Pelajaran';
		$this->data['subview'] = 'mata_pelajaran/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Mata_Pelajaran Form
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
		$this->load->view('mata_pelajaran/form', $data);
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
        $this->load->model('mata_pelajaran_m');
		echo json_encode($this->mata_pelajaran_m->getJson($this->input->post()));
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
				'field' => 'mata_pelajaran',
				'label' => 'Mata_Pelajaran',
				'rules' => 'required'
			],
			[
				'field' => 'guru',
				'label' => 'Guru',
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
     * Create a New Mata_Pelajaran
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['mata_pelajaran'] 		= $this->input->post('mata_pelajaran');
		$data['guru'] 		    		= $this->input->post('guru');
		$data['guru2'] 		    		= $this->input->post('guru2');
		$this->db->insert('mata_pelajaran', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Mata_Pelajaran
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['mata_pelajaran'] 		= $this->input->post('mata_pelajaran');
		$data['guru'] 		    		= $this->input->post('guru');
		$data['guru2'] 		    		= $this->input->post('guru2');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mata_pelajaran', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Mata_Pelajaran
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('mata_pelajaran');
	}

}


