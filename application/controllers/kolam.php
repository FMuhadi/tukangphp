<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class kolam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mkolam');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'kolamid'=>$this->input->get('kolamid'),
            'kolamtype'=>$this->input->get('kolamtype'),
            'namakawasan'=>$this->input->get('namakawasan'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'panjang'=>$this->input->get('panjang'),
            'lebar'=>$this->input->get('lebar'),
            'luas'=>$this->input->get('luas'),
            'volume'=>$this->input->get('volume'),
            'kondisi'=>$this->input->get('kondisi'),
            'keberfungsian'=>$this->input->get('keberfungsian')
        );
        $data['title']=" kolam ";
        $data['table']=$this->mkolam->select($arraydataget);
        $this->load->view('kolam/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mkolam->setr_mkecamatan($this->mkecamatan);
        $this->mkolam->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'kolam/create';
        $data['title']="Add kolam ";
        $data['form']=$this->mkolam->createview($action);
        $this->load->view('kolam/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'kolamtype'=>$this->input->post('kolamtype'),
            'namakawasan'=>$this->input->post('namakawasan'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'panjang'=>$this->input->post('panjang'),
            'lebar'=>$this->input->post('lebar'),
            'luas'=>$this->input->post('luas'),
            'volume'=>$this->input->post('volume'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        
        $data['form']=$this->mkolam->create($arraydatapost);
        redirect('//'.base_url().'/kolam/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit kolam ";
        $action='//'.base_url().'kolam/update/'.$slug;
        $data['form']=$this->mkolam->selectedit($slug,$action);
        $this->load->view('kolam/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'kolamtype'=>$this->input->post('kolamtype'),
            'namakawasan'=>$this->input->post('namakawasan'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'panjang'=>$this->input->post('panjang'),
            'lebar'=>$this->input->post('lebar'),
            'luas'=>$this->input->post('luas'),
            'volume'=>$this->input->post('volume'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        $data['table']=$this->mkolam->update($arraydatapost,$slug);
        redirect('//'.base_url().'/kolam/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mkolam->delete($slug);
        redirect('//'.base_url().'/kolam/index', 'location');
    }

}