<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();
        // if ($this->session->userdata['logged'] == TRUE)
        // { }
            
        // else
        // {
        //     $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
        //     redirect('Login');
        // }

        $this->load->model('M_menu');
        $this->load->helper(array('form', 'url','tombol'));
    }

    public function index(){
         $data = array(
            'title' => "Menu"
        );
        $this->load->view('dist/layout-default', $data);
    }

public function setView(){
        $result = $this->M_menu->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"             => $No,
                        "id"             => $r->id_menu,
                        "kode_menu"      => $r->kode_menu,
                        "nama_menu"      => $r->nama_menu,
                        "harga_menu"     => $r->harga_menu,
                        "gambar"         => $r->gambar,
                        "aktif"          => $r->aktif,
                        "action"         => tombol($r->id_menu)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

     public function ajax_delete($id)
    {
        $this->M_menu->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_add(){

        $kode_menu = $this->input->post('kode');
        $nama_menu = $this->input->post('nama');
        $harga_menu = $this->input->post('harga');
        $gambar = $this->input->post('gambar');
        $aktif = $this->input->post('aktif');
 
        $data = array(
            "kode_menu"      => $kode_menu,
            "nama_menu"      => $nama_menu,
            "harga_menu"     => $harga_menu,
            "gambar"         => $aktif,         //var $aktif diganti hasil update gambar
            "aktif"          => $aktif,
            
            );

        $this->M_menu->inputdata($data,'menu');
        echo json_encode(array("status" => TRUE));    
           
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_menu->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){
        $id = $this->input->post('id');
        $kode_menu = $this->input->post('kode');
        $nama_menu = $this->input->post('nama');
        $harga_menu = $this->input->post('harga');
        $gambar = $this->input->post('gambar');
        $aktif = $this->input->post('aktif');

    $data = array(  
         "kode_menu"      => $kode_menu,
         "nama_menu"      => $nama_menu,
         "harga_menu"     => $harga_menu,
        // "gambar"         => $r->gambar,  //perlu coding update gambar
         "aktif"          => $aktif,
            );

        $where = array(
        'id_menu' => $id
    );
 
        $this->M_menu->update($where,$data);
        echo json_encode(array("status" => TRUE));

}
}
