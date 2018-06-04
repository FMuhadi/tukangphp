<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mkecamatan extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter){
        $this->db->select('*');
        $this->db->from('kecamatan');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            $this->db->like($name, $value);
        }

        $query = $this->db->get();
        $table ="<table class='table'><tr>";
        $table .=" <th>kecamatanid</th><th>kecamatanname</th><th>r_kabupatenkotaid</th><th>Action</th><tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->kecamatanid."</td>"."<td>".$row->kecamatanname."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td><a class='btn' href=\"//".base_url()."kecamatan\\edit\\".$row->kecamatanid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."kecamatan\\delete\\".$row->kecamatanid."\">Delete</a></td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('kecamatanid', $id);
        $this->db->delete('kecamatan');
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('kecamatan');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='kecamatanname' class='col-sm-2 control-label'>kecamatanname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kecamatanname' name='kecamatanname'>
  </div>
</div>
                
 ".$r_kabupatenkotaid." 
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
        $this->db->from('kecamatan');
        $this->db->where('kecamatanid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='kecamatanname' class='col-sm-2 control-label'>kecamatanname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kecamatanname' name='kecamatanname' value='$row->kecamatanname'>
  </div>
</div>
 ".$r_kabupatenkotaid."  ";
        }
        $form .= "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>update</button>
                </div>
              </div></form>";
        return $form;
    }

    public function update($data,$id){
        $this->db->where('kecamatanid', $id);
        $this->db->update('kecamatan', $data);
    }

    public function count(){
        return $this->db->count_all_results('kecamatan'); 
    }

    public function selectoption($filter=""){
        $this->db->select('kecamatanid,kecamatanname');
        $this->db->from('kecamatan');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_kecamatanid' class='col-sm-2 control-label'>kecamatan</label>
    <div class='col-sm-10'>
      <select id='r_kecamatanid' class='form-control' name='r_kecamatanid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->kecamatanid."'>".$row->kecamatanname."</option>";
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