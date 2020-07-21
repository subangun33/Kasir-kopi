<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{

  function __construct()
  {
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
    $this->load->helper(array('form', 'url', 'tombol', 'img'));
  }

  public function index()
  {
  }

  function detail()
  {
    $refkode    = $this->uri->segment(4);

    $cek = $this->M_transaksi->get_by_id($refkode);
    if ($cek->num_rows() > 0) {
      $data['trx']   = $this->M_transaksi->get_by_id($refkode)->result();
      foreach ($data['trx'] as $r) {
        $kode = $r->refdetail;
      }
      $data['detail']   = $this->M_cart->getSemua($kode)->result();
    } else {
      redirect(base_url('Transaksi'));
    }

    $data['title'] = "Detail";
    $this->load->view('dist/admin/v_detail', $data);
  }

  public function ajax_edit($id)
  {
    $data = $this->M_cart->get_cart($id);
    echo json_encode($data);
  }

  function detail_redirect()
  {
    $refkode    = $this->uri->segment(4);
    var_dump($refkode);

    /* $cek = $this->M_transaksi->get_by_id($refkode);
    if ($cek->num_rows() > 0) {
      $data['trx']   = $this->M_transaksi->get_by_id($refkode)->result();
      foreach ($data['trx'] as $r) {
        $kode = $r->refdetail;
      }
      $data['detail']   = $this->M_cart->getSemua($kode)->result();
    } else {
      redirect(base_url('Transaksi'));
    }

    $data['title'] = "Detail";
    $this->load->view('dist/admin/v_detail', $data); */
  }

  function ajax_update()
  {
    $id_detail = $this->input->post('id');
    $status = $this->input->post('status');
    $url = $this->input->post('url');

    if($status=="Pesanan Tidak Bisa Dibuat"){

      $data = array(
        "status"      => $status,
        "jumlah"      => "0",
        "subtotal"    => "0",
  
      );
  
      $where = array(
        'id_detail' => $id_detail
      );

      $this->M_cart->update($where, $data);
      
      //update total transaksi
      $refkode    = $this->input->post('kode');
      $user       = $this->M_cart->total($refkode);
      $total      = $user->subtotal;

      $data2 = array(
        "total"          => $total 
      );

      $where2 = array(
          'refdetail' => $refkode 
      );

      $this->M_transaksi->update($where2, $data2);
      redirect($url);
    }else{

    $data = array(
      "status"      => $status,

    );

    $where = array(
      'id_detail' => $id_detail
    );

    $this->M_cart->update($where, $data);
    redirect($url);
    }
  }
}
