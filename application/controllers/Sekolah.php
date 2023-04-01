<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends Base_Controller {

	/**
     * List of Sekolahs
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Sekolah';
		$this->data['subview'] = 'sekolah/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Sekolah Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('sekolah/form', $data);
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
        $this->load->model('sekolah_m');
		echo json_encode($this->sekolah_m->getJson($this->input->post()));
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
				'field' => 'kbtk',
				'label' => 'KB-TK',
				'rules' => 'required',
			],
			[
				'field' => 'sd',
				'label' => 'SD',
				'rules' => 'required',
			],
			[
				'field' => 'smp',
				'label' => 'SMP',
				'rules' => 'required'
			],
			[
				'field' => 'sma',
				'label' => 'SMA',
				'rules' => 'required'
			],
			[
				'field' => 'smk',
				'label' => 'SMK',
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
     * Create a New Sekolah
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{

		$data['kbtk']		    	= $this->input->post('kbtk');
		$data['sd']		    		= $this->input->post('sd');
		$data['smp']		    	= $this->input->post('smp');
		$data['sma']		    	= $this->input->post('sma');
		$data['smk']		    	= $this->input->post('smk');
		$this->db->insert('sekolah', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Sekolah
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{

		$data['kbtk']		    	= $this->input->post('kbtk');
		$data['sd']		    		= $this->input->post('sd');
		$data['smp']		    	= $this->input->post('smp');
		$data['sma']		    	= $this->input->post('sma');
		$data['smk']		    	= $this->input->post('smk');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('sekolah', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Sekolah
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('sekolah');
	}



}
