<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-16 05:15:43
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msqltochart');
        $this->load->model('msqltotable');

    }
	
	public function index(){
        $data['title']=" user ";
        $data['table']=$this->msqltotable->select($arraydataget);
        $this->load->view('profile/index',$data);
    }

	public function view($slug=false){
        $data['title']=" user ";
        $data['table']=$this->msqltotable->select($arraydataget);
        $this->load->view('profile/index',$data);
    }
	
	public function input(){
        $data['title']=" user ";
        $this->load->view('profile/input',$data);
    }
	
	public function saveinput(){
        $data['title']=" user ";
        $data['table']=$this->msqltotable->select($arraydataget);
        $this->load->view('profile/index',$data);
    }
	
}