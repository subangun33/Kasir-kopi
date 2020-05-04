<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_meja extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    function getSemua(){
        $sql    =   "SELECT * from meja";
                    
        return $this-> DbHelper->execQuery($sql);

    }


function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function inputdata($data2,$table){
        $this->db->insert($table,$data2);
    }

    public function edit($id)
    {
     $query = $this->db->query("SELECT * from meja where meja.id_meja='$id'");
    return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('id_meja', $id);
        $this->db->delete('meja');
    }  
     public function update($where, $data)
    {
        $this->db->update('meja', $data, $where);
    }
 

}
