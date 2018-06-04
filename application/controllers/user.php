<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('muser');
        $this->load->model('mprovinsi');

    }
    
    public function index(){
$arraydataget = array(
            'userid'=>$this->input->get('userid'),
            'username'=>$this->input->get('username'),
            'userpassword'=>$this->input->get('userpassword'),
            'r_provinsiid'=>$this->input->get('r_provinsiid'),
            'usercreated'=>$this->input->get('usercreated'),
            'userlastlogin'=>$this->input->get('userlastlogin'),
            'userexpired'=>$this->input->get('userexpired'),
            'usertype'=>$this->input->get('usertype')
        );
        $data['title']=" user ";
        $data['table']=$this->muser->select($arraydataget);
        $this->load->view('user/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->muser->setr_mprovinsi($this->mprovinsi);

        $action='//'.base_url().'user/create';
        $data['title']="Add user ";
        $data['form']=$this->muser->createview($action);
        $this->load->view('user/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'username'=>$this->input->post('username'),
            'userpassword'=>md5(md5("pa".$this->input->post('userpassword'))."ss"),
            'r_provinsiid'=>$this->input->post('r_provinsiid'),
            'usercreated'=>$this->input->post('usercreated'),
            'userlastlogin'=>$this->input->post('userlastlogin'),
            'userexpired'=>$this->input->post('userexpired'),
            'usertype'=>$this->input->post('usertype')
        );
        
        $data['form']=$this->muser->create($arraydatapost);
        redirect('//'.base_url().'/user/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit user ";
        $action='//'.base_url().'user/update/'.$slug;
        $data['form']=$this->muser->selectedit($slug,$action);
        $this->load->view('user/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'username'=>$this->input->post('username'),
            'userpassword'=>md5(md5("pa".$this->input->post('userpassword'))."ss"),
            'r_provinsiid'=>$this->input->post('r_provinsiid'),
            'usercreated'=>$this->input->post('usercreated'),
            'userlastlogin'=>$this->input->post('userlastlogin'),
            'userexpired'=>$this->input->post('userexpired'),
            'usertype'=>$this->input->post('usertype')
        );
        $data['table']=$this->muser->update($arraydatapost,$slug);
        redirect('//'.base_url().'/user/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->muser->delete($slug);
        redirect('//'.base_url().'/user/index', 'location');
    }

}