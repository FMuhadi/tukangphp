<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class banjirrencana extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mbanjirrencana');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'banjirrencanaid'=>$this->input->get('banjirrencanaid'),
            'namasungai'=>$this->input->get('namasungai'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->get('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->get('titikkoordinatakhir')
        );
        $data['title']=" banjirrencana ";
        $data['table']=$this->mbanjirrencana->select($arraydataget);
        $this->load->view('banjirrencana/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mbanjirrencana->setr_mkecamatan($this->mkecamatan);
        $this->mbanjirrencana->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'banjirrencana/create';
        $data['title']="Add banjirrencana ";
        $data['form']=$this->mbanjirrencana->createview($action);
        $this->load->view('banjirrencana/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namasungai'=>$this->input->post('namasungai'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->post('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->post('titikkoordinatakhir')
        );
        
        $data['form']=$this->mbanjirrencana->create($arraydatapost);
        redirect('//'.base_url().'/banjirrencana/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit banjirrencana ";
        $action='//'.base_url().'banjirrencana/update/'.$slug;
        $data['form']=$this->mbanjirrencana->selectedit($slug,$action);
        $this->load->view('banjirrencana/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namasungai'=>$this->input->post('namasungai'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->post('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->post('titikkoordinatakhir')
        );
        $data['table']=$this->mbanjirrencana->update($arraydatapost,$slug);
        redirect('//'.base_url().'/banjirrencana/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mbanjirrencana->delete($slug);
        redirect('//'.base_url().'/banjirrencana/index', 'location');
    }

}