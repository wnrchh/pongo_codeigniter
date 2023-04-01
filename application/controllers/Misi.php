<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Misi extends Base_Controller {

	/**
     * List of Misis
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Misi';
		$this->data['subview'] = 'misi/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Misi Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('misi/form', $data);
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
        $this->load->model('misi_m');
		echo json_encode($this->misi_m->getJson($this->input->post()));
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
     * Create a New Misi
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['judul1'] 		    		= $this->input->post('judul1');
		$data['judul2'] 		    		= $this->input->post('judul2');
		$data['keterangan'] 		        = $this->input->post('keterangansimpan');
		$this->db->insert('misi', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Misi
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['judul1'] 		    		= $this->input->post('judul1');
		$data['judul2'] 		    		= $this->input->post('judul2');
		$data['keterangan'] 		        = $this->input->post('keterangansimpan');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('misi', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Misi
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */


}
