<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mprogramkegiatan extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('programkegiatan');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>programkegiatanid</th><th>r_kabupatenkotaid</th><th>jenispembiayaan</th><th>programkegiatan</th><th>vol</th><th>biaya</th><th>lokasi</th><th>tahun</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->programkegiatanid."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->jenispembiayaan."</td>"."<td>".$row->programkegiatan."</td>"."<td>".$row->vol."</td>"."<td>".$row->biaya."</td>"."<td>".$row->lokasi."</td>"."<td>".$row->tahun."</td>"."<td><a class='btn' href=\"//".base_url()."programkegiatan\\edit\\".$row->programkegiatanid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."programkegiatan\\delete\\".$row->programkegiatanid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->programkegiatanid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('programkegiatanid', $id);
        $this->db->delete('programkegiatan');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('programkegiatan');
        $this->db->where('programkegiatanid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('programkegiatan');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
             ".$r_kabupatenkotaid." 
<div class='form-group'><label for='jenispembiayaan' class='col-sm-2 control-label'>jenispembiayaan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBN'>
  <label class='form-check-label' for='jenispembiayaan'>
    APBN
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBD Provinsi'>
  <label class='form-check-label' for='jenispembiayaan'>
    APBD Provinsi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBD Daerah'>
  <label class='form-check-label' for='jenispembiayaan'>
    APBD Daerah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='DAK'>
  <label class='form-check-label' for='jenispembiayaan'>
    DAK
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='Hibah'>
  <label class='form-check-label' for='jenispembiayaan'>
    Hibah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='CSR'>
  <label class='form-check-label' for='jenispembiayaan'>
    CSR
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='programkegiatan' class='col-sm-2 control-label'>programkegiatan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='programkegiatan' name='programkegiatan'>
  </div>
</div>
                

<div class='form-group'>
  <label for='vol' class='col-sm-2 control-label'>vol</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='vol' name='vol'>
  </div>
</div>
                

<div class='form-group'>
  <label for='biaya' class='col-sm-2 control-label'>biaya</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='biaya' name='biaya'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lokasi' class='col-sm-2 control-label'>lokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lokasi' name='lokasi'>
  </div>
</div>
                

<div class='form-group'>
  <label for='tahun' class='col-sm-2 control-label'>tahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tahun' name='tahun'>
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
        $this->db->from('programkegiatan');
        $this->db->where('programkegiatanid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.="  ".$r_kabupatenkotaid." <div class='form-group'><label for='jenispembiayaan' class='col-sm-2 control-label'>jenispembiayaan</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBN' ".($row->jenispembiayaan=='APBN'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    APBN
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBD Provinsi' ".($row->jenispembiayaan=='APBD Provinsi'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    APBD Provinsi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='APBD Daerah' ".($row->jenispembiayaan=='APBD Daerah'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    APBD Daerah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='DAK' ".($row->jenispembiayaan=='DAK'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    DAK
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='Hibah' ".($row->jenispembiayaan=='Hibah'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    Hibah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='jenispembiayaan' id='jenispembiayaan' value='CSR' ".($row->jenispembiayaan=='CSR'?'checked':'').">
  <label class='form-check-label' for='jenispembiayaan'>
    CSR
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='programkegiatan' class='col-sm-2 control-label'>programkegiatan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='programkegiatan' name='programkegiatan' value='$row->programkegiatan'>
  </div>
</div>

<div class='form-group'>
  <label for='vol' class='col-sm-2 control-label'>vol</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='vol' name='vol' value='$row->vol'>
  </div>
</div>

<div class='form-group'>
  <label for='biaya' class='col-sm-2 control-label'>biaya</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='biaya' name='biaya' value='$row->biaya'>
  </div>
</div>

<div class='form-group'>
  <label for='lokasi' class='col-sm-2 control-label'>lokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lokasi' name='lokasi' value='$row->lokasi'>
  </div>
</div>

<div class='form-group'>
  <label for='tahun' class='col-sm-2 control-label'>tahun</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='tahun' name='tahun' value='$row->tahun'>
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
        $this->db->where('programkegiatanid', $id);
        $this->db->update('programkegiatan', $data);
    }

    public function count(){
        return $this->db->count_all_results('programkegiatan'); 
    }

    public function selectoption($filter=""){
        $this->db->select('programkegiatanid,programkegiatanname');
        $this->db->from('programkegiatan');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_programkegiatanid' class='col-sm-2 control-label'>programkegiatan</label>
    <div class='col-sm-10'>
      <select id='r_programkegiatanid' class='form-control' name='r_programkegiatanid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->programkegiatanid."'>".$row->programkegiatanname."</option>";
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