<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class kecamatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mkecamatan');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
$arraydataget = array(
            'kecamatanid'=>$this->input->get('kecamatanid'),
            'kecamatanname'=>$this->input->get('kecamatanname'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid')
        );
        $data['title']=" kecamatan ";
        $data['table']=$this->mkecamatan->select($arraydataget);
        $this->load->view('kecamatan/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mkecamatan->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'kecamatan/create';
        $data['title']="Add kecamatan ";
        $data['form']=$this->mkecamatan->createview($action);
        $this->load->view('kecamatan/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'kecamatanname'=>$this->input->post('kecamatanname'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid')
        );
        
        $data['form']=$this->mkecamatan->create($arraydatapost);
        redirect('//'.base_url().'/kecamatan/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit kecamatan ";
        $action='//'.base_url().'kecamatan/update/'.$slug;
        $data['form']=$this->mkecamatan->selectedit($slug,$action);
        $this->load->view('kecamatan/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'kecamatanname'=>$this->input->post('kecamatanname'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid')
        );
        $data['table']=$this->mkecamatan->update($arraydatapost,$slug);
        redirect('//'.base_url().'/kecamatan/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mkecamatan->delete($slug);
        redirect('//'.base_url().'/kecamatan/index', 'location');
    }

}