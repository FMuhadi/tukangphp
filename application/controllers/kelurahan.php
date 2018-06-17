<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class kelurahan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mkelurahan');
        $this->load->model('mkecamatan');

    }
    
    public function index(){
        $arraydataget = array(
            'kelurahanid'=>$this->input->get('kelurahanid'),
            'kelurahanname'=>$this->input->get('kelurahanname'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid')
        );
        $data['title']=" kelurahan ";
        $data['table']=$this->mkelurahan->select($arraydataget);
        $this->load->view('kelurahan/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mkelurahan->setr_mkecamatan($this->mkecamatan);

        $action='//'.base_url().'kelurahan/create';
        $data['title']="Add kelurahan ";
        $data['form']=$this->mkelurahan->createview($action);
        $this->load->view('kelurahan/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'kelurahanname'=>$this->input->post('kelurahanname'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid')
        );
        
        $data['form']=$this->mkelurahan->create($arraydatapost);
        redirect('//'.base_url().'/kelurahan/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit kelurahan ";
        $action='//'.base_url().'kelurahan/update/'.$slug;
        $data['form']=$this->mkelurahan->selectedit($slug,$action);
        $this->load->view('kelurahan/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'kelurahanname'=>$this->input->post('kelurahanname'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid')
        );
        $data['table']=$this->mkelurahan->update($arraydatapost,$slug);
        redirect('//'.base_url().'/kelurahan/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mkelurahan->delete($slug);
        redirect('//'.base_url().'/kelurahan/index', 'location');
    }

}