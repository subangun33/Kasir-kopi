<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scanqr extends CI_Controller {

    function __construct() {
        parent::__construct();
        // if ($this->session->userdata['logged'] == TRUE)
        // { }
            
        // else
        // {
        //     $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
        //     redirect('Login');
        // }

        $this->load->model('M_meja');
        $this->load->model('M_cart');
        $this->load->model('M_transaksi');
        $this->load->helper(array('form', 'url','tombol','img'));
    }

    public function index(){
         $data = array(
            'title' => "Scan-QR Begin"
        );
        $this->load->view('dist/user/v_scanqr', $data);
    }

    public function success(){
        $data = array(
           'title' => "Scan-QR Done"
       );
       $this->load->view('dist/user/v_success', $data);
   }

function aksi_scan(){
        $nama       = $this->input->post('nama');
        $no_hp      = $this->input->post('no_hp');
        $decodeqr   = $this->input->post('decodeqr');
        $kode       = $this->M_cart->get_no_penjualan();
        $where      = array(
            'kode_meja' => $decodeqr,
            );
        
        //user lama
        $cek_lama = $this->M_transaksi->cek($nama,$decodeqr,$no_hp)->num_rows();
        if($cek_lama > 0) { 

             $refpesanan = $this->M_transaksi->cek($nama,$decodeqr,$no_hp)->result();
            foreach ($refpesanan as $r) {
                $refdetail = $r->refdetail;
            }

            $data_session = array(
                'nama'     => $nama,
                'no_hp'   =>$no_hp,
                'kode'   =>$refdetail,
                'meja'   =>$decodeqr,
                'logged'   => TRUE,
                
            );
            
            $this->session->set_userdata($data_session);

            $this->session->set_flashdata('message', '<div  class="col-md-3 alrt-success alert-dismissible" data-dismiss="alert" aria-hidden="true" >
                <i class="icon fa fa-check"></i>
                Login Sukses
              </div>');
                redirect('view/Cart');

        }else{

         // //cek status meja
        $status_meja = $this->M_transaksi->status_meja($decodeqr)->num_rows();
         if($status_meja > 0){ 
            $this->session->set_flashdata('message', '<div style="color : red;">Qr-Code tidak valid !</div>');
            redirect('Scanqr'); 
        } else {

        //user baru
        $cek = $this->M_meja->cek_meja("meja",$where)->num_rows();
        if($cek > 0){
           $query = $this->db->query("SELECT
                                    meja.kode_meja,
                                    meja.no_meja
                                    FROM meja where meja.kode_meja='$decodeqr'
                                    ");
            $row = $query->row();
            $data_session = array(
                'nama'     => $nama,
                'no_hp'   =>$no_hp,
                'kode'   =>$kode,
                'meja'   =>$decodeqr,
                'logged'   => TRUE,
                
            );
            
            $this->session->set_userdata($data_session);

            $this->session->set_flashdata('message', '<div  class="col-md-3 alrt-success alert-dismissible" data-dismiss="alert" aria-hidden="true" >
                <i class="icon fa fa-check"></i>
                Login Sukses
              </div>');
                redirect('view/Client');

        }else{
            $this->session->set_flashdata('message', '<div style="color : red;">Qr-Code tidak valid !</div>');
            redirect('Scanqr');
        }

        }

        }
    }
    
    function logout(){
        $this->session->unset_userdata('logged');
        redirect(base_url('login'));
    }

}
