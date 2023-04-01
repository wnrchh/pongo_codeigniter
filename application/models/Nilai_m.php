<?php

class Nilai_m extends CI_Model {   

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

    public function getJson($input)
    {
        $table  = 'nilai as a';
        $select = 'a.id, b.nama, c.mata_pelajaran, a.nilai_angka, a.nilai_huruf, a.keterangan , a.siswa_id ';

        $replace_field  = [
            ['old_name' => 'nama', 'new_name' => 'b.nama']
        ];

        $param = [
            'input'     => $input,
            'select'    => $select,
            'table'     => $table,
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            return $data->join('siswa as b', 'b.id = a.siswa_id', 'left')
                        ->join('mata_pelajaran as c', 'c.id = a.mata_pelajaran_id', 'left');
        });

        return $data;
    }

}