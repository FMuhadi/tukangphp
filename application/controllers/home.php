<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->helper('url');
        $this->load->model('mprovinsi');
    }
	public function index()
	{
		$data['listtables'] = $this->mprovinsi->manualqueryarray("show tables from siinsan");
		$this->load->view('home/index',$data);
	}
}
