<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mprovinsi extends CI_Model {


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('provinsi');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>provinsiid</th><th>provinsiname</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->provinsiid."</td>"."<td>".$row->provinsiname."</td>"."<td><a class='btn' href=\"//".base_url()."provinsi\\edit\\".$row->provinsiid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."provinsi\\delete\\".$row->provinsiid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->provinsiid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('provinsiid', $id);
        $this->db->delete('provinsi');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('provinsi');
        $this->db->where('provinsiid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('provinsi');
    }
    public function createview($action){

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='provinsiname' class='col-sm-2 control-label'>provinsiname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='provinsiname' name='provinsiname'>
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
        $this->db->from('provinsi');
        $this->db->where('provinsiid', $id);
        $query = $this->db->get();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='provinsiname' class='col-sm-2 control-label'>provinsiname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='provinsiname' name='provinsiname' value='$row->provinsiname'>
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
        $this->db->where('provinsiid', $id);
        $this->db->update('provinsi', $data);
    }

    public function count(){
        return $this->db->count_all_results('provinsi'); 
    }

    public function selectoption($filter=""){
        $this->db->select('provinsiid,provinsiname');
        $this->db->from('provinsi');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_provinsiid' class='col-sm-2 control-label'>provinsi</label>
    <div class='col-sm-10'>
      <select id='r_provinsiid' class='form-control' name='r_provinsiid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->provinsiid."'>".$row->provinsiname."</option>";
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