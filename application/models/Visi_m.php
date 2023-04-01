<?php

class Visi_m extends CI_Model {   

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

        public function get_visi()
    {
        $query = $this->db->from('visi g')
                        ->select('g.*')
                        ->where('g.id', '1')
                        ->get();

        return $query->row();
    }

    public function getJson($input)
    {
        $table  = 'visi as a';
        $select = 'a.*, SUBSTRING(a.keterangan,1,180) as keteranganpendek';

        $replace_field  = [
            ['old_name' => 'judul', 'new_name' => 'a.judul'],
            ['old_name' => 'keteranganpendek', 'new_name' => 'a.keterangan']
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