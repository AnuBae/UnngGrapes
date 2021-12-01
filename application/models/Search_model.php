<?php

class Search_model extends CI_Model
{

    public function getLowongan($arrKeyword)
    {
        foreach ($arrKeyword as $arrKey) {
            $this->db->or_like('stem_detail', $arrKey);
        }

        return $this->db->get('lowongan')->result_array();
    }

    public function cekKeyword($Keyword)
    {
        foreach ($Keyword as $key) {
            $dataKeyword = $this->db->get_where('keyword', array('word' => $key))->num_rows();

            if ($dataKeyword == 0) {
                $this->db->insert('keyword', array('word' => $key));
            }
        }
    }
}
