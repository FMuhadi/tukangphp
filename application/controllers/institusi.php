<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class institusi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('minstitusi');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'institusiid'=>$this->input->get('institusiid'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'namainstitusi'=>$this->input->get('namainstitusi'),
            'jabatanpengelola'=>$this->input->get('jabatanpengelola'),
            'eselonjabatan'=>$this->input->get('eselonjabatan'),
            'pns'=>$this->input->get('pns'),
            'nonpns'=>$this->input->get('nonpns'),
            'jumlah'=>$this->input->get('jumlah'),
            'strukturorganisasi'=>$this->input->get('strukturorganisasi'),
            'luluss2s3'=>$this->input->get('luluss2s3'),
            'luluss1'=>$this->input->get('luluss1'),
            'lulusd3'=>$this->input->get('lulusd3'),
            'lulussma'=>$this->input->get('lulussma'),
            'lulussmp'=>$this->input->get('lulussmp'),
            'total'=>$this->input->get('total')
        );
        $data['title']=" institusi ";
        $data['table']=$this->minstitusi->select($arraydataget);
        $this->load->view('institusi/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->minstitusi->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'institusi/create';
        $data['title']="Add institusi ";
        $data['form']=$this->minstitusi->createview($action);
        $this->load->view('institusi/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'institusiid'=>$this->input->post('institusiid'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'namainstitusi'=>$this->input->post('namainstitusi'),
            'jabatanpengelola'=>$this->input->post('jabatanpengelola'),
            'eselonjabatan'=>$this->input->post('eselonjabatan'),
            'pns'=>$this->input->post('pns'),
            'nonpns'=>$this->input->post('nonpns'),
            'jumlah'=>$this->input->post('jumlah'),
            'strukturorganisasi'=>$this->input->post('strukturorganisasi'),
            'luluss2s3'=>$this->input->post('luluss2s3'),
            'luluss1'=>$this->input->post('luluss1'),
            'lulusd3'=>$this->input->post('lulusd3'),
            'lulussma'=>$this->input->post('lulussma'),
            'lulussmp'=>$this->input->post('lulussmp'),
            'total'=>$this->input->post('total')
        );
        
        $data['form']=$this->minstitusi->create($arraydatapost);
        redirect('//'.base_url().'/institusi/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit institusi ";
        $action='//'.base_url().'institusi/update/'.$slug;
        $data['form']=$this->minstitusi->selectedit($slug,$action);
        $this->load->view('institusi/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'institusiid'=>$this->input->post('institusiid'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'namainstitusi'=>$this->input->post('namainstitusi'),
            'jabatanpengelola'=>$this->input->post('jabatanpengelola'),
            'eselonjabatan'=>$this->input->post('eselonjabatan'),
            'pns'=>$this->input->post('pns'),
            'nonpns'=>$this->input->post('nonpns'),
            'jumlah'=>$this->input->post('jumlah'),
            'strukturorganisasi'=>$this->input->post('strukturorganisasi'),
            'luluss2s3'=>$this->input->post('luluss2s3'),
            'luluss1'=>$this->input->post('luluss1'),
            'lulusd3'=>$this->input->post('lulusd3'),
            'lulussma'=>$this->input->post('lulussma'),
            'lulussmp'=>$this->input->post('lulussmp'),
            'total'=>$this->input->post('total')
        );
        $data['table']=$this->minstitusi->update($arraydatapost,$slug);
        redirect('//'.base_url().'/institusi/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->minstitusi->delete($slug);
        redirect('//'.base_url().'/institusi/index', 'location');
    }

}