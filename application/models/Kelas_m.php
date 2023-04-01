<?php

class Kelas_m extends CI_Model {   

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

     public function tampil_kelas()
    {
        $query = $this->db->order_by('id','desc')->get('kelas')->result();
        return $query;
    }

    public function getJson($input)
    {
        $table  = 'kelas as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'kelas', 'new_name' => 'a.kelas']
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