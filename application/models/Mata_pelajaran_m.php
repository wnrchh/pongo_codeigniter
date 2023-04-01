<?php

class Mata_pelajaran_m extends CI_Model {   

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
        $mata_pelajaran = $this->db->order_by('mata_pelajaran','asc')->get('mata_pelajaran')->result();
        return $mata_pelajaran;
    }

    

    public function getJson($input)
    {
        $table  = 'mata_pelajaran as a';
        $select = 'a.*';

        $replace_field  = [
            ['old_name' => 'mata_pelajaran', 'new_name' => 'a.mata_pelajaran']
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