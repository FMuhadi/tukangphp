<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class malokasibiaya extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('alokasibiaya');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>alokasibiayaid</th><th>alokasibiayatahun</th><th>r_kabupatenkotaid</th><th>apbn</th><th>apbdprovinsi</th><th>apbddaerah</th><th>dak</th><th>hibah</th><th>csr</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->alokasibiayaid."</td>"."<td>".$row->alokasibiayatahun."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->apbn."</td>"."<td>".$row->apbdprovinsi."</td>"."<td>".$row->apbddaerah."</td>"."<td>".$row->dak."</td>"."<td>".$row->hibah."</td>"."<td>".$row->csr."</td>"."<td><a class='btn' href=\"//".base_url()."alokasibiaya\\edit\\".$row->alokasibiayaid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."alokasibiaya\\delete\\".$row->alokasibiayaid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->alokasibiayaid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('alokasibiayaid', $id);
        $this->db->delete('alokasibiaya');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('alokasibiaya');
        $this->db->where('alokasibiayaid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('alokasibiaya');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='alokasibiayatahun' class='col-sm-2 control-label'>alokasibiayatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='alokasibiayatahun' name='alokasibiayatahun'>
  </div>
</div>
                
 ".$r_kabupatenkotaid." 

<div class='form-group'>
  <label for='apbn' class='col-sm-2 control-label'>apbn</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbn' name='apbn'>
  </div>
</div>
                

<div class='form-group'>
  <label for='apbdprovinsi' class='col-sm-2 control-label'>apbdprovinsi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbdprovinsi' name='apbdprovinsi'>
  </div>
</div>
                

<div class='form-group'>
  <label for='apbddaerah' class='col-sm-2 control-label'>apbddaerah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbddaerah' name='apbddaerah'>
  </div>
</div>
                

<div class='form-group'>
  <label for='dak' class='col-sm-2 control-label'>dak</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='dak' name='dak'>
  </div>
</div>
                

<div class='form-group'>
  <label for='hibah' class='col-sm-2 control-label'>hibah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='hibah' name='hibah'>
  </div>
</div>
                

<div class='form-group'>
  <label for='csr' class='col-sm-2 control-label'>csr</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='csr' name='csr'>
  </div>
</div>
                
            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>Save</button>
                </div>
              </div>
        </form>
        ";

        return $form;
    }

    public function selectedit($id,$action){
        $this->db->select('*');
        $this->db->from('alokasibiaya');
        $this->db->where('alokasibiayaid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='alokasibiayatahun' class='col-sm-2 control-label'>alokasibiayatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='alokasibiayatahun' name='alokasibiayatahun' value='$row->alokasibiayatahun'>
  </div>
</div>
 ".$r_kabupatenkotaid." 
<div class='form-group'>
  <label for='apbn' class='col-sm-2 control-label'>apbn</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbn' name='apbn' value='$row->apbn'>
  </div>
</div>

<div class='form-group'>
  <label for='apbdprovinsi' class='col-sm-2 control-label'>apbdprovinsi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbdprovinsi' name='apbdprovinsi' value='$row->apbdprovinsi'>
  </div>
</div>

<div class='form-group'>
  <label for='apbddaerah' class='col-sm-2 control-label'>apbddaerah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='apbddaerah' name='apbddaerah' value='$row->apbddaerah'>
  </div>
</div>

<div class='form-group'>
  <label for='dak' class='col-sm-2 control-label'>dak</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='dak' name='dak' value='$row->dak'>
  </div>
</div>

<div class='form-group'>
  <label for='hibah' class='col-sm-2 control-label'>hibah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='hibah' name='hibah' value='$row->hibah'>
  </div>
</div>

<div class='form-group'>
  <label for='csr' class='col-sm-2 control-label'>csr</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='csr' name='csr' value='$row->csr'>
  </div>
</div>
 ";
        }
        $form .= "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>update</button>
                </div>
              </div></form>";
        return $form;
    }

    public function update($data,$id){
        $this->db->where('alokasibiayaid', $id);
        $this->db->update('alokasibiaya', $data);
    }

    public function count(){
        return $this->db->count_all_results('alokasibiaya'); 
    }

    public function selectoption($filter=""){
        $this->db->select('alokasibiayaid,alokasibiayaname');
        $this->db->from('alokasibiaya');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_alokasibiayaid' class='col-sm-2 control-label'>alokasibiaya</label>
    <div class='col-sm-10'>
      <select id='r_alokasibiayaid' class='form-control' name='r_alokasibiayaid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->alokasibiayaid."'>".$row->alokasibiayaname."</option>";
        }
        $form .="</select>
    </div>
  </div>";
        return $form;
    }

    public function manualquery($query){
        $query = $this->db->query($query);
        return $query->result();
    }

    public function manualqueryarray($query){
        $query = $this->db->query($query);
        return $query->result_array();
    }

    public function manualquerysingle($query){
        $query = $this->db->query($query);
        return $query->row();
    }

    public function sqltotable($query){
        $query = $this->db->query($query);
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $no=0;
        foreach ($query->result_array() as $row)
        {
            if($no==0){
                $table .= "<tr>";
                    foreach($row as $key => $val){
                        $table .= "<th>$key</th>";
                    }
                $table .= "</tr>";
            }
            $no++;
            $table .= "<tr>";
            foreach($row as $key => $val){
                $table .= "<td>$val</td>";
            }
            $table .= "</tr>";
            
        }
        $table .= "</table>";
        return $table;
    }

    public function sqltochart($query){
        $query = $this->db->query($query);
        $no=0;
        $datagather =  Array();
        $arr =  Array();
        foreach ($query->result_array() as $row){
            if($no==0){
                foreach($row as $key => $val){
                    $datagather[$key] =  Array();
                    $datagather[$key]['name'] = $key;
                    $datagather[$key]['data'] =  Array();
                }
            }
            $no++;
            foreach($row as $key => $val){
                array_push($datagather[$key]['data'],$val+0);
            }
            
        }
        
        foreach ($datagather as $row){
            array_push($arr,$row);
        }
        return json_encode($arr);
    }
    

}