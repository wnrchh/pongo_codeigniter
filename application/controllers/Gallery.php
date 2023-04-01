<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Base_Controller {

	/**
     * List of Gallerys
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Gallery';
		$this->data['subview'] = 'gallery/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Gallery Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('gallery/form', $data);
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
        $this->load->model('gallery_m');
		echo json_encode($this->gallery_m->getJson($this->input->post()));
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
     * Create a New Gallery
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{

		$data['foto']		    		= $this->input->post('foto');
		$this->db->insert('gallery', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Gallery
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{

		$data['foto']		    		= $this->input->post('foto');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('gallery', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Gallery
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('gallery');
	}



}
