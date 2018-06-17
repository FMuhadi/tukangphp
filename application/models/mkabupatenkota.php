<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mkabupatenkota extends CI_Model {
    var $r_mprovinsi;
    public function setr_mprovinsi($y){
        $this->r_mprovinsi = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('kabupatenkota');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>kabupatenkotaid</th><th>kabupatenkotaname</th><th>r_provinsiid</th><th>kabupatenkotalat</th><th>kabupatenkotalong</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->kabupatenkotaid."</td>"."<td>".$row->kabupatenkotaname."</td>"."<td>".$row->r_provinsiid."</td>"."<td>".$row->kabupatenkotalat."</td>"."<td>".$row->kabupatenkotalong."</td>"."<td><a class='btn' href=\"//".base_url()."kabupatenkota\\edit\\".$row->kabupatenkotaid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."kabupatenkota\\delete\\".$row->kabupatenkotaid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->kabupatenkotaid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('kabupatenkotaid', $id);
        $this->db->delete('kabupatenkota');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('kabupatenkota');
        $this->db->where('kabupatenkotaid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('kabupatenkota');
    }
    public function createview($action){
        $this->load->model("mprovinsi");
        $r_provinsiid = $this->mprovinsi->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='kabupatenkotaname' class='col-sm-2 control-label'>kabupatenkotaname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotaname' name='kabupatenkotaname'>
  </div>
</div>
                
 ".$r_provinsiid." 

<div class='form-group'>
  <label for='kabupatenkotalat' class='col-sm-2 control-label'>kabupatenkotalat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotalat' name='kabupatenkotalat'>
  </div>
</div>
                

<div class='form-group'>
  <label for='kabupatenkotalong' class='col-sm-2 control-label'>kabupatenkotalong</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotalong' name='kabupatenkotalong'>
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
        $this->db->from('kabupatenkota');
        $this->db->where('kabupatenkotaid', $id);
        $query = $this->db->get();
        $this->load->model("mprovinsi");
        $r_provinsiid = $this->mprovinsi->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='kabupatenkotaname' class='col-sm-2 control-label'>kabupatenkotaname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotaname' name='kabupatenkotaname' value='$row->kabupatenkotaname'>
  </div>
</div>
 ".$r_provinsiid." 
<div class='form-group'>
  <label for='kabupatenkotalat' class='col-sm-2 control-label'>kabupatenkotalat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotalat' name='kabupatenkotalat' value='$row->kabupatenkotalat'>
  </div>
</div>

<div class='form-group'>
  <label for='kabupatenkotalong' class='col-sm-2 control-label'>kabupatenkotalong</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kabupatenkotalong' name='kabupatenkotalong' value='$row->kabupatenkotalong'>
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
        $this->db->where('kabupatenkotaid', $id);
        $this->db->update('kabupatenkota', $data);
    }

    public function count(){
        return $this->db->count_all_results('kabupatenkota'); 
    }

    public function selectoption($filter=""){
        $this->db->select('kabupatenkotaid,kabupatenkotaname');
        $this->db->from('kabupatenkota');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_kabupatenkotaid' class='col-sm-2 control-label'>kabupatenkota</label>
    <div class='col-sm-10'>
      <select id='r_kabupatenkotaid' class='form-control' name='r_kabupatenkotaid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->kabupatenkotaid."'>".$row->kabupatenkotaname."</option>";
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