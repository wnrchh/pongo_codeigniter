<?php

class Yayasan_m extends CI_Model {   

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

        public function get_yayasan()
    {
        $query = $this->db->from('yayasan g')
                        ->select('g.*')
                        ->where('g.id', '1')
                        ->get();

        return $query->row();
    }

    public function getJson($input)
    {
        $table  = 'yayasan as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'kontak', 'new_name' => 'a.kontak']
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