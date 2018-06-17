<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class datateknis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mdatateknis');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'datateknisid'=>$this->input->get('datateknisid'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'masterplan'=>$this->input->get('masterplan'),
            'masterplantahun'=>$this->input->get('masterplantahun'),
            'outlineplan'=>$this->input->get('outlineplan'),
            'outlineplantahun'=>$this->input->get('outlineplantahun'),
            'ded'=>$this->input->get('ded'),
            'dedtahun'=>$this->input->get('dedtahun')
        );
        $data['title']=" datateknis ";
        $data['table']=$this->mdatateknis->select($arraydataget);
        $this->load->view('datateknis/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mdatateknis->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'datateknis/create';
        $data['title']="Add datateknis ";
        $data['form']=$this->mdatateknis->createview($action);
        $this->load->view('datateknis/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'masterplan'=>$this->input->post('masterplan'),
            'masterplantahun'=>$this->input->post('masterplantahun'),
            'outlineplan'=>$this->input->post('outlineplan'),
            'outlineplantahun'=>$this->input->post('outlineplantahun'),
            'ded'=>$this->input->post('ded'),
            'dedtahun'=>$this->input->post('dedtahun')
        );
        
        $data['form']=$this->mdatateknis->create($arraydatapost);
        redirect('//'.base_url().'/datateknis/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit datateknis ";
        $action='//'.base_url().'datateknis/update/'.$slug;
        $data['form']=$this->mdatateknis->selectedit($slug,$action);
        $this->load->view('datateknis/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'masterplan'=>$this->input->post('masterplan'),
            'masterplantahun'=>$this->input->post('masterplantahun'),
            'outlineplan'=>$this->input->post('outlineplan'),
            'outlineplantahun'=>$this->input->post('outlineplantahun'),
            'ded'=>$this->input->post('ded'),
            'dedtahun'=>$this->input->post('dedtahun')
        );
        $data['table']=$this->mdatateknis->update($arraydatapost,$slug);
        redirect('//'.base_url().'/datateknis/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mdatateknis->delete($slug);
        redirect('//'.base_url().'/datateknis/index', 'location');
    }

}