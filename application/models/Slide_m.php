<?php

class Slide_m extends CI_Model {   

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

public function get_slide()
    {
        $query = $this->db->from('slide g')
                        ->select('g.*')
                        
                        ->order_by('id','DESC')
                        ->limit('4')
                        ->get();

        return $query->result();
    }
       
    public function getJson($input)
    {
        $table  = 'slide as a';
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