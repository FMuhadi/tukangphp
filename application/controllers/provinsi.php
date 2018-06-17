<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class provinsi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mprovinsi');
        
    }
    
    public function index(){
        $arraydataget = array(
            'provinsiid'=>$this->input->get('provinsiid'),
            'provinsiname'=>$this->input->get('provinsiname')
        );
        $data['title']=" provinsi ";
        $data['table']=$this->mprovinsi->select($arraydataget);
        $this->load->view('provinsi/index',$data);
    }

    public function add($slug=false){
        //set function

        $action='//'.base_url().'provinsi/create';
        $data['title']="Add provinsi ";
        $data['form']=$this->mprovinsi->createview($action);
        $this->load->view('provinsi/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'provinsiname'=>$this->input->post('provinsiname')
        );
        
        $data['form']=$this->mprovinsi->create($arraydatapost);
        redirect('//'.base_url().'/provinsi/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit provinsi ";
        $action='//'.base_url().'provinsi/update/'.$slug;
        $data['form']=$this->mprovinsi->selectedit($slug,$action);
        $this->load->view('provinsi/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'provinsiname'=>$this->input->post('provinsiname')
        );
        $data['table']=$this->mprovinsi->update($arraydatapost,$slug);
        redirect('//'.base_url().'/provinsi/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mprovinsi->delete($slug);
        redirect('//'.base_url().'/provinsi/index', 'location');
    }

}