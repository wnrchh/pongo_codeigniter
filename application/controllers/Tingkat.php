<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat extends Base_Controller {

	/**
     * List of Tingkats
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Tingkat';
		$this->data['subview'] = 'tingkat/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Tingkat Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('tingkat/form', $data);
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
        $this->load->model('tingkat_m');
		echo json_encode($this->tingkat_m->getJson($this->input->post()));
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
				'field' => 'foto',
				'label' => 'Foto',
				'rules' => 'required',
			],
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required',
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
     * Create a New Tingkat
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{

		$data['foto']		    		= $this->input->post('foto');
		$data['nama']		    		= $this->input->post('nama');
		$this->db->insert('tingkat', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Tingkat
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{

		$data['foto']		    		= $this->input->post('foto');
		$data['nama']		    		= $this->input->post('nama');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tingkat', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Tingkat
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('tingkat');
	}



}
