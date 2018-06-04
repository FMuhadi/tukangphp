<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mkelurahan extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 


    public function select($arrfilter){
        $this->db->select('*');
        $this->db->from('kelurahan');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            $this->db->like($name, $value);
        }

        $query = $this->db->get();
        $table ="<table class='table'><tr>";
        $table .=" <th>kelurahanid</th><th>kelurahanname</th><th>r_kecamatanid</th><th>Action</th><tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->kelurahanid."</td>"."<td>".$row->kelurahanname."</td>"."<td>".$row->r_kecamatanid."</td>"."<td><a class='btn' href=\"//".base_url()."kelurahan\\edit\\".$row->kelurahanid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."kelurahan\\delete\\".$row->kelurahanid."\">Delete</a></td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('kelurahanid', $id);
        $this->db->delete('kelurahan');
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('kelurahan');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();

        
        $form = "
        <form class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='kelurahanname' class='col-sm-2 control-label'>kelurahanname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kelurahanname' name='kelurahanname'>
  </div>
</div>
                
 ".$r_kecamatanid." 
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
        $this->db->from('kelurahan');
        $this->db->where('kelurahanid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();

        $form ="  <form method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='kelurahanname' class='col-sm-2 control-label'>kelurahanname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kelurahanname' name='kelurahanname' value='$row->kelurahanname'>
  </div>
</div>
 ".$r_kecamatanid."  ";
        }
        $form .= "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>update</button>
                </div>
              </div></form>";
        return $form;
    }

    public function update($data,$id){
        $this->db->where('kelurahanid', $id);
        $this->db->update('kelurahan', $data);
    }

    public function count(){
        return $this->db->count_all_results('kelurahan'); 
    }

    public function selectoption($filter=""){
        $this->db->select('kelurahanid,kelurahanname');
        $this->db->from('kelurahan');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_kelurahanid' class='col-sm-2 control-label'>kelurahan</label>
    <div class='col-sm-10'>
      <select id='r_kelurahanid' class='form-control' name='r_kelurahanid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->kelurahanid."'>".$row->kelurahanname."</option>";
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