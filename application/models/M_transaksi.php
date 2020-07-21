<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    function getSemua(){
        $sql    =   "SELECT * from transaksi";
                    
        return $this-> DbHelper->execQuery($sql);

    }

    function getSemua_id(){
        $this->db->select('transaksi.*');
        $this->db->select_sum('detail.subtotal');
        $this->db->from('transaksi');
        $this->db->join('detail','transaksi.refdetail=detail.kode_detail','left');
        $query=$this->db->get();
        return $query;
    }

    function cek($nama,$meja,$hp){
         $this->db->where('nama_pemesan',$nama);
         $this->db->where('meja',$meja);
         $this->db->where('no_hp',$hp);
         $this->db->where('status',"Pesanan Belum Dibayar");
        return $this->db->get('transaksi');
    }

    function status_meja($meja){
         $this->db->where('meja',$meja);
         $this->db->where('status',"Pesanan Belum Dibayar");
        return $this->db->get('transaksi');
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
     $query = $this->db->query("SELECT * from transaksi where transaksi.id_transaksi='$id'");
    return $query->row(); 
    }

    public function get_by_id($id)
    {
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get('transaksi');
        return $query;
    } 

     public function delete_by_kode($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }  
     public function update($where, $data)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function cek_transaksi ($refdetail){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('refdetail',$refdetail);
        $query = $this->db->get();
        return $query;
    }
 

}
