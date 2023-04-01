<?php

class Guru_m extends CI_Model {   

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



    public function tampil_guru()
    {
        $query = $this->db->limit('3')->order_by('id','desc')->get('guru')->result();
        return $query;
    }

        public function tampil_semua()
    {
        $query = $this->db->order_by('id','desc')->get('guru')->result();
        return $query;
    }

    public function print_guru()
    {
        $query = $this->db->order_by('id','desc')->get('guru')->result();
        return $query;
    }
    public function getJson($input)
    {
        $table  = 'guru as a';
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