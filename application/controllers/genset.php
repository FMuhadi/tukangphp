<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class genset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mgenset');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'gensetid'=>$this->input->get('gensetid'),
            'namalokasi'=>$this->input->get('namalokasi'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'kapasitas'=>$this->input->get('kapasitas'),
            'kondisi'=>$this->input->get('kondisi'),
            'keberfungsian'=>$this->input->get('keberfungsian')
        );
        $data['title']=" genset ";
        $data['table']=$this->mgenset->select($arraydataget);
        $this->load->view('genset/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mgenset->setr_mkecamatan($this->mkecamatan);
        $this->mgenset->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'genset/create';
        $data['title']="Add genset ";
        $data['form']=$this->mgenset->createview($action);
        $this->load->view('genset/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'kapasitas'=>$this->input->post('kapasitas'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        
        $data['form']=$this->mgenset->create($arraydatapost);
        redirect('//'.base_url().'/genset/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit genset ";
        $action='//'.base_url().'genset/update/'.$slug;
        $data['form']=$this->mgenset->selectedit($slug,$action);
        $this->load->view('genset/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'kapasitas'=>$this->input->post('kapasitas'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        $data['table']=$this->mgenset->update($arraydatapost,$slug);
        redirect('//'.base_url().'/genset/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mgenset->delete($slug);
        redirect('//'.base_url().'/genset/index', 'location');
    }

}