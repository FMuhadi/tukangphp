<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class programkegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mprogramkegiatan');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
        $arraydataget = array(
            'programkegiatanid'=>$this->input->get('programkegiatanid'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'jenispembiayaan'=>$this->input->get('jenispembiayaan'),
            'programkegiatan'=>$this->input->get('programkegiatan'),
            'vol'=>$this->input->get('vol'),
            'biaya'=>$this->input->get('biaya'),
            'lokasi'=>$this->input->get('lokasi'),
            'tahun'=>$this->input->get('tahun')
        );
        $data['title']=" programkegiatan ";
        $data['table']=$this->mprogramkegiatan->select($arraydataget);
        $this->load->view('programkegiatan/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mprogramkegiatan->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'programkegiatan/create';
        $data['title']="Add programkegiatan ";
        $data['form']=$this->mprogramkegiatan->createview($action);
        $this->load->view('programkegiatan/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'jenispembiayaan'=>$this->input->post('jenispembiayaan'),
            'programkegiatan'=>$this->input->post('programkegiatan'),
            'vol'=>$this->input->post('vol'),
            'biaya'=>$this->input->post('biaya'),
            'lokasi'=>$this->input->post('lokasi'),
            'tahun'=>$this->input->post('tahun')
        );
        
        $data['form']=$this->mprogramkegiatan->create($arraydatapost);
        redirect('//'.base_url().'/programkegiatan/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit programkegiatan ";
        $action='//'.base_url().'programkegiatan/update/'.$slug;
        $data['form']=$this->mprogramkegiatan->selectedit($slug,$action);
        $this->load->view('programkegiatan/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'jenispembiayaan'=>$this->input->post('jenispembiayaan'),
            'programkegiatan'=>$this->input->post('programkegiatan'),
            'vol'=>$this->input->post('vol'),
            'biaya'=>$this->input->post('biaya'),
            'lokasi'=>$this->input->post('lokasi'),
            'tahun'=>$this->input->post('tahun')
        );
        $data['table']=$this->mprogramkegiatan->update($arraydatapost,$slug);
        redirect('//'.base_url().'/programkegiatan/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mprogramkegiatan->delete($slug);
        redirect('//'.base_url().'/programkegiatan/index', 'location');
    }

}