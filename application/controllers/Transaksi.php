<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['logged'] == TRUE) {
        } else {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect('Login');
        }

        $this->load->model('M_transaksi');
        $this->load->helper(array('form', 'url', 'transaksi', 'img'));
    }

    public function index()
    {
        $data = array(
            'title' => "Transaksi"
        );
        $this->load->view('dist/admin/v_transaksi', $data);
    }

    public function setView()
    {
        $result = $this->M_transaksi->getSemua_id()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                "no"             => $No,
                "id"             => $r->id_transaksi,
                "total"          => number_format($r->subtotal),
                "nama_pemesan"   => $r->nama_pemesan,
                "refdetail"      => $r->refdetail,
                "meja"           => $r->meja,
                "waktu_pemesanan"  => $r->waktu_pemesanan,
                "status"            => $r->status,
                "action"         => transaksi($r->id_transaksi)
            );

            $list[] = $row;
            $No++;
        }

        echo json_encode(array('data' => $list));
    }

    public function ajax_edit($id)
    {
        $data = $this->M_transaksi->edit($id);
        echo json_encode($data);
    }

    function ajax_update()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');


        $data = array(
            "status"          => $status
        );

        $where = array(
            'id_transaksi' => $id
        );

        $this->M_transaksi->update($where, $data);
        echo json_encode(array("status" => TRUE));
    }
}
