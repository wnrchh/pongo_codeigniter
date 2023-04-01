<?php

class Tingkat_m extends CI_Model {   

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

public function get_tingkat()
    {
        $query = $this->db->from('tingkat g')
                        ->select('g.*')
                        
                        ->order_by('id','asc')
                        ->LIMIT('5')
                        ->get();

        return $query->result();
    }
       
    public function getJson($input)
    {
        $table  = 'tingkat as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'foto', 'new_name' => 'a.foto']
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