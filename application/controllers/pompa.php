<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class pompa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mpompa');
        $this->load->model('mkecamatan');
$this->load->model('mkelurahan');

    }
    
    public function index(){
        $arraydataget = array(
            'pompaid'=>$this->input->get('pompaid'),
            'namalokasi'=>$this->input->get('namalokasi'),
            'r_kecamatanid'=>$this->input->get('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->get('r_kelurahanid'),
            'titikkoordinat'=>$this->input->get('titikkoordinat'),
            'jumlah'=>$this->input->get('jumlah'),
            'kapasitas'=>$this->input->get('kapasitas'),
            'kondisi'=>$this->input->get('kondisi'),
            'keberfungsian'=>$this->input->get('keberfungsian')
        );
        $data['title']=" pompa ";
        $data['table']=$this->mpompa->select($arraydataget);
        $this->load->view('pompa/index',$data);
    }

    public function add($slug=false){
        //set function
        $this->mpompa->setr_mkecamatan($this->mkecamatan);
        $this->mpompa->setr_mkelurahan($this->mkelurahan);

        $action='//'.base_url().'pompa/create';
        $data['title']="Add pompa ";
        $data['form']=$this->mpompa->createview($action);
        $this->load->view('pompa/add',$data);
    }


    public function create($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'jumlah'=>$this->input->post('jumlah'),
            'kapasitas'=>$this->input->post('kapasitas'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        
        $data['form']=$this->mpompa->create($arraydatapost);
        redirect('//'.base_url().'/pompa/index', 'location');
    }


    public function edit($slug=false){
        $data['title']="Edit pompa ";
        $action='//'.base_url().'pompa/update/'.$slug;
        $data['form']=$this->mpompa->selectedit($slug,$action);
        $this->load->view('pompa/edit',$data);
    }


    public function update($slug=false){
        $arraydatapost = array(
            'namalokasi'=>$this->input->post('namalokasi'),
            'r_kecamatanid'=>$this->input->post('r_kecamatanid'),
            'r_kelurahanid'=>$this->input->post('r_kelurahanid'),
            'titikkoordinat'=>$this->input->post('titikkoordinat'),
            'jumlah'=>$this->input->post('jumlah'),
            'kapasitas'=>$this->input->post('kapasitas'),
            'kondisi'=>$this->input->post('kondisi'),
            'keberfungsian'=>$this->input->post('keberfungsian')
        );
        $data['table']=$this->mpompa->update($arraydatapost,$slug);
        redirect('//'.base_url().'/pompa/index', 'location');
    }


    public function delete($slug=false){
        $data['table']=$this->mpompa->delete($slug);
        redirect('//'.base_url().'/pompa/index', 'location');
    }

}