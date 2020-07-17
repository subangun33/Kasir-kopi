<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    function __construct() {
        parent::__construct();
        // if ($this->session->userdata['logged'] == TRUE)
        // { }
            
        // else
        // // {
        // //     $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
        // //     redirect('Login');
        // // }

        $this->load->model('M_client');
        $this->load->model('M_cart');
        $this->load->helper(array('form', 'url','tombol','img'));
    }

    public function index(){
          $data['client'] = $this->M_client->getSemua()->result();
          $this->load->view('dist/user/v_client', $data);
    }

   public function ajax_edit($id)
    {
        $data = $this->M_cart->add_cart($id);
        echo json_encode($data);
    }

    function ajax_update(){
        $id_detail = $this->input->post('id_detail');
        $kode_detail = $this->input->post('kode_detail');
        $refpesanan = $this->input->post('refpesanan');
        $jumlah = $this->input->post('jumlah');
        $subtotal = $this->input->post('subtotal');


    $data = array(  
         "kode_detail"      => $kode_detail,
         "refpesanan"      => $refpesanan,
         "jumlah"      => $jumlah,
         "subtotal"      => $subtotal,

            );

        $where = array(
        'id_detail' => $id
    );
 
        $this->M_cart->update($where,$data);
        echo json_encode(array("status" => TRUE));

}



}
