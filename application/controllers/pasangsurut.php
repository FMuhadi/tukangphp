<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class pasangsurut extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mpasangsurut');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'pasangsurutid'=>$this->input->get('pasangsurutid'),
            'lokasi'=>$this->input->get('lokasi'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'tertinggi'=>$this->input->get('tertinggi'),
            'ratarata'=>$this->input->get('ratarata'),
            'terendah'=>$this->input->get('terendah')
        );
        $data['title']=" pasangsurut ";
        $data['table']=$this->mpasangsurut->select($arraydataget);
        $this->load->view('pasangsurut/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mpasangsurut->setr_mkecamatan($this->mkecamatan);
        $this->mpasangsurut->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'pasangsurut/create';
        $data['title']="Add pasangsurut ";
        $data['form']=$this->mpasangsurut->createview($action);
        $this->load->view('pasangsurut/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'lokasi'=>$this->input->post('lokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'tertinggi'=>$this->input->post('tertinggi'),
            'ratarata'=>$this->input->post('ratarata'),
            'terendah'=>$this->input->post('terendah')
        );
        
        $data['form']=$this->mpasangsurut->create($arraydatapost);
        redirect('//'.base_url().'/pasangsurut/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit pasangsurut ";
        $action='//'.base_url().'pasangsurut/update/'.$slug;
        $data['form']=$this->mpasangsurut->selectedit($slug,$action);
        $this->load->view('pasangsurut/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'lokasi'=>$this->input->post('lokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'tertinggi'=>$this->input->post('tertinggi'),
            'ratarata'=>$this->input->post('ratarata'),
            'terendah'=>$this->input->post('terendah')
        );
        $data['table']=$this->mpasangsurut->update($arraydatapost,$slug);
        redirect('//'.base_url().'/pasangsurut/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mpasangsurut->delete($slug);
        redirect('//'.base_url().'/pasangsurut/index', 'location');
    }

}