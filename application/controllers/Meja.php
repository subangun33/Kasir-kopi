<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata['logged'] == TRUE)
        { }
            
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect('Login');
        }

        $this->load->model('M_meja');
        $this->load->helper(array('form', 'url','tombol','add'));
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    }

    public function index(){
         $data = array(
            'title' => "Meja"
        );
        $this->load->view('dist/admin/v_meja', $data);
    }


public function setView(){
        $result = $this->M_meja->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"             => $No,
                        "id"             => $r->id_meja,
                        "kode_meja"      => $r->kode_meja,
                        "no_meja"      => $r->no_meja,
                        "qr_code"      => add($r->qr_code),
                        "action"         => tombol($r->id_meja)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

     public function ajax_delete($id)
    {
        $this->M_meja->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }



    function ajax_add(){


        $kode_meja = $this->input->post('kode');
        $no_meja = $this->input->post('no_meja');
        
       
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qr_code/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$kode_meja.'.png'; //buat name dari qr code sesuai dengan kode_meja
 
        $params['data'] = $kode_meja; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $data = array(
            "kode_meja"      => $kode_meja,
            "no_meja"      => $no_meja,
            "qr_code"       => $image_name
            
            );

        $this->M_meja->inputdata($data,'meja');
        echo json_encode(array("status" => TRUE));  
     
           
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_meja->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){
        $id = $this->input->post('id');
        $kode_meja = $this->input->post('kode');
        $no_meja = $this->input->post('no_meja');


    $data = array(  
         "kode_meja"      => $kode_meja,
         "no_meja"      => $no_meja,
            );

        $where = array(
        'id_meja' => $id
    );
 
        $this->M_meja->update($where,$data);
        echo json_encode(array("status" => TRUE));

}
}
