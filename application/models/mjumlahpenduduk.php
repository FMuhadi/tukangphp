<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-04 15:43:41
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mjumlahpenduduk extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter){
        $this->db->select('*');
        $this->db->from('jumlahpenduduk');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            $this->db->like($name, $value);
        }

        $query = $this->db->get();
        $table ="<table class='table'><tr>";
        $table .=" <th>jumlahpendudukid</th><th>jumlahpenduduktahun</th><th>r_kabupatenkotaid</th><th>jumlahpendudukkota</th><th>jumlahpendudukdesa</th><th>Action</th><tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->jumlahpendudukid."</td>"."<td>".$row->jumlahpenduduktahun."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->jumlahpendudukkota."</td>"."<td>".$row->jumlahpendudukdesa."</td>"."<td><a class='btn' href=\"//".base_url()."jumlahpenduduk\\edit\\".$row->jumlahpenduduktahun."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."jumlahpenduduk\\delete\\".$row->jumlahpenduduktahun."\">Delete</a></td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('jumlahpenduduktahun', $id);
        $this->db->delete('jumlahpenduduk');
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('jumlahpenduduk');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form class='form-horizontal' method='post' action='$action'>
             ".$r_kabupatenkotaid." 

<div class='form-group'>
  <label for='jumlahpendudukkota' class='col-sm-2 control-label'>jumlahpendudukkota</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpendudukkota' name='jumlahpendudukkota'>
  </div>
</div>
                

<div class='form-group'>
  <label for='jumlahpendudukdesa' class='col-sm-2 control-label'>jumlahpendudukdesa</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpendudukdesa' name='jumlahpendudukdesa'>
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
        $this->db->from('jumlahpenduduk');
        $this->db->where('jumlahpenduduktahun', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.="  ".$r_kabupatenkotaid." 
<div class='form-group'>
  <label for='jumlahpendudukkota' class='col-sm-2 control-label'>jumlahpendudukkota</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpendudukkota' name='jumlahpendudukkota' value='$row->jumlahpendudukkota'>
  </div>
</div>

<div class='form-group'>
  <label for='jumlahpendudukdesa' class='col-sm-2 control-label'>jumlahpendudukdesa</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpendudukdesa' name='jumlahpendudukdesa' value='$row->jumlahpendudukdesa'>
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
        $this->db->where('jumlahpenduduktahun', $id);
        $this->db->update('jumlahpenduduk', $data);
    }

    public function count(){
        return $this->db->count_all_results('jumlahpenduduk'); 
    }

    public function selectoption($filter=""){
        $this->db->select('jumlahpenduduktahun,jumlahpendudukname');
        $this->db->from('jumlahpenduduk');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_jumlahpendudukid' class='col-sm-2 control-label'>jumlahpenduduk</label>
    <div class='col-sm-10'>
      <select id='r_jumlahpendudukid' class='form-control' name='r_jumlahpendudukid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->jumlahpendudukid."'>".$row->jumlahpendudukname."</option>";
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