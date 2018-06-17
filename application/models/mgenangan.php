<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mgenangan extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('genangan');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>genanganid</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinat</th><th>luasgenangan</th><th>lamagenangan</th><th>frekuensigenangan</th><th>penyebabgenangan</th><th>tinggigenangan</th><th>periodeulangduatahun</th><th>periodeulanglimatahun</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->genanganid."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinat."</td>"."<td>".$row->luasgenangan."</td>"."<td>".$row->lamagenangan."</td>"."<td>".$row->frekuensigenangan."</td>"."<td>".$row->penyebabgenangan."</td>"."<td>".$row->tinggigenangan."</td>"."<td>".$row->periodeulangduatahun."</td>"."<td>".$row->periodeulanglimatahun."</td>"."<td><a class='btn' href=\"//".base_url()."genangan\\edit\\".$row->genanganid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."genangan\\delete\\".$row->genanganid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->genanganid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('genanganid', $id);
        $this->db->delete('genangan');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('genangan');
        $this->db->where('genanganid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('genangan');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
             ".$r_kecamatanid." 
 ".$r_kelurahanid." 

<div class='form-group'>
  <label for='titikkoordinat' class='col-sm-2 control-label'>titikkoordinat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinat' name='titikkoordinat'>
  </div>
</div>
                

<div class='form-group'>
  <label for='luasgenangan' class='col-sm-2 control-label'>luasgenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luasgenangan' name='luasgenangan'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lamagenangan' class='col-sm-2 control-label'>lamagenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lamagenangan' name='lamagenangan'>
  </div>
</div>
                

<div class='form-group'>
  <label for='frekuensigenangan' class='col-sm-2 control-label'>frekuensigenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='frekuensigenangan' name='frekuensigenangan'>
  </div>
</div>
                

<div class='form-group'>
  <label for='penyebabgenangan' class='col-sm-2 control-label'>penyebabgenangan</label>
  <div class='col-sm-10'>
<textarea class='form-control' rows='3' id='penyebabgenangan' name='penyebabgenangan'></textarea>
  </div>
</div>
                

<div class='form-group'>
  <label for='tinggigenangan' class='col-sm-2 control-label'>tinggigenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tinggigenangan' name='tinggigenangan'>
  </div>
</div>
                

<div class='form-group'>
  <label for='periodeulangduatahun' class='col-sm-2 control-label'>periodeulangduatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='periodeulangduatahun' name='periodeulangduatahun'>
  </div>
</div>
                

<div class='form-group'>
  <label for='periodeulanglimatahun' class='col-sm-2 control-label'>periodeulanglimatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='periodeulanglimatahun' name='periodeulanglimatahun'>
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
        $this->db->from('genangan');
        $this->db->where('genanganid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.="  ".$r_kecamatanid."  ".$r_kelurahanid." 
<div class='form-group'>
  <label for='titikkoordinat' class='col-sm-2 control-label'>titikkoordinat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinat' name='titikkoordinat' value='$row->titikkoordinat'>
  </div>
</div>

<div class='form-group'>
  <label for='luasgenangan' class='col-sm-2 control-label'>luasgenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luasgenangan' name='luasgenangan' value='$row->luasgenangan'>
  </div>
</div>

<div class='form-group'>
  <label for='lamagenangan' class='col-sm-2 control-label'>lamagenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lamagenangan' name='lamagenangan' value='$row->lamagenangan'>
  </div>
</div>

<div class='form-group'>
  <label for='frekuensigenangan' class='col-sm-2 control-label'>frekuensigenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='frekuensigenangan' name='frekuensigenangan' value='$row->frekuensigenangan'>
  </div>
</div>

<div class='form-group'>
  <label for='penyebabgenangan' class='col-sm-2 control-label'>penyebabgenangan</label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='3' id='penyebabgenangan' name='penyebabgenangan'>$row->penyebabgenangan</textarea>
  </div>
</div>

<div class='form-group'>
  <label for='tinggigenangan' class='col-sm-2 control-label'>tinggigenangan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tinggigenangan' name='tinggigenangan' value='$row->tinggigenangan'>
  </div>
</div>

<div class='form-group'>
  <label for='periodeulangduatahun' class='col-sm-2 control-label'>periodeulangduatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='periodeulangduatahun' name='periodeulangduatahun' value='$row->periodeulangduatahun'>
  </div>
</div>

<div class='form-group'>
  <label for='periodeulanglimatahun' class='col-sm-2 control-label'>periodeulanglimatahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='periodeulanglimatahun' name='periodeulanglimatahun' value='$row->periodeulanglimatahun'>
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
        $this->db->where('genanganid', $id);
        $this->db->update('genangan', $data);
    }

    public function count(){
        return $this->db->count_all_results('genangan'); 
    }

    public function selectoption($filter=""){
        $this->db->select('genanganid,genanganname');
        $this->db->from('genangan');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_genanganid' class='col-sm-2 control-label'>genangan</label>
    <div class='col-sm-10'>
      <select id='r_genanganid' class='form-control' name='r_genanganid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->genanganid."'>".$row->genanganname."</option>";
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