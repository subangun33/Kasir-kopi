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
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','tombol','img'));
    }

    public function index(){
         $data = array(
            'title' => "Detail"
        );
        $this->load->view('dist/user/v_detail', $data);
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

 

}
