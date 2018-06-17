<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mpetadrainase extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('petadrainase');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>petadrainaseid</th><th>r_kabupatenkotaid</th><th>petadrainasejalan</th><th>petagenangan</th><th>petapeilbanjir</th><th>petajaringanbangunan</th><th>petaarahaliran</th><th>petazonasi</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->petadrainaseid."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->petadrainasejalan."</td>"."<td>".$row->petagenangan."</td>"."<td>".$row->petapeilbanjir."</td>"."<td>".$row->petajaringanbangunan."</td>"."<td>".$row->petaarahaliran."</td>"."<td>".$row->petazonasi."</td>"."<td><a class='btn' href=\"//".base_url()."petadrainase\\edit\\".$row->petadrainaseid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."petadrainase\\delete\\".$row->petadrainaseid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->petadrainaseid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('petadrainaseid', $id);
        $this->db->delete('petadrainase');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('petadrainase');
        $this->db->where('petadrainaseid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('petadrainase');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
             ".$r_kabupatenkotaid." 
<div class='form-group'><label for='petadrainasejalan' class='col-sm-2 control-label'>petadrainasejalan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petadrainasejalan' id='petadrainasejalan' value='Ada'>
  <label class='form-check-label' for='petadrainasejalan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petadrainasejalan' id='petadrainasejalan' value='Tidak'>
  <label class='form-check-label' for='petadrainasejalan'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'><label for='petagenangan' class='col-sm-2 control-label'>petagenangan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petagenangan' id='petagenangan' value='Ada'>
  <label class='form-check-label' for='petagenangan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petagenangan' id='petagenangan' value='Tidak'>
  <label class='form-check-label' for='petagenangan'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'><label for='petapeilbanjir' class='col-sm-2 control-label'>petapeilbanjir</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petapeilbanjir' id='petapeilbanjir' value='Ada'>
  <label class='form-check-label' for='petapeilbanjir'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petapeilbanjir' id='petapeilbanjir' value='Tidak'>
  <label class='form-check-label' for='petapeilbanjir'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'><label for='petajaringanbangunan' class='col-sm-2 control-label'>petajaringanbangunan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petajaringanbangunan' id='petajaringanbangunan' value='Ada'>
  <label class='form-check-label' for='petajaringanbangunan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petajaringanbangunan' id='petajaringanbangunan' value='Tidak'>
  <label class='form-check-label' for='petajaringanbangunan'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'><label for='petaarahaliran' class='col-sm-2 control-label'>petaarahaliran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petaarahaliran' id='petaarahaliran' value='Ada'>
  <label class='form-check-label' for='petaarahaliran'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petaarahaliran' id='petaarahaliran' value='Tidak'>
  <label class='form-check-label' for='petaarahaliran'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'><label for='petazonasi' class='col-sm-2 control-label'>petazonasi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petazonasi' id='petazonasi' value='Ada'>
  <label class='form-check-label' for='petazonasi'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petazonasi' id='petazonasi' value='Tidak'>
  <label class='form-check-label' for='petazonasi'>
    Tidak
  </label>
</div>
</div></div>
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
        $this->db->from('petadrainase');
        $this->db->where('petadrainaseid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.="  ".$r_kabupatenkotaid." <div class='form-group'><label for='petadrainasejalan' class='col-sm-2 control-label'>petadrainasejalan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petadrainasejalan' id='petadrainasejalan' value='Ada' ".($row->petadrainasejalan=='Ada'?'checked':'').">
  <label class='form-check-label' for='petadrainasejalan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petadrainasejalan' id='petadrainasejalan' value='Tidak' ".($row->petadrainasejalan=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petadrainasejalan'>
    Tidak
  </label>
</div>
</div></div><div class='form-group'><label for='petagenangan' class='col-sm-2 control-label'>petagenangan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petagenangan' id='petagenangan' value='Ada' ".($row->petagenangan=='Ada'?'checked':'').">
  <label class='form-check-label' for='petagenangan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petagenangan' id='petagenangan' value='Tidak' ".($row->petagenangan=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petagenangan'>
    Tidak
  </label>
</div>
</div></div><div class='form-group'><label for='petapeilbanjir' class='col-sm-2 control-label'>petapeilbanjir</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petapeilbanjir' id='petapeilbanjir' value='Ada' ".($row->petapeilbanjir=='Ada'?'checked':'').">
  <label class='form-check-label' for='petapeilbanjir'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petapeilbanjir' id='petapeilbanjir' value='Tidak' ".($row->petapeilbanjir=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petapeilbanjir'>
    Tidak
  </label>
</div>
</div></div><div class='form-group'><label for='petajaringanbangunan' class='col-sm-2 control-label'>petajaringanbangunan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petajaringanbangunan' id='petajaringanbangunan' value='Ada' ".($row->petajaringanbangunan=='Ada'?'checked':'').">
  <label class='form-check-label' for='petajaringanbangunan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petajaringanbangunan' id='petajaringanbangunan' value='Tidak' ".($row->petajaringanbangunan=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petajaringanbangunan'>
    Tidak
  </label>
</div>
</div></div><div class='form-group'><label for='petaarahaliran' class='col-sm-2 control-label'>petaarahaliran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petaarahaliran' id='petaarahaliran' value='Ada' ".($row->petaarahaliran=='Ada'?'checked':'').">
  <label class='form-check-label' for='petaarahaliran'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petaarahaliran' id='petaarahaliran' value='Tidak' ".($row->petaarahaliran=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petaarahaliran'>
    Tidak
  </label>
</div>
</div></div><div class='form-group'><label for='petazonasi' class='col-sm-2 control-label'>petazonasi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petazonasi' id='petazonasi' value='Ada' ".($row->petazonasi=='Ada'?'checked':'').">
  <label class='form-check-label' for='petazonasi'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='petazonasi' id='petazonasi' value='Tidak' ".($row->petazonasi=='Tidak'?'checked':'').">
  <label class='form-check-label' for='petazonasi'>
    Tidak
  </label>
</div>
</div></div> ";
        }
        $form .= "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>update</button>
                </div>
              </div></form>";
        return $form;
    }

    public function update($data,$id){
        $this->db->where('petadrainaseid', $id);
        $this->db->update('petadrainase', $data);
    }

    public function count(){
        return $this->db->count_all_results('petadrainase'); 
    }

    public function selectoption($filter=""){
        $this->db->select('petadrainaseid,petadrainasename');
        $this->db->from('petadrainase');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_petadrainaseid' class='col-sm-2 control-label'>petadrainase</label>
    <div class='col-sm-10'>
      <select id='r_petadrainaseid' class='form-control' name='r_petadrainaseid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->petadrainaseid."'>".$row->petadrainasename."</option>";
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