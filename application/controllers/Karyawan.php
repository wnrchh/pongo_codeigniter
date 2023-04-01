<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends Base_Controller {

	/**
     * List of Karyawans
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Karyawan';
		$this->data['subview'] = 'karyawan/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Karyawan Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('karyawan/form', $data);
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
        $this->load->model('karyawan_m');
		echo json_encode($this->karyawan_m->getJson($this->input->post()));
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
				'label' => 'Nama Karyawan',
				'rules' => 'required'
			],
			[
				'field' => 'pekerjaan',
				'label' => 'Pekerjaan',
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
     * Create a New Karyawan
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
		$data['pekerjaan'] 		= $this->input->post('pekerjaan');
		$data['foto']		    		= $this->input->post('foto');
		$this->db->insert('karyawan', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Karyawan
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
		$data['pekerjaan'] 		= $this->input->post('pekerjaan');
		$data['foto']		    		= $this->input->post('foto');

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('karyawan', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Karyawan
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('karyawan');
	}

}
