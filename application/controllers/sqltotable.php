<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class sqltotable extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msqltotable');
        
    }
    
    public function index(){
        $arraydataget = array(
            'sqltotableid'=>$this->input->get('sqltotableid'),
            'sqltotablename'=>$this->input->get('sqltotablename'),
            'sqltotablequery'=>$this->input->get('sqltotablequery'),
            'sqltotabletype'=>$this->input->get('sqltotabletype'),
            'sqltotableremark'=>$this->input->get('sqltotableremark')
        );
        $data['title']=" sqltotable ";
        $data['table']=$this->msqltotable->select($arraydataget);
        $this->load->view('sqltotable/index',$data);
    }

    public function add($slug=false){
        //set function

        $action='//'.base_url().'sqltotable/create';
        $data['title']="Add sqltotable ";
        $data['form']=$this->msqltotable->createview($action);
        $this->load->view('sqltotable/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'sqltotablename'=>$this->input->post('sqltotablename'),
            'sqltotablequery'=>$this->input->post('sqltotablequery'),
            'sqltotabletype'=>$this->input->post('sqltotabletype'),
            'sqltotableremark'=>$this->input->post('sqltotableremark')
        );
        
        $data['form']=$this->msqltotable->create($arraydatapost);
        redirect('//'.base_url().'/sqltotable/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit sqltotable ";
        $action='//'.base_url().'sqltotable/update/'.$slug;
        $data['form']=$this->msqltotable->selectedit($slug,$action);
        $this->load->view('sqltotable/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'sqltotablename'=>$this->input->post('sqltotablename'),
            'sqltotablequery'=>$this->input->post('sqltotablequery'),
            'sqltotabletype'=>$this->input->post('sqltotabletype'),
            'sqltotableremark'=>$this->input->post('sqltotableremark')
        );
        $data['table']=$this->msqltotable->update($arraydatapost,$slug);
        redirect('//'.base_url().'/sqltotable/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->msqltotable->delete($slug);
        redirect('//'.base_url().'/sqltotable/index', 'location');
    }

}