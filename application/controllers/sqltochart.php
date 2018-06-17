<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class sqltochart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msqltochart');
        
    }
    
    public function index(){
        $arraydataget = array(
            'sqltochartid'=>$this->input->get('sqltochartid'),
            'sqltochartname'=>$this->input->get('sqltochartname'),
            'sqltochartquery'=>$this->input->get('sqltochartquery'),
            'sqltochartxlabel'=>$this->input->get('sqltochartxlabel'),
            'sqltochartylabel'=>$this->input->get('sqltochartylabel'),
            'sqltocharttype'=>$this->input->get('sqltocharttype'),
            'sqltochartremarks'=>$this->input->get('sqltochartremarks')
        );
        $data['title']=" sqltochart ";
        $data['table']=$this->msqltochart->select($arraydataget);
        $this->load->view('sqltochart/index',$data);
    }

    public function add($slug=false){
        //set function

        $action='//'.base_url().'sqltochart/create';
        $data['title']="Add sqltochart ";
        $data['form']=$this->msqltochart->createview($action);
        $this->load->view('sqltochart/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'sqltochartname'=>$this->input->post('sqltochartname'),
            'sqltochartquery'=>$this->input->post('sqltochartquery'),
            'sqltochartxlabel'=>$this->input->post('sqltochartxlabel'),
            'sqltochartylabel'=>$this->input->post('sqltochartylabel'),
            'sqltocharttype'=>$this->input->post('sqltocharttype'),
            'sqltochartremarks'=>$this->input->post('sqltochartremarks')
        );
        
        $data['form']=$this->msqltochart->create($arraydatapost);
        redirect('//'.base_url().'/sqltochart/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit sqltochart ";
        $action='//'.base_url().'sqltochart/update/'.$slug;
        $data['form']=$this->msqltochart->selectedit($slug,$action);
        $this->load->view('sqltochart/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'sqltochartname'=>$this->input->post('sqltochartname'),
            'sqltochartquery'=>$this->input->post('sqltochartquery'),
            'sqltochartxlabel'=>$this->input->post('sqltochartxlabel'),
            'sqltochartylabel'=>$this->input->post('sqltochartylabel'),
            'sqltocharttype'=>$this->input->post('sqltocharttype'),
            'sqltochartremarks'=>$this->input->post('sqltochartremarks')
        );
        $data['table']=$this->msqltochart->update($arraydatapost,$slug);
        redirect('//'.base_url().'/sqltochart/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->msqltochart->delete($slug);
        redirect('//'.base_url().'/sqltochart/index', 'location');
    }

}