<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class petadrainase extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mpetadrainase');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'petadrainaseid'=>$this->input->get('petadrainaseid'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'petadrainasejalan'=>$this->input->get('petadrainasejalan'),
            'petagenangan'=>$this->input->get('petagenangan'),
            'petapeilbanjir'=>$this->input->get('petapeilbanjir'),
            'petajaringanbangunan'=>$this->input->get('petajaringanbangunan'),
            'petaarahaliran'=>$this->input->get('petaarahaliran'),
            'petazonasi'=>$this->input->get('petazonasi')
        );
        $data['title']=" petadrainase ";
        $data['table']=$this->mpetadrainase->select($arraydataget);
        $this->load->view('petadrainase/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mpetadrainase->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'petadrainase/create';
        $data['title']="Add petadrainase ";
        $data['form']=$this->mpetadrainase->createview($action);
        $this->load->view('petadrainase/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'petadrainasejalan'=>$this->input->post('petadrainasejalan'),
            'petagenangan'=>$this->input->post('petagenangan'),
            'petapeilbanjir'=>$this->input->post('petapeilbanjir'),
            'petajaringanbangunan'=>$this->input->post('petajaringanbangunan'),
            'petaarahaliran'=>$this->input->post('petaarahaliran'),
            'petazonasi'=>$this->input->post('petazonasi')
        );
        
        $data['form']=$this->mpetadrainase->create($arraydatapost);
        redirect('//'.base_url().'/petadrainase/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit petadrainase ";
        $action='//'.base_url().'petadrainase/update/'.$slug;
        $data['form']=$this->mpetadrainase->selectedit($slug,$action);
        $this->load->view('petadrainase/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'petadrainasejalan'=>$this->input->post('petadrainasejalan'),
            'petagenangan'=>$this->input->post('petagenangan'),
            'petapeilbanjir'=>$this->input->post('petapeilbanjir'),
            'petajaringanbangunan'=>$this->input->post('petajaringanbangunan'),
            'petaarahaliran'=>$this->input->post('petaarahaliran'),
            'petazonasi'=>$this->input->post('petazonasi')
        );
        $data['table']=$this->mpetadrainase->update($arraydatapost,$slug);
        redirect('//'.base_url().'/petadrainase/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mpetadrainase->delete($slug);
        redirect('//'.base_url().'/petadrainase/index', 'location');
    }

}