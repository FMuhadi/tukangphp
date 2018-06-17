<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class saluran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msaluran');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'saluranprimerid'=>$this->input->get('saluranprimerid'),
            'namakawasan'=>$this->input->get('namakawasan'),
            'salurantype'=>$this->input->get('salurantype'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->get('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->get('titikkoordinatakhir'),
            'panjangsaluran'=>$this->input->get('panjangsaluran'),
            'lebarsaluranatas'=>$this->input->get('lebarsaluranatas'),
            'lebarsaluranbawah'=>$this->input->get('lebarsaluranbawah'),
            'elevasisaluran'=>$this->input->get('elevasisaluran'),
            'kapasitassaluran'=>$this->input->get('kapasitassaluran'),
            'konstruksisaluran'=>$this->input->get('konstruksisaluran')
        );
        $data['title']=" saluran ";
        $data['table']=$this->msaluran->select($arraydataget);
        $this->load->view('saluran/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->msaluran->setr_mkecamatan($this->mkecamatan);
        $this->msaluran->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'saluran/create';
        $data['title']="Add saluran ";
        $data['form']=$this->msaluran->createview($action);
        $this->load->view('saluran/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namakawasan'=>$this->input->post('namakawasan'),
            'salurantype'=>$this->input->post('salurantype'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->post('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->post('titikkoordinatakhir'),
            'panjangsaluran'=>$this->input->post('panjangsaluran'),
            'lebarsaluranatas'=>$this->input->post('lebarsaluranatas'),
            'lebarsaluranbawah'=>$this->input->post('lebarsaluranbawah'),
            'elevasisaluran'=>$this->input->post('elevasisaluran'),
            'kapasitassaluran'=>$this->input->post('kapasitassaluran'),
            'konstruksisaluran'=>$this->input->post('konstruksisaluran')
        );
        
        $data['form']=$this->msaluran->create($arraydatapost);
        redirect('//'.base_url().'/saluran/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit saluran ";
        $action='//'.base_url().'saluran/update/'.$slug;
        $data['form']=$this->msaluran->selectedit($slug,$action);
        $this->load->view('saluran/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namakawasan'=>$this->input->post('namakawasan'),
            'salurantype'=>$this->input->post('salurantype'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinatawal'=>$this->input->post('titikkoordinatawal'),
            'titikkoordinatakhir'=>$this->input->post('titikkoordinatakhir'),
            'panjangsaluran'=>$this->input->post('panjangsaluran'),
            'lebarsaluranatas'=>$this->input->post('lebarsaluranatas'),
            'lebarsaluranbawah'=>$this->input->post('lebarsaluranbawah'),
            'elevasisaluran'=>$this->input->post('elevasisaluran'),
            'kapasitassaluran'=>$this->input->post('kapasitassaluran'),
            'konstruksisaluran'=>$this->input->post('konstruksisaluran')
        );
        $data['table']=$this->msaluran->update($arraydatapost,$slug);
        redirect('//'.base_url().'/saluran/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->msaluran->delete($slug);
        redirect('//'.base_url().'/saluran/index', 'location');
    }

}