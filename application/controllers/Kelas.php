<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends Base_Controller {

	/**
     * List of Kelass
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Kelas';
		$this->data['subview'] = 'kelas/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Kelas Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('kelas/form', $data);
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
        $this->load->model('kelas_m');
		echo json_encode($this->kelas_m->getJson($this->input->post()));
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
				'field' => 'kelas',
				'label' => 'Kelas',
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
     * Create a New Kelas
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['kelas'] 				= $this->input->post('kelas');
		$data['jumlah'] 		    = $this->input->post('jumlah');
		$this->db->insert('kelas', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Kelas
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['kelas'] 				= $this->input->post('kelas');
		$data['jumlah'] 		    = $this->input->post('jumlah');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('kelas', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Kelas
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('kelas');
	}

}


