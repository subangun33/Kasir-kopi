<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    function __construct() {
        parent::__construct();
    //     if ($this->session->userdata['logged'] == TRUE)
    //     { }
            
    //     else
    //     {
    //         $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
    //         redirect('Login');
    //     }

        $this->load->model('M_cart');
        $this->load->model('M_menu');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','tombol','img'));
    }

    public function index(){
         $data = array(
            'title' => "Cart"
        );
        $this->load->view('dist/user/v_cart', $data);
    }

     public function ajax_delete($id)
    {
        $this->M_cart->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }

    
    
       public function ajax_edit($id)
    {
        $data = $this->M_cart->get_cart($id);
        echo json_encode($data);
    }

    function ajax_update(){
        $id_detail = $this->input->post('id_detail');
        $kode_detail = $this->input->post('kode_detail');
        $refpesanan = $this->input->post('refpesanan');
        $jumlah = $this->input->post('jumlah');
        $subtotal = $this->input->post('subtotal');
        $status = $this->input->post('status');

        

    $data = array(  
         "kode_detail"      => $kode_detail,
         "refpesanan"      => $refpesanan,
         "jumlah"      => $jumlah,
         "subtotal"      => $subtotal,
        "status"      => $status,

            );

        $where = array(
        'id_detail' => $id
    );
 
        $this->M_cart->update($where,$data);
        echo json_encode(array("status" => TRUE));
    

}



    public function setView(){
        $refkode    =$this->session->userdata("kode");
        $result = $this->M_cart->getSemua($refkode)->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"            => $No,
                        "id"            => $r->id_detail,
                        "kode_detail"   => $r->kode_detail,
                        "refpesanan"    => $r->nama_menu,
                        "jumlah"        => $r->jumlah,
                        "subtotal"      => $r->subtotal,
                        "status"        => $r->status,
                        "action"        => tombol($r->id_detail)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }


function ajax_add(){

        $jumlah = $this->input->post('jumlah');
        $refpesanan  = $this->input->post('kode');
        $harga  = $this->input->post('harga');       
        $user = $this->session->userdata('kode');
        //cek apalah
        $cek = $this->M_cart->cek_cart($user,$refpesanan)->result();
            foreach ($cek as $r) {
                $cek_jumlah = intval($r->jumlah);
            }
        if($cek_jumlah + $jumlah >= 21){ 

        }else{

        //max batas sekali input
        if($jumlah>= 20){

        }else {

        //cek_detail
        $verify_cart=$this->M_cart->cek_cart($user,$refpesanan)->num_rows();
        //ketika true
        if ($verify_cart > 0) {
            $cart_qty = $this->M_cart->cek_cart($user,$refpesanan)->result();
            foreach ($cart_qty as $r) {
                $cart_jumlah = intval($r->jumlah);
            }

        $qty = intval($jumlah)+$cart_jumlah;
        $subtotal = $qty*$harga;

          $data = array(
            "jumlah"      => $qty,
            "subtotal"    => $subtotal,
            );

          $where= array(
            "kode_detail" => $user,
            "refpesanan"   => $refpesanan

          );

          $this->M_cart->update($where,$data);
          echo json_encode(array("status" => TRUE)); 

        }else{
           
            
            $subtotal = $jumlah*$harga;
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now        = date('Y-m-d H:i:s');
            $data = array(
            "refpesanan"  => $refpesanan,
            "jumlah"      => $jumlah,
            "subtotal"    => $subtotal,
            "kode_detail" => $user,
            "waktu"      => $now,
            "status"      => "Pesanan Terkonfirmasi"
            
            );


        $this->M_cart->inputdata($data,'detail');
        echo json_encode(array("status" => TRUE)); 
            }   
        }  
        }
    }

    function total(){
        $id  = $this->input->post('id');
        $refpesanan  = $this->input->post('refpesanan');
        $jumlah  = $this->input->post('jumlah');
        $user = $this->session->userdata('kode');
        //cek apalah
        $cek = $this->M_cart->cek_cart($user,$refpesanan)->result();
            foreach ($cek as $r) {
                $cek_jumlah = intval($r->jumlah);
            }

        //max batas sekali input
        if($jumlah>= 21){

        }else {
        $total = $this->M_menu->get_harga($refpesanan)->result();
            foreach ($total as $r) {
                $harga = intval($r->harga_menu);
            }

        $subtotal = $jumlah*$harga;

          $data = array(
            "jumlah"      => $jumlah,
            "subtotal"    => $subtotal,
            );

          $where= array(
            "id_detail" => $id
          );

          $this->M_cart->update($where,$data);
          echo json_encode(array("status" => TRUE)); 
      }

    }

    public function gettotal(){
        $refkode    = $this->session->userdata("kode");
        $user       = $this->M_cart->total($refkode);
        
        echo json_encode(array(
            'total'    => $user->subtotal,
            )
        );
    }

    function save_pesanan(){
        $nama_pemesan  = $this->session->userdata("nama");
        $no_meja = $this->session->userdata("meja");
        $no_hp  = $this->session->userdata("no_hp");  
        $refkode    = $this->session->userdata("kode");
        $user       = $this->M_cart->total($refkode);

        $total_harga  = $user->subtotal;
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now        = date('Y-m-d H:i:s');

        $data = array(
            "total"                => $total_harga,
            "nama_pemesan"         => $nama_pemesan,
            "refdetail"            => $refkode,
            "meja"                  => $no_meja, 
            "no_hp"                => $no_hp,
            "waktu_pemesanan"      => $now
            
            );


        $this->M_cart->inputdata($data,'transaksi');
        echo json_encode(array("status" => TRUE)); 
        
            
    }


 

}
