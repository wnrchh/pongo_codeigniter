<?php

class Siswa_m extends CI_Model {   

    function __construct()
    {
        parent::__construct();
        $this->load->library('datagrid');
    }

    /**
     * Datagrid Data
     *
     * @access  public
     * @param   
     * @return  json(array)
     */
    public function all()
    {
        $siswa = $this->db->order_by('nama','asc')->get('siswa')->result();
        return $siswa;
    }

    public function get_id($id)
    {
        $siswa = $this->db->where('id', $id)->get('siswa')->result();
        return $siswa;
    }
    public function tampil_siswa()
    {
        $query = $this->db->limit('3')->order_by('id','desc')->get('siswa')->result();
        return $query;
    }

        public function print_siswa()
    {
        $query = $this->db->order_by('id','desc')->get('siswa')->result();
        return $query;
    }
    public function getJson($input)
    {
        $table  = 'siswa as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'nama', 'new_name' => 'a.nama']
        ];

        $param = [
            'input'     => $input,
            'select'    => $select,
            'table'     => $table,
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data;
        });

        return $data;
    }

}