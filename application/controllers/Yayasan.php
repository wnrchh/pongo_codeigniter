<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yayasan extends Base_Controller {

	/**
     * List of Yayasans
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Yayasan';
		$this->data['subview'] = 'yayasan/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Yayasan Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('yayasan/form', $data);
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
        $this->load->model('yayasan_m');
		echo json_encode($this->yayasan_m->getJson($this->input->post()));
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
				'field' => 'judul1',
				'label' => 'Judul1',
				'rules' => 'required'
			],
			[
				'field' => 'judul2',
				'label' => 'Judul2',
				'rules' => 'required'
			],
			[
				'field' => 'keterangan',
				'label' => 'Keterangan',
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
     * Create a New Yayasan
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['kontak'] 		    		= $this->input->post('kontak');
		$this->db->insert('yayasan', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Yayasan
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['kontak'] 		    		= $this->input->post('kontak');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('yayasan', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Yayasan
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */


}
