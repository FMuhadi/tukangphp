<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class instansi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('minstansi');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'instansiid'=>$this->input->get('instansiid'),
            'namainstansi'=>$this->input->get('namainstansi'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'pegawaitetap'=>$this->input->get('pegawaitetap'),
            'pegawaikontrak'=>$this->input->get('pegawaikontrak'),
            'strukturorganisasi'=>$this->input->get('strukturorganisasi'),
            'luluss2s3'=>$this->input->get('luluss2s3'),
            'luluss1'=>$this->input->get('luluss1'),
            'lulusd3'=>$this->input->get('lulusd3'),
            'lulussma'=>$this->input->get('lulussma'),
            'lulussmp'=>$this->input->get('lulussmp'),
            'total'=>$this->input->get('total')
        );
        $data['title']=" instansi ";
        $data['table']=$this->minstansi->select($arraydataget);
        $this->load->view('instansi/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->minstansi->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'instansi/create';
        $data['title']="Add instansi ";
        $data['form']=$this->minstansi->createview($action);
        $this->load->view('instansi/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namainstansi'=>$this->input->post('namainstansi'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'pegawaitetap'=>$this->input->post('pegawaitetap'),
            'pegawaikontrak'=>$this->input->post('pegawaikontrak'),
            'strukturorganisasi'=>$this->input->post('strukturorganisasi'),
            'luluss2s3'=>$this->input->post('luluss2s3'),
            'luluss1'=>$this->input->post('luluss1'),
            'lulusd3'=>$this->input->post('lulusd3'),
            'lulussma'=>$this->input->post('lulussma'),
            'lulussmp'=>$this->input->post('lulussmp'),
            'total'=>$this->input->post('total')
        );
        
        $data['form']=$this->minstansi->create($arraydatapost);
        redirect('//'.base_url().'/instansi/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit instansi ";
        $action='//'.base_url().'instansi/update/'.$slug;
        $data['form']=$this->minstansi->selectedit($slug,$action);
        $this->load->view('instansi/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namainstansi'=>$this->input->post('namainstansi'),
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'pegawaitetap'=>$this->input->post('pegawaitetap'),
            'pegawaikontrak'=>$this->input->post('pegawaikontrak'),
            'strukturorganisasi'=>$this->input->post('strukturorganisasi'),
            'luluss2s3'=>$this->input->post('luluss2s3'),
            'luluss1'=>$this->input->post('luluss1'),
            'lulusd3'=>$this->input->post('lulusd3'),
            'lulussma'=>$this->input->post('lulussma'),
            'lulussmp'=>$this->input->post('lulussmp'),
            'total'=>$this->input->post('total')
        );
        $data['table']=$this->minstansi->update($arraydatapost,$slug);
        redirect('//'.base_url().'/instansi/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->minstansi->delete($slug);
        redirect('//'.base_url().'/instansi/index', 'location');
    }

}