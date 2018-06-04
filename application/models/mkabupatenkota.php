<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mkabupatenkota extends CI_Model {
    var $r_mprovinsi;
    public function setr_mprovinsi($y){
        $this->r_mprovinsi = $y;} 


    public function select($arrfilter){
        $this->db->select('*');
        $this->db->from('kabupatenkota');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            $this->db->like($name, $value);
        }

        $query = $this->db->get();
        $table ="<table class='table'><tr>";
        $table .=" <th>kabupatenkotaid</th><th>kabupatenkotaname</th><th>r_provinsiid</th><th>kabupatenkotalat</th><th>kabupatenkotalong</th><th>Action</th><tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->kabupatenkotaid."</td>"."<td>".$row->kabupatenkotaname."</td>"."<td>".$row->r_provinsiid."</td>"."<td>".$row->kabupatenkotalat."</td>"."<td>".$row->kabupatenkotalong."</td>"."<td><a class='btn' href=\"//".base_url()."kabupatenkota\\edit\\".$row->kabupatenkotaid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."kabupatenkota\\delete\\".$row->kabupatenkotaid."\">Delete</a></td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('kabupatenkotaid', $id);
        $this->db->delete('kabupatenkota');
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('kabupatenkota');
    }
    public function createview($action){
        $this->load->model("mprovinsi");
        $r_provinsiid = $this->mprovinsi->selectoption();

        
        $form = "
        <form class='form-horizontal' method='post' action='$action'>
            
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

        $form ="  <form method='post' action='$action'>";
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

}