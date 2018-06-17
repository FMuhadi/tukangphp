<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mpasangsurut extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('pasangsurut');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>pasangsurutid</th><th>lokasi</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinat</th><th>tertinggi</th><th>ratarata</th><th>terendah</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->pasangsurutid."</td>"."<td>".$row->lokasi."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinat."</td>"."<td>".$row->tertinggi."</td>"."<td>".$row->ratarata."</td>"."<td>".$row->terendah."</td>"."<td><a class='btn' href=\"//".base_url()."pasangsurut\\edit\\".$row->pasangsurutid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."pasangsurut\\delete\\".$row->pasangsurutid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->pasangsurutid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('pasangsurutid', $id);
        $this->db->delete('pasangsurut');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('pasangsurut');
        $this->db->where('pasangsurutid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('pasangsurut');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='lokasi' class='col-sm-2 control-label'>lokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lokasi' name='lokasi'>
  </div>
</div>
                
 ".$r_kecamatanid." 
 ".$r_kelurahanid." 

<div class='form-group'>
  <label for='titikkoordinat' class='col-sm-2 control-label'>titikkoordinat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinat' name='titikkoordinat'>
  </div>
</div>
                

<div class='form-group'>
  <label for='tertinggi' class='col-sm-2 control-label'>tertinggi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tertinggi' name='tertinggi'>
  </div>
</div>
                

<div class='form-group'>
  <label for='ratarata' class='col-sm-2 control-label'>ratarata</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='ratarata' name='ratarata'>
  </div>
</div>
                

<div class='form-group'>
  <label for='terendah' class='col-sm-2 control-label'>terendah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='terendah' name='terendah'>
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
        $this->db->from('pasangsurut');
        $this->db->where('pasangsurutid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='lokasi' class='col-sm-2 control-label'>lokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lokasi' name='lokasi' value='$row->lokasi'>
  </div>
</div>
 ".$r_kecamatanid."  ".$r_kelurahanid." 
<div class='form-group'>
  <label for='titikkoordinat' class='col-sm-2 control-label'>titikkoordinat</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='titikkoordinat' name='titikkoordinat' value='$row->titikkoordinat'>
  </div>
</div>

<div class='form-group'>
  <label for='tertinggi' class='col-sm-2 control-label'>tertinggi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tertinggi' name='tertinggi' value='$row->tertinggi'>
  </div>
</div>

<div class='form-group'>
  <label for='ratarata' class='col-sm-2 control-label'>ratarata</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='ratarata' name='ratarata' value='$row->ratarata'>
  </div>
</div>

<div class='form-group'>
  <label for='terendah' class='col-sm-2 control-label'>terendah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='terendah' name='terendah' value='$row->terendah'>
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
        $this->db->where('pasangsurutid', $id);
        $this->db->update('pasangsurut', $data);
    }

    public function count(){
        return $this->db->count_all_results('pasangsurut'); 
    }

    public function selectoption($filter=""){
        $this->db->select('pasangsurutid,pasangsurutname');
        $this->db->from('pasangsurut');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_pasangsurutid' class='col-sm-2 control-label'>pasangsurut</label>
    <div class='col-sm-10'>
      <select id='r_pasangsurutid' class='form-control' name='r_pasangsurutid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->pasangsurutid."'>".$row->pasangsurutname."</option>";
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