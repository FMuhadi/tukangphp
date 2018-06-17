<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class genangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mgenangan');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'genanganid'=>$this->input->get('genanganid'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'luasgenangan'=>$this->input->get('luasgenangan'),
            'lamagenangan'=>$this->input->get('lamagenangan'),
            'frekuensigenangan'=>$this->input->get('frekuensigenangan'),
            'penyebabgenangan'=>$this->input->get('penyebabgenangan'),
            'tinggigenangan'=>$this->input->get('tinggigenangan'),
            'periodeulangduatahun'=>$this->input->get('periodeulangduatahun'),
            'periodeulanglimatahun'=>$this->input->get('periodeulanglimatahun')
        );
        $data['title']=" genangan ";
        $data['table']=$this->mgenangan->select($arraydataget);
        $this->load->view('genangan/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mgenangan->setr_mkecamatan($this->mkecamatan);
        $this->mgenangan->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'genangan/create';
        $data['title']="Add genangan ";
        $data['form']=$this->mgenangan->createview($action);
        $this->load->view('genangan/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'luasgenangan'=>$this->input->post('luasgenangan'),
            'lamagenangan'=>$this->input->post('lamagenangan'),
            'frekuensigenangan'=>$this->input->post('frekuensigenangan'),
            'penyebabgenangan'=>$this->input->post('penyebabgenangan'),
            'tinggigenangan'=>$this->input->post('tinggigenangan'),
            'periodeulangduatahun'=>$this->input->post('periodeulangduatahun'),
            'periodeulanglimatahun'=>$this->input->post('periodeulanglimatahun')
        );
        
        $data['form']=$this->mgenangan->create($arraydatapost);
        redirect('//'.base_url().'/genangan/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit genangan ";
        $action='//'.base_url().'genangan/update/'.$slug;
        $data['form']=$this->mgenangan->selectedit($slug,$action);
        $this->load->view('genangan/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'luasgenangan'=>$this->input->post('luasgenangan'),
            'lamagenangan'=>$this->input->post('lamagenangan'),
            'frekuensigenangan'=>$this->input->post('frekuensigenangan'),
            'penyebabgenangan'=>$this->input->post('penyebabgenangan'),
            'tinggigenangan'=>$this->input->post('tinggigenangan'),
            'periodeulangduatahun'=>$this->input->post('periodeulangduatahun'),
            'periodeulanglimatahun'=>$this->input->post('periodeulanglimatahun')
        );
        $data['table']=$this->mgenangan->update($arraydatapost,$slug);
        redirect('//'.base_url().'/genangan/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mgenangan->delete($slug);
        redirect('//'.base_url().'/genangan/index', 'location');
    }

}