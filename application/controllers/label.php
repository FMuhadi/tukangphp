<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class label extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mlabel');
        
    }
    
    public function index(){
        $arraydataget = array(
            'labelid'=>$this->input->get('labelid'),
            'labelname'=>$this->input->get('labelname'),
            'labelvalue'=>$this->input->get('labelvalue')
        );
        $data['title']=" label ";
        $data['table']=$this->mlabel->select($arraydataget);
        $this->load->view('label/index',$data);
    }

    public function add($slug=false){
        //set function

        $action='//'.base_url().'label/create';
        $data['title']="Add label ";
        $data['form']=$this->mlabel->createview($action);
        $this->load->view('label/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'labelname'=>$this->input->post('labelname'),
            'labelvalue'=>$this->input->post('labelvalue')
        );
        
        $data['form']=$this->mlabel->create($arraydatapost);
        redirect('//'.base_url().'/label/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit label ";
        $action='//'.base_url().'label/update/'.$slug;
        $data['form']=$this->mlabel->selectedit($slug,$action);
        $this->load->view('label/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'labelname'=>$this->input->post('labelname'),
            'labelvalue'=>$this->input->post('labelvalue')
        );
        $data['table']=$this->mlabel->update($arraydatapost,$slug);
        redirect('//'.base_url().'/label/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mlabel->delete($slug);
        redirect('//'.base_url().'/label/index', 'location');
    }

}