<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mdatateknis extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('datateknis');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>datateknisid</th><th>r_kabupatenkotaid</th><th>masterplan</th><th>masterplantahun</th><th>outlineplan</th><th>outlineplantahun</th><th>ded</th><th>dedtahun</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->datateknisid."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->masterplan."</td>"."<td>".$row->masterplantahun."</td>"."<td>".$row->outlineplan."</td>"."<td>".$row->outlineplantahun."</td>"."<td>".$row->ded."</td>"."<td>".$row->dedtahun."</td>"."<td><a class='btn' href=\"//".base_url()."datateknis\\edit\\".$row->datateknisid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."datateknis\\delete\\".$row->datateknisid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->datateknisid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('datateknisid', $id);
        $this->db->delete('datateknis');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('datateknis');
        $this->db->where('datateknisid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('datateknis');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
             ".$r_kabupatenkotaid." 
<div class='form-group'><label for='masterplan' class='col-sm-2 control-label'>masterplan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='masterplan' id='masterplan' value='Ada'>
  <label class='form-check-label' for='masterplan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='masterplan' id='masterplan' value='Tidak'>
  <label class='form-check-label' for='masterplan'>
    Tidak
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='masterplantahun' class='col-sm-2 control-label'>masterplantahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='masterplantahun' name='masterplantahun'>
  </div>
</div>
                
<div class='form-group'><label for='outlineplan' class='col-sm-2 control-label'>outlineplan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='outlineplan' id='outlineplan' value='Ada'>
  <label class='form-check-label' for='outlineplan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='outlineplan' id='outlineplan' value='Tidak'>
  <label class='form-check-label' for='outlineplan'>
    Tidak
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='outlineplantahun' class='col-sm-2 control-label'>outlineplantahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='outlineplantahun' name='outlineplantahun'>
  </div>
</div>
                
<div class='form-group'><label for='ded' class='col-sm-2 control-label'>ded</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='ded' id='ded' value='Ada'>
  <label class='form-check-label' for='ded'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='ded' id='ded' value='Tidak'>
  <label class='form-check-label' for='ded'>
    Tidak
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='dedtahun' class='col-sm-2 control-label'>dedtahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='dedtahun' name='dedtahun'>
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
        $this->db->from('datateknis');
        $this->db->where('datateknisid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.="  ".$r_kabupatenkotaid." <div class='form-group'><label for='masterplan' class='col-sm-2 control-label'>masterplan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='masterplan' id='masterplan' value='Ada' ".($row->masterplan=='Ada'?'checked':'').">
  <label class='form-check-label' for='masterplan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='masterplan' id='masterplan' value='Tidak' ".($row->masterplan=='Tidak'?'checked':'').">
  <label class='form-check-label' for='masterplan'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='masterplantahun' class='col-sm-2 control-label'>masterplantahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='masterplantahun' name='masterplantahun' value='$row->masterplantahun'>
  </div>
</div>
<div class='form-group'><label for='outlineplan' class='col-sm-2 control-label'>outlineplan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='outlineplan' id='outlineplan' value='Ada' ".($row->outlineplan=='Ada'?'checked':'').">
  <label class='form-check-label' for='outlineplan'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='outlineplan' id='outlineplan' value='Tidak' ".($row->outlineplan=='Tidak'?'checked':'').">
  <label class='form-check-label' for='outlineplan'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='outlineplantahun' class='col-sm-2 control-label'>outlineplantahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='outlineplantahun' name='outlineplantahun' value='$row->outlineplantahun'>
  </div>
</div>
<div class='form-group'><label for='ded' class='col-sm-2 control-label'>ded</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='ded' id='ded' value='Ada' ".($row->ded=='Ada'?'checked':'').">
  <label class='form-check-label' for='ded'>
    Ada
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='ded' id='ded' value='Tidak' ".($row->ded=='Tidak'?'checked':'').">
  <label class='form-check-label' for='ded'>
    Tidak
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='dedtahun' class='col-sm-2 control-label'>dedtahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='dedtahun' name='dedtahun' value='$row->dedtahun'>
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
        $this->db->where('datateknisid', $id);
        $this->db->update('datateknis', $data);
    }

    public function count(){
        return $this->db->count_all_results('datateknis'); 
    }

    public function selectoption($filter=""){
        $this->db->select('datateknisid,datateknisname');
        $this->db->from('datateknis');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_datateknisid' class='col-sm-2 control-label'>datateknis</label>
    <div class='col-sm-10'>
      <select id='r_datateknisid' class='form-control' name='r_datateknisid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->datateknisid."'>".$row->datateknisname."</option>";
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