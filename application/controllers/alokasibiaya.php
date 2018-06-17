<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class alokasibiaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('malokasibiaya');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'alokasibiayaid'=>$this->input->get('alokasibiayaid'),
            'alokasibiayatahun'=>$this->input->get('alokasibiayatahun'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'apbn'=>$this->input->get('apbn'),
            'apbdprovinsi'=>$this->input->get('apbdprovinsi'),
            'apbddaerah'=>$this->input->get('apbddaerah'),
            'dak'=>$this->input->get('dak'),
            'hibah'=>$this->input->get('hibah'),
            'csr'=>$this->input->get('csr')
        );
        $data['title']=" alokasibiaya ";
        $data['table']=$this->malokasibiaya->select($arraydataget);
        $this->load->view('alokasibiaya/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->malokasibiaya->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'alokasibiaya/create';
        $data['title']="Add alokasibiaya ";
        $data['form']=$this->malokasibiaya->createview($action);
        $this->load->view('alokasibiaya/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'alokasibiayatahun'=>$this->input->post('alokasibiayatahun'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'apbn'=>$this->input->post('apbn'),
            'apbdprovinsi'=>$this->input->post('apbdprovinsi'),
            'apbddaerah'=>$this->input->post('apbddaerah'),
            'dak'=>$this->input->post('dak'),
            'hibah'=>$this->input->post('hibah'),
            'csr'=>$this->input->post('csr')
        );
        
        $data['form']=$this->malokasibiaya->create($arraydatapost);
        redirect('//'.base_url().'/alokasibiaya/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit alokasibiaya ";
        $action='//'.base_url().'alokasibiaya/update/'.$slug;
        $data['form']=$this->malokasibiaya->selectedit($slug,$action);
        $this->load->view('alokasibiaya/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'alokasibiayatahun'=>$this->input->post('alokasibiayatahun'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'apbn'=>$this->input->post('apbn'),
            'apbdprovinsi'=>$this->input->post('apbdprovinsi'),
            'apbddaerah'=>$this->input->post('apbddaerah'),
            'dak'=>$this->input->post('dak'),
            'hibah'=>$this->input->post('hibah'),
            'csr'=>$this->input->post('csr')
        );
        $data['table']=$this->malokasibiaya->update($arraydatapost,$slug);
        redirect('//'.base_url().'/alokasibiaya/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->malokasibiaya->delete($slug);
        redirect('//'.base_url().'/alokasibiaya/index', 'location');
    }

}