<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mlabel extends CI_Model {


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('label');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>labelid</th><th>labelname</th><th>labelvalue</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->labelid."</td>"."<td>".$row->labelname."</td>"."<td>".$row->labelvalue."</td>"."<td><a class='btn' href=\"//".base_url()."label\\edit\\".$row->labelid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."label\\delete\\".$row->labelid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->labelid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('labelid', $id);
        $this->db->delete('label');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('label');
        $this->db->where('labelid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('label');
    }
    public function createview($action){

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='labelname' class='col-sm-2 control-label'>labelname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='labelname' name='labelname'>
  </div>
</div>
                

<div class='form-group'>
  <label for='labelvalue' class='col-sm-2 control-label'>labelvalue</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='labelvalue' name='labelvalue'>
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
        $this->db->from('label');
        $this->db->where('labelid', $id);
        $query = $this->db->get();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='labelname' class='col-sm-2 control-label'>labelname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='labelname' name='labelname' value='$row->labelname'>
  </div>
</div>

<div class='form-group'>
  <label for='labelvalue' class='col-sm-2 control-label'>labelvalue</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='labelvalue' name='labelvalue' value='$row->labelvalue'>
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
        $this->db->where('labelid', $id);
        $this->db->update('label', $data);
    }

    public function count(){
        return $this->db->count_all_results('label'); 
    }

    public function selectoption($filter=""){
        $this->db->select('labelid,labelname');
        $this->db->from('label');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_labelid' class='col-sm-2 control-label'>label</label>
    <div class='col-sm-10'>
      <select id='r_labelid' class='form-control' name='r_labelid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->labelid."'>".$row->labelname."</option>";
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