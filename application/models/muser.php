<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class muser extends CI_Model {
    var $r_mprovinsi;
    public function setr_mprovinsi($y){
        $this->r_mprovinsi = $y;} 


    public function select($arrfilter){
        $this->db->select('*');
        $this->db->from('user');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            $this->db->like($name, $value);
        }

        $query = $this->db->get();
        $table ="<table class='table'><tr>";
        $table .=" <th>userid</th><th>username</th><th>userpassword</th><th>r_provinsiid</th><th>usercreated</th><th>userlastlogin</th><th>userexpired</th><th>usertype</th><th>Action</th><tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->userid."</td>"."<td>".$row->username."</td>"."<td>".$row->userpassword."</td>"."<td>".$row->r_provinsiid."</td>"."<td>".$row->usercreated."</td>"."<td>".$row->userlastlogin."</td>"."<td>".$row->userexpired."</td>"."<td>".$row->usertype."</td>"."<td><a class='btn' href=\"//".base_url()."user\\edit\\".$row->userid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."user\\delete\\".$row->userid."\">Delete</a></td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('userid', $id);
        $this->db->delete('user');
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('user');
    }
    public function createview($action){
        $this->load->model("mprovinsi");
        $r_provinsiid = $this->mprovinsi->selectoption();

        
        $form = "
        <form class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='username' class='col-sm-2 control-label'>username</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='username' name='username'>
  </div>
</div>
                

<div class='form-group'>
  <label for='userpassword' class='col-sm-2 control-label'>userpassword</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userpassword' name='userpassword'>
  </div>
</div>
                
 ".$r_provinsiid." 

<div class='form-group'>
  <label for='usercreated' class='col-sm-2 control-label'>usercreated</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='usercreated' name='usercreated'>
  </div>
</div>
                

<div class='form-group'>
  <label for='userlastlogin' class='col-sm-2 control-label'>userlastlogin</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userlastlogin' name='userlastlogin'>
  </div>
</div>
                

<div class='form-group'>
  <label for='userexpired' class='col-sm-2 control-label'>userexpired</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userexpired' name='userexpired'>
  </div>
</div>
                

<div class='form-group'>
  <label for='usertype' class='col-sm-2 control-label'>usertype</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='usertype' name='usertype'>
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
        $this->db->from('user');
        $this->db->where('userid', $id);
        $query = $this->db->get();
        $this->load->model("mprovinsi");
        $r_provinsiid = $this->mprovinsi->selectoption();

        $form ="  <form method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='username' class='col-sm-2 control-label'>username</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='username' name='username' value='$row->username'>
  </div>
</div>

<div class='form-group'>
  <label for='userpassword' class='col-sm-2 control-label'>userpassword</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userpassword' name='userpassword' value='$row->userpassword'>
  </div>
</div>
 ".$r_provinsiid." 
<div class='form-group'>
  <label for='usercreated' class='col-sm-2 control-label'>usercreated</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='usercreated' name='usercreated' value='$row->usercreated'>
  </div>
</div>

<div class='form-group'>
  <label for='userlastlogin' class='col-sm-2 control-label'>userlastlogin</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userlastlogin' name='userlastlogin' value='$row->userlastlogin'>
  </div>
</div>

<div class='form-group'>
  <label for='userexpired' class='col-sm-2 control-label'>userexpired</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='userexpired' name='userexpired' value='$row->userexpired'>
  </div>
</div>

<div class='form-group'>
  <label for='usertype' class='col-sm-2 control-label'>usertype</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='usertype' name='usertype' value='$row->usertype'>
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
        $this->db->where('userid', $id);
        $this->db->update('user', $data);
    }

    public function count(){
        return $this->db->count_all_results('user'); 
    }

    public function selectoption($filter=""){
        $this->db->select('userid,username');
        $this->db->from('user');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_userid' class='col-sm-2 control-label'>user</label>
    <div class='col-sm-10'>
      <select id='r_userid' class='form-control' name='r_userid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->userid."'>".$row->username."</option>";
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