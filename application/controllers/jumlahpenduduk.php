<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class jumlahpenduduk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mjumlahpenduduk');
        $this->load->model('mkabupatenkota');

    }
    
    public function index(){
$arraydataget = array(
            'jumlahpendudukid'=>$this->input->get('jumlahpendudukid'),
            'jumlahpenduduktahun'=>$this->input->get('jumlahpenduduktahun'),
            'r_kabupatenkotaid'=>$this->input->get('r_kabupatenkotaid'),
            'jumlahpendudukkota'=>$this->input->get('jumlahpendudukkota'),
            'jumlahpendudukdesa'=>$this->input->get('jumlahpendudukdesa')
        );
        $data['title']=" jumlahpenduduk ";
        $data['table']=$this->mjumlahpenduduk->select($arraydataget);
        $this->load->view('jumlahpenduduk/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mjumlahpenduduk->setr_mkabupatenkota($this->mkabupatenkota);

        $action='//'.base_url().'jumlahpenduduk/create';
        $data['title']="Add jumlahpenduduk ";
        $data['form']=$this->mjumlahpenduduk->createview($action);
        $this->load->view('jumlahpenduduk/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'jumlahpendudukkota'=>$this->input->post('jumlahpendudukkota'),
            'jumlahpendudukdesa'=>$this->input->post('jumlahpendudukdesa')
        );
        
        $data['form']=$this->mjumlahpenduduk->create($arraydatapost);
        redirect('//'.base_url().'/jumlahpenduduk/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit jumlahpenduduk ";
        $action='//'.base_url().'jumlahpenduduk/update/'.$slug;
        $data['form']=$this->mjumlahpenduduk->selectedit($slug,$action);
        $this->load->view('jumlahpenduduk/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'r_kabupatenkotaid'=>$this->input->post('r_kabupatenkotaid'),
            'jumlahpendudukkota'=>$this->input->post('jumlahpendudukkota'),
            'jumlahpendudukdesa'=>$this->input->post('jumlahpendudukdesa')
        );
        $data['table']=$this->mjumlahpenduduk->update($arraydatapost,$slug);
        redirect('//'.base_url().'/jumlahpenduduk/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mjumlahpenduduk->delete($slug);
        redirect('//'.base_url().'/jumlahpenduduk/index', 'location');
    }

}