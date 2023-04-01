<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends Base_Controller {

	/**
     * List of Gurus
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Guru';
		$this->data['subview'] = 'guru/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Guru Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('guru/form', $data);
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
        $this->load->model('guru_m');
		echo json_encode($this->guru_m->getJson($this->input->post()));
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
				'field' => 'nama',
				'label' => 'Nama Guru',
				'rules' => 'required'
			],
			[
				'field' => 'mata_pelajaran',
				'label' => 'Mata Pelajaran',
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
     * Create a New Guru
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['nama'] 		    		= $this->input->post('nama');
		$data['no_hp'] 		    		= $this->input->post('no_hp');
		$data['alamat'] 		    	= $this->input->post('alamat');
		$data['mata_pelajaran'] 		= $this->input->post('mata_pelajaran');
		$data['foto']		    		= $this->input->post('foto');
		$this->db->insert('guru', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Guru
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['nama'] 		    		= $this->input->post('nama');
		$data['no_hp'] 		    		= $this->input->post('no_hp');
		$data['alamat'] 		    	= $this->input->post('alamat');
		$data['mata_pelajaran'] 		= $this->input->post('mata_pelajaran');
		$data['foto']		    		= $this->input->post('foto');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('guru', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Guru
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('guru');
	}

	public function print()
	{
		 $this->load->model('guru_m');
		 $this->data['data_guru'] = $this->guru_m->print_guru();
		$this->load->view('guru/print', $this->data);
	}

}
