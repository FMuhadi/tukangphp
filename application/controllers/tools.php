<?php
/*PHP_CLASS_GENERATOR
*CONTROLLER
*GENERATE ON 2018-06-16 05:15:43
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class tools extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('msqltochart');
        $this->load->model('msqltotable');
        $this->load->model('msqltojson');
    }

    public function index(){
        $data['title']=" user ";
        $data['table']=$this->msqltotable->select($arraydataget);
        $this->load->view('tools/index',$data);
    }

    public function  chart(){
        $data['func']="sqltochart";
        $arraydataget = array(
            'sqltochartid'=>$this->input->get('sqltochartid'),
            'sqltochartname'=>$this->input->get('sqltochartname'),
            'sqltochartquery'=>$this->input->get('sqltochartquery'),
            'sqltochartxlabel'=>$this->input->get('sqltochartxlabel'),
            'sqltochartylabel'=>$this->input->get('sqltochartylabel'),
            'sqltocharttype'=>$this->input->get('sqltocharttype'),
            'sqltochartremarks'=>$this->input->get('sqltochartremarks')
        );
        $data['title']=" sqltochart ";
        $data['table']=$this->msqltochart->select($arraydataget,"tools/viewchart");
        $this->load->view('tools/index',$data);
    }

    public function table(){
        $data['func']="sqltotable";
        $arraydataget = array(
            'sqltotableid'=>$this->input->get('sqltotableid'),
            'sqltotablename'=>$this->input->get('sqltotablename'),
            'sqltotablequery'=>$this->input->get('sqltotablequery'),
            'sqltotabletype'=>$this->input->get('sqltotabletype'),
            'sqltotableremark'=>$this->input->get('sqltotableremark')
        );
        $data['title']=" sqltotable ";
        $data['table']=$this->msqltotable->select($arraydataget,"tools/viewtable");
        $this->load->view('tools/index',$data);
    }
	
	public function json(){
		$data['func']="sqltojson";
		$arraydataget = array(
            'sqltojsonid'=>$this->input->get('sqltojsonid'),
            'sqltojsonname'=>$this->input->get('sqltojsonname'),
            'sqltojsonquery'=>$this->input->get('sqltojsonquery'),
            'sqltojsonremarks'=>$this->input->get('sqltojsonremarks')
        );
        $data['title']=" sqltojson ";
        $data['table']=$this->msqltojson->select($arraydataget,"tools/viewjson");
        $this->load->view('tools/index',$data);
    }

    public function viewjson($slug=false){
        $query=$this->msqltojson->single($slug);
        $sqldata = $this->msqltojson->manualqueryarray($query->sqltojsonquery);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode($sqldata));
    }

     public function viewchart($slug=false){
        $sqldata=$this->msqltochart->single($slug);
        $data['title']=" ".($sqldata->sqltochartname);
        $data['labelx']=" ".($sqldata->sqltochartxlabel);
        $data['labely']=" ".($sqldata->sqltochartylabel);
        $data['type']=" ".($sqldata->sqltocharttype);
        $data['chart']=$this->msqltochart->sqltochart($sqldata->sqltochartquery);
        $this->load->view('tools/chart',$data);
    }

    public function viewtable($slug=false){
        $sqldata=$this->msqltotable->single($slug);
        $data['title']=$sqldata->sqltotablename;
        $sqlquery="";
        if($sqldata->sqltotabletype=='Number'){
            $sqlquery="select @rownum := @rownum + 1 AS No,c.* from (".$sqldata->sqltotablequery.") as c, (SELECT @rownum := 0) r";
        }else{
        $sqlquery = $sqldata->sqltotablequery;
        }
        $data['table']=$this->msqltotable->sqltotable($sqlquery);
        $this->load->view('tools/table',$data);
    }
}