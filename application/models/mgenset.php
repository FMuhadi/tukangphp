<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mgenset extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('genset');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>gensetid</th><th>namalokasi</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinat</th><th>kapasitas</th><th>kondisi</th><th>keberfungsian</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->gensetid."</td>"."<td>".$row->namalokasi."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinat."</td>"."<td>".$row->kapasitas."</td>"."<td>".$row->kondisi."</td>"."<td>".$row->keberfungsian."</td>"."<td><a class='btn' href=\"//".base_url()."genset\\edit\\".$row->gensetid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."genset\\delete\\".$row->gensetid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->gensetid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('gensetid', $id);
        $this->db->delete('genset');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('genset');
        $this->db->where('gensetid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('genset');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='namalokasi' class='col-sm-2 control-label'>namalokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namalokasi' name='namalokasi'>
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
  <label for='kapasitas' class='col-sm-2 control-label'>kapasitas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kapasitas' name='kapasitas'>
  </div>
</div>
                
<div class='form-group'><label for='kondisi' class='col-sm-2 control-label'>kondisi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kondisi' id='kondisi' value='Baik'>
  <label class='form-check-label' for='kondisi'>
    Baik
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kondisi' id='kondisi' value='Tidak Baik'>
  <label class='form-check-label' for='kondisi'>
    Tidak Baik
  </label>
</div>
</div></div>
<div class='form-group'><label for='keberfungsian' class='col-sm-2 control-label'>keberfungsian</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='keberfungsian' id='keberfungsian' value='Berfungsi'>
  <label class='form-check-label' for='keberfungsian'>
    Berfungsi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='keberfungsian' id='keberfungsian' value='Tidak Berfungsi'>
  <label class='form-check-label' for='keberfungsian'>
    Tidak Berfungsi
  </label>
</div>
</div></div>
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
        $this->db->from('genset');
        $this->db->where('gensetid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='namalokasi' class='col-sm-2 control-label'>namalokasi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namalokasi' name='namalokasi' value='$row->namalokasi'>
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
  <label for='kapasitas' class='col-sm-2 control-label'>kapasitas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='kapasitas' name='kapasitas' value='$row->kapasitas'>
  </div>
</div>
<div class='form-group'><label for='kondisi' class='col-sm-2 control-label'>kondisi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kondisi' id='kondisi' value='Baik' ".($row->kondisi=='Baik'?'checked':'').">
  <label class='form-check-label' for='kondisi'>
    Baik
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kondisi' id='kondisi' value='Tidak Baik' ".($row->kondisi=='Tidak Baik'?'checked':'').">
  <label class='form-check-label' for='kondisi'>
    Tidak Baik
  </label>
</div>
</div></div><div class='form-group'><label for='keberfungsian' class='col-sm-2 control-label'>keberfungsian</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='keberfungsian' id='keberfungsian' value='Berfungsi' ".($row->keberfungsian=='Berfungsi'?'checked':'').">
  <label class='form-check-label' for='keberfungsian'>
    Berfungsi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='keberfungsian' id='keberfungsian' value='Tidak Berfungsi' ".($row->keberfungsian=='Tidak Berfungsi'?'checked':'').">
  <label class='form-check-label' for='keberfungsian'>
    Tidak Berfungsi
  </label>
</div>
</div></div> ";
        }
        $form .= "<div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                  <button type='submit' class='btn btn-default'>update</button>
                </div>
              </div></form>";
        return $form;
    }

    public function update($data,$id){
        $this->db->where('gensetid', $id);
        $this->db->update('genset', $data);
    }

    public function count(){
        return $this->db->count_all_results('genset'); 
    }

    public function selectoption($filter=""){
        $this->db->select('gensetid,gensetname');
        $this->db->from('genset');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_gensetid' class='col-sm-2 control-label'>genset</label>
    <div class='col-sm-10'>
      <select id='r_gensetid' class='form-control' name='r_gensetid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->gensetid."'>".$row->gensetname."</option>";
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