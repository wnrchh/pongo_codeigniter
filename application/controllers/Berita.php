<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Base_Controller {

	/**
     * List of Beritas
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Berita';
		$this->data['subview'] = 'berita/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Berita Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('berita/form', $data);
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
        $this->load->model('berita_m');
		echo json_encode($this->berita_m->getJson($this->input->post()));
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
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'required',
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
     * Create a New Berita
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{

		$data['foto']		    		= $this->input->post('foto');
		$data['judul']		    		= $this->input->post('judul');
		$data['keterangan']		    	= $this->input->post('keterangan');
		$this->db->insert('berita', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Berita
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{

		$data['foto']		    		= $this->input->post('foto');
		$data['judul']		    		= $this->input->post('judul');
		$data['keterangan']		    	= $this->input->post('keterangan');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('berita', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Berita
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('berita');
	}



}
