<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
     * Fixed Menu
     *
     * @access  public
     * @param   
     * @return  view
     */
	

    public function index()
    {   
        $this->data['title'] = 'Sekolah Maitreyawira Batam';
        $this->data['subview'] = 'home/main';


         $this->load->model('visi_m');
         $this->data['data_visi'] = $this->visi_m->get_visi();

         $this->load->model('misi_m');
         $this->data['data_misi'] = $this->misi_m->get_misi();

         $this->load->model('gallery_m');
         $this->data['data_gallery'] = $this->gallery_m->get_gallery();

         $this->load->model('berita_m');
         $this->data['data_berita'] = $this->berita_m->get_berita();

         $this->load->model('sekolah_m');
         $this->data['data_sekolah'] = $this->sekolah_m->get_sekolah();

         $this->load->model('yayasan_m');
         $this->data['data_yayasan'] = $this->yayasan_m->get_yayasan();

         $this->load->model('slide_m');
         $this->data['data_slide'] = $this->slide_m->get_slide();

         $this->load->model('tingkat_m');
         $this->data['data_tingkat'] = $this->tingkat_m->get_tingkat();


        $this->load->view('components/front_layout', $this->data);
    }



}
