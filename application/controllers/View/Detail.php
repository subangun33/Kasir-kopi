<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

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
         $this->load->model('M_transaksi');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','tombol','img'));
    }

    public function index(){
        
    }   

    function detail() {
        $refkode    = $this->uri->segment(4);

    $cek = $this->M_transaksi->get_by_id($refkode);
      if($cek->num_rows()>0){ 
        $data['trx']   = $this->M_transaksi->get_by_id($refkode)->result();
        foreach ($data['trx'] as $r) {
          $kode = $r->refdetail;
        }
        $data['detail']   = $this->M_cart->getSemua($kode)->result();
      }else {
        redirect(base_url('view/transaksi'));
      }

      $data['title'] = "Detail";
      $this->load->view('dist/admin/v_detail',$data);
      

    } 
    
       public function ajax_edit($id)
    {
        $data = $this->M_cart->get_cart($id);
        echo json_encode($data);
    }

    function ajax_update(){
        $id_detail = $this->input->post('id_detail');
        // $kode_detail = $this->input->post('kode_detail');
        // $refpesanan = $this->input->post('refpesanan');
        // $jumlah = $this->input->post('jumlah');
        // $subtotal = $this->input->post('subtotal');
        $status = $this->input->post('status');

        

    $data = array(  
         // "kode_detail"      => $kode_detail,
         // "refpesanan"      => $refpesanan,
         // "jumlah"      => $jumlah,
         // "subtotal"      => $subtotal,
        "status"      => $status,

            );

        $where = array(
        'id_detail' => $id
    );
 
        $this->M_cart->update($where,$data);
        echo json_encode(array("status" => TRUE));
    

}


 

}
