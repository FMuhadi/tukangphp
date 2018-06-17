<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mbanjirrencana extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('banjirrencana');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>banjirrencanaid</th><th>namasungai</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinatawal</th><th>titikkoordinatakhir</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->banjirrencanaid."</td>"."<td>".$row->namasungai."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinatawal."</td>"."<td>".$row->titikkoordinatakhir."</td>"."<td><a class='btn' href=\"//".base_url()."banjirrencana\\edit\\".$row->banjirrencanaid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."banjirrencana\\delete\\".$row->banjirrencanaid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->banjirrencanaid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('banjirrencanaid', $id);
        $this->db->delete('banjirrencana');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('banjirrencana');
        $this->db->where('banjirrencanaid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('banjirrencana');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='namasungai' class='col-sm-2 control-label'>namasungai</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namasungai' name='namasungai'>
  </div>
</div>
                
 ".$r_kecamatanid." 
 ".$r_kelurahanid." 

<div class='form-group'>
  <label for='titikkoordinatawal' class='col-sm-2 control-label'>titikkoordinatawal</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinatawal' name='titikkoordinatawal'>
  </div>
</div>
                

<div class='form-group'>
  <label for='titikkoordinatakhir' class='col-sm-2 control-label'>titikkoordinatakhir</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinatakhir' name='titikkoordinatakhir'>
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
        $this->db->from('banjirrencana');
        $this->db->where('banjirrencanaid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='namasungai' class='col-sm-2 control-label'>namasungai</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namasungai' name='namasungai' value='$row->namasungai'>
  </div>
</div>
 ".$r_kecamatanid."  ".$r_kelurahanid." 
<div class='form-group'>
  <label for='titikkoordinatawal' class='col-sm-2 control-label'>titikkoordinatawal</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinatawal' name='titikkoordinatawal' value='$row->titikkoordinatawal'>
  </div>
</div>

<div class='form-group'>
  <label for='titikkoordinatakhir' class='col-sm-2 control-label'>titikkoordinatakhir</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinatakhir' name='titikkoordinatakhir' value='$row->titikkoordinatakhir'>
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
        $this->db->where('banjirrencanaid', $id);
        $this->db->update('banjirrencana', $data);
    }

    public function count(){
        return $this->db->count_all_results('banjirrencana'); 
    }

    public function selectoption($filter=""){
        $this->db->select('banjirrencanaid,banjirrencananame');
        $this->db->from('banjirrencana');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_banjirrencanaid' class='col-sm-2 control-label'>banjirrencana</label>
    <div class='col-sm-10'>
      <select id='r_banjirrencanaid' class='form-control' name='r_banjirrencanaid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->banjirrencanaid."'>".$row->banjirrencananame."</option>";
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