<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mjumlahpenduduk extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('jumlahpenduduk');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>jumlahpendudukid</th><th>jumlahpenduduktahun</th><th>r_kabupatenkotaid</th><th>jumlahpendudukkota</th><th>jumlahpendudukdesa</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->jumlahpendudukid."</td>"."<td>".$row->jumlahpenduduktahun."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->jumlahpendudukkota."</td>"."<td>".$row->jumlahpendudukdesa."</td>"."<td><a class='btn' href=\"//".base_url()."jumlahpenduduk\\edit\\".$row->jumlahpendudukid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."jumlahpenduduk\\delete\\".$row->jumlahpendudukid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->jumlahpendudukid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('jumlahpendudukid', $id);
        $this->db->delete('jumlahpenduduk');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('jumlahpenduduk');
        $this->db->where('jumlahpendudukid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('jumlahpenduduk');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='jumlahpenduduktahun' class='col-sm-2 control-label'>jumlahpenduduktahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpenduduktahun' name='jumlahpenduduktahun'>
  </div>
</div>
                
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
        $this->db->where('jumlahpendudukid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='jumlahpenduduktahun' class='col-sm-2 control-label'>jumlahpenduduktahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='jumlahpenduduktahun' name='jumlahpenduduktahun' value='$row->jumlahpenduduktahun'>
  </div>
</div>
 ".$r_kabupatenkotaid." 
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
        $this->db->where('jumlahpendudukid', $id);
        $this->db->update('jumlahpenduduk', $data);
    }

    public function count(){
        return $this->db->count_all_results('jumlahpenduduk'); 
    }

    public function selectoption($filter=""){
        $this->db->select('jumlahpendudukid,jumlahpendudukname');
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