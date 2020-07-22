<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    
    function getSemua($refkode = null){
        $this->db->select('detail.id_detail,detail.kode_detail,menu.nama_menu,detail.jumlah,detail.subtotal,detail.status');
        $this->db->from('detail');
        $this->db->join('menu','menu.kode_menu=detail.refpesanan','left');
        $this->db->where('kode_detail',$refkode);
        $this->db->order_by('waktu', 'DESC');
        $query=$this->db->get();
        return $query;

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
     $query = $this->db->query("SELECT * from detail where detail.id_detail='$id'");
    return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('id_detail', $id);
        $this->db->delete('detail');
    }  
     public function update($where, $data)
    {
        $this->db->update('detail', $data, $where);
    }

    function add_cart($id){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('menu.id_menu',$id);
        $query=$this->db->get();
        return $query->row();
        
    }

    function get_cart($id){
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('id_detail',$id);
        $query=$this->db->get();
        return $query->row();
        
    }

    public function cek_cart ($user,$kode_menu){
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('detail.kode_detail',$user);
        $this->db->where('detail.refpesanan',$kode_menu);
        $this->db->where('detail.status',"Pesanan Terkonfirmasi");
        $query = $this->db->get();
        return $query;
    }

    function total($id){

        $this->db->select_sum('subtotal');
        $this->db->where('kode_detail',$id);
        $query = $this->db->get('detail');
        return $query->row();
    }

    function get_no_penjualan(){
        $q = $this->db->query("SELECT MAX(RIGHT(kode_detail,4)) AS kd_max FROM detail WHERE DATE(waktu)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('Y-m-d').$kd;
    }
 
 

}
