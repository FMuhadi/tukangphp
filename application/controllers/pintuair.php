<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class pintuair extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mpintuair');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'pintuairid'=>$this->input->get('pintuairid'),
            'namalokasi'=>$this->input->get('namalokasi'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'tinggi'=>$this->input->get('tinggi'),
            'lebar'=>$this->input->get('lebar'),
            'elevasidasar'=>$this->input->get('elevasidasar'),
            'elevasinormal'=>$this->input->get('elevasinormal'),
            'elevasimaximum'=>$this->input->get('elevasimaximum'),
            'kondisi'=>$this->input->get('kondisi'),
            'keberfungsian'=>$this->input->get('keberfungsian')
        );
        $data['title']=" pintuair ";
        $data['table']=$this->mpintuair->select($arraydataget);
        $this->load->view('pintuair/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mpintuair->setr_mkecamatan($this->mkecamatan);
        $this->mpintuair->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'pintuair/create';
        $data['title']="Add pintuair ";
        $data['form']=$this->mpintuair->createview($action);
        $this->load->view('pintuair/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'tinggi'=>$this->input->post('tinggi'),
            'lebar'=>$this->input->post('lebar'),
            'elevasidasar'=>$this->input->post('elevasidasar'),
            'elevasinormal'=>$this->input->post('elevasinormal'),
            'elevasimaximum'=>$this->input->post('elevasimaximum'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        
        $data['form']=$this->mpintuair->create($arraydatapost);
        redirect('//'.base_url().'/pintuair/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit pintuair ";
        $action='//'.base_url().'pintuair/update/'.$slug;
        $data['form']=$this->mpintuair->selectedit($slug,$action);
        $this->load->view('pintuair/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'tinggi'=>$this->input->post('tinggi'),
            'lebar'=>$this->input->post('lebar'),
            'elevasidasar'=>$this->input->post('elevasidasar'),
            'elevasinormal'=>$this->input->post('elevasinormal'),
            'elevasimaximum'=>$this->input->post('elevasimaximum'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        $data['table']=$this->mpintuair->update($arraydatapost,$slug);
        redirect('//'.base_url().'/pintuair/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mpintuair->delete($slug);
        redirect('//'.base_url().'/pintuair/index', 'location');
    }

}