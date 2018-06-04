<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class kabupatenkota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mkabupatenkota');
        $this->load->model('mprovinsi');

    }
    
    public function index(){
$arraydataget = array(
            'kabupatenkotaid'=>$this->input->get('kabupatenkotaid'),
            'kabupatenkotaname'=>$this->input->get('kabupatenkotaname'),
            'r_provinsiid'=>$this->input->get('r_provinsiid'),
            'kabupatenkotalat'=>$this->input->get('kabupatenkotalat'),
            'kabupatenkotalong'=>$this->input->get('kabupatenkotalong')
        );
        $data['title']=" kabupatenkota ";
        $data['table']=$this->mkabupatenkota->select($arraydataget);
        $this->load->view('kabupatenkota/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mkabupatenkota->setr_mprovinsi($this->mprovinsi);

        $action='//'.base_url().'kabupatenkota/create';
        $data['title']="Add kabupatenkota ";
        $data['form']=$this->mkabupatenkota->createview($action);
        $this->load->view('kabupatenkota/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'kabupatenkotaname'=>$this->input->post('kabupatenkotaname'),
            'r_provinsiid'=>$this->input->post('r_provinsiid'),
            'kabupatenkotalat'=>$this->input->post('kabupatenkotalat'),
            'kabupatenkotalong'=>$this->input->post('kabupatenkotalong')
        );
        
        $data['form']=$this->mkabupatenkota->create($arraydatapost);
        redirect('//'.base_url().'/kabupatenkota/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit kabupatenkota ";
        $action='//'.base_url().'kabupatenkota/update/'.$slug;
        $data['form']=$this->mkabupatenkota->selectedit($slug,$action);
        $this->load->view('kabupatenkota/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'kabupatenkotaname'=>$this->input->post('kabupatenkotaname'),
            'r_provinsiid'=>$this->input->post('r_provinsiid'),
            'kabupatenkotalat'=>$this->input->post('kabupatenkotalat'),
            'kabupatenkotalong'=>$this->input->post('kabupatenkotalong')
        );
        $data['table']=$this->mkabupatenkota->update($arraydatapost,$slug);
        redirect('//'.base_url().'/kabupatenkota/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mkabupatenkota->delete($slug);
        redirect('//'.base_url().'/kabupatenkota/index', 'location');
    }

}