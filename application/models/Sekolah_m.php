<?php

class Sekolah_m extends CI_Model {   

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

public function get_sekolah()
    {
        $query = $this->db->from('sekolah g')
                        ->select('g.*')
                        ->where('g.id', '1')
                        ->get();

        return $query->row();
    }
       
    public function getJson($input)
    {
        $table  = 'sekolah as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'kbtk', 'new_name' => 'a.kbtk']
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