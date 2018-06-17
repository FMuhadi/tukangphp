<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class sqltojson extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msqltojson');
        
    }
    
    public function index(){
        $arraydataget = array(
            'sqltojsonid'=>$this->input->get('sqltojsonid'),
            'sqltojsonname'=>$this->input->get('sqltojsonname'),
            'sqltojsonquery'=>$this->input->get('sqltojsonquery'),
            'sqltojsonremarks'=>$this->input->get('sqltojsonremarks')
        );
        $data['title']=" sqltojson ";
        $data['table']=$this->msqltojson->select($arraydataget);
        $this->load->view('sqltojson/index',$data);
    }

    public function add($slug=false){
        //set function

        $action='//'.base_url().'sqltojson/create';
        $data['title']="Add sqltojson ";
        $data['form']=$this->msqltojson->createview($action);
        $this->load->view('sqltojson/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'sqltojsonname'=>$this->input->post('sqltojsonname'),
            'sqltojsonquery'=>$this->input->post('sqltojsonquery'),
            'sqltojsonremarks'=>$this->input->post('sqltojsonremarks')
        );
        
        $data['form']=$this->msqltojson->create($arraydatapost);
        redirect('//'.base_url().'/sqltojson/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit sqltojson ";
        $action='//'.base_url().'sqltojson/update/'.$slug;
        $data['form']=$this->msqltojson->selectedit($slug,$action);
        $this->load->view('sqltojson/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'sqltojsonname'=>$this->input->post('sqltojsonname'),
            'sqltojsonquery'=>$this->input->post('sqltojsonquery'),
            'sqltojsonremarks'=>$this->input->post('sqltojsonremarks')
        );
        $data['table']=$this->msqltojson->update($arraydatapost,$slug);
        redirect('//'.base_url().'/sqltojson/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->msqltojson->delete($slug);
        redirect('//'.base_url().'/sqltojson/index', 'location');
    }

}