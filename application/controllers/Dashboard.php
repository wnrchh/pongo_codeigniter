<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {
	
	/**
     * Dashboard
     *
     * @access  public
     * @param   
     * @return  view
     */
	
	public function index()
	{

		 $this->load->model('siswa_m');
		 $this->data['data_siswa'] = $this->siswa_m->tampil_siswa();

		 $this->load->model('guru_m');
		 $this->data['data_guru'] = $this->guru_m->tampil_guru();


 		$this->data['total_siswa'] = $this->db->query("SELECT * from siswa")->num_rows();

 		$this->data['total_siswa_I'] = $this->db->query("SELECT * from siswa where kelas='I'")->num_rows();
 		$this->data['total_siswa_II'] = $this->db->query("SELECT * from siswa where kelas='II'")->num_rows();
 		$this->data['total_siswa_III'] = $this->db->query("SELECT * from siswa where kelas='III'")->num_rows();
 		$this->data['total_siswa_IV'] = $this->db->query("SELECT * from siswa where kelas='IV'")->num_rows();
 		$this->data['total_siswa_V'] = $this->db->query("SELECT * from siswa where kelas='V'")->num_rows();
 		$this->data['total_siswa_VI'] = $this->db->query("SELECT * from siswa where kelas='VI'")->num_rows();
 		$this->data['total_siswa_VII'] = $this->db->query("SELECT * from siswa where kelas='VII'")->num_rows();
 		$this->data['total_siswa_VIII'] = $this->db->query("SELECT * from siswa where kelas='VIII'")->num_rows();
 		$this->data['total_siswa_IX'] = $this->db->query("SELECT * from siswa where kelas='IX'")->num_rows();


 		$this->data['total_guru'] = $this->db->query("SELECT * from guru")->num_rows();
 		$this->data['total_karyawan'] = $this->db->query("SELECT * from karyawan")->num_rows();

		$this->data['title'] = 'Dashboard';
		$this->data['subview'] = 'dashboard/main';
		$this->load->view('components/main', $this->data);
	}
}
