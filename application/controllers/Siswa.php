<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends Base_Controller {

	/**
     * List of Siswas
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{	
		$this->data['title'] = 'Siswa';
		$this->data['subview'] = 'siswa/main';
		$this->load->view('components/main', $this->data);
	}

	/**
     * Siswa Form
     *
     * @access 	public
     * @param 	
     * @return 	view
     */

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('siswa/form', $data);
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
        $this->load->model('siswa_m');
		echo json_encode($this->siswa_m->getJson($this->input->post()));
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
				'label' => 'Nama Siswa',
				'rules' => 'required'
			],
			[
				'field' => 'nis',
				'label' => 'NIS',
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
     * Create a New Siswa
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		

		$datausers['name'] 		= $this->input->post('nama');
		$datausers['email']   	= $this->input->post('nis');
		$datausers['password']   = $this->input->post('nis');
		$datausers['group_id']   = '4';
		$this->db->insert('users', $datausers); 

		$users_id = $this->db->insert_id();

		$data['users_id'] 		    	= $users_id;
		$data['nama'] 		    		= $this->input->post('nama');
		$data['jenis_kelamin'] 		    = $this->input->post('jenis_kelamin');
		$data['vegetarian']	    		= $this->input->post('vegetarian');
		$data['nis'] 		   		    = $this->input->post('nis');
		$data['tempat_lahir'] 		    = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] 		    = $this->input->post('tanggal_lahir');
		$data['alamat'] 		    	= $this->input->post('alamat');
		$data['kelas'] 		   	 		= $this->input->post('kelas');
		$data['foto']		    		= $this->input->post('foto');
		$this->db->insert('siswa', $data); 







		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Update Existing Siswa
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function update()
	{
		$data['nama'] 		    		= $this->input->post('nama');
		$data['jenis_kelamin'] 		    = $this->input->post('jenis_kelamin');
		$data['vegetarian']	    		= $this->input->post('vegetarian');
		$data['nis'] 		   		    = $this->input->post('nis');
		$data['tempat_lahir'] 		    = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] 		    = $this->input->post('tanggal_lahir');
		$data['alamat'] 		    	= $this->input->post('alamat');
		$data['kelas'] 		   	 		= $this->input->post('kelas');
		$data['foto']		    		= $this->input->post('foto');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('siswa', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	/**
     * Delete a Siswa
     *
     * @access 	public
     * @param 	
     * @return 	redirect
     */

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('siswa');
	}


	public function print()
	{
		 $this->load->model('siswa_m');
		 $this->data['data_siswa'] = $this->siswa_m->print_siswa();
		$this->load->view('siswa/print', $this->data);
	}

}
