<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class mkolam extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('kolam');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>kolamid</th><th>kolamtype</th><th>namakawasan</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinat</th><th>panjang</th><th>lebar</th><th>luas</th><th>volume</th><th>kondisi</th><th>keberfungsian</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->kolamid."</td>"."<td>".$row->kolamtype."</td>"."<td>".$row->namakawasan."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinat."</td>"."<td>".$row->panjang."</td>"."<td>".$row->lebar."</td>"."<td>".$row->luas."</td>"."<td>".$row->volume."</td>"."<td>".$row->kondisi."</td>"."<td>".$row->keberfungsian."</td>"."<td><a class='btn' href=\"//".base_url()."kolam\\edit\\".$row->kolamid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."kolam\\delete\\".$row->kolamid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->kolamid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('kolamid', $id);
        $this->db->delete('kolam');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('kolam');
        $this->db->where('kolamid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('kolam');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            <div class='form-group'><label for='kolamtype' class='col-sm-2 control-label'>kolamtype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Retensi'>
  <label class='form-check-label' for='kolamtype'>
    Retensi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Tandon'>
  <label class='form-check-label' for='kolamtype'>
    Tandon
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Dentensi'>
  <label class='form-check-label' for='kolamtype'>
    Dentensi
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='namakawasan' class='col-sm-2 control-label'>namakawasan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namakawasan' name='namakawasan'>
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
  <label for='panjang' class='col-sm-2 control-label'>panjang</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='panjang' name='panjang'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lebar' class='col-sm-2 control-label'>lebar</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebar' name='lebar'>
  </div>
</div>
                

<div class='form-group'>
  <label for='luas' class='col-sm-2 control-label'>luas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luas' name='luas'>
  </div>
</div>
                

<div class='form-group'>
  <label for='volume' class='col-sm-2 control-label'>volume</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='volume' name='volume'>
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
        $this->db->from('kolam');
        $this->db->where('kolamid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" <div class='form-group'><label for='kolamtype' class='col-sm-2 control-label'>kolamtype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Retensi' ".($row->kolamtype=='Retensi'?'checked':'').">
  <label class='form-check-label' for='kolamtype'>
    Retensi
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Tandon' ".($row->kolamtype=='Tandon'?'checked':'').">
  <label class='form-check-label' for='kolamtype'>
    Tandon
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kolamtype' id='kolamtype' value='Dentensi' ".($row->kolamtype=='Dentensi'?'checked':'').">
  <label class='form-check-label' for='kolamtype'>
    Dentensi
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='namakawasan' class='col-sm-2 control-label'>namakawasan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namakawasan' name='namakawasan' value='$row->namakawasan'>
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
  <label for='panjang' class='col-sm-2 control-label'>panjang</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='panjang' name='panjang' value='$row->panjang'>
  </div>
</div>

<div class='form-group'>
  <label for='lebar' class='col-sm-2 control-label'>lebar</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebar' name='lebar' value='$row->lebar'>
  </div>
</div>

<div class='form-group'>
  <label for='luas' class='col-sm-2 control-label'>luas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luas' name='luas' value='$row->luas'>
  </div>
</div>

<div class='form-group'>
  <label for='volume' class='col-sm-2 control-label'>volume</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='volume' name='volume' value='$row->volume'>
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
        $this->db->where('kolamid', $id);
        $this->db->update('kolam', $data);
    }

    public function count(){
        return $this->db->count_all_results('kolam'); 
    }

    public function selectoption($filter=""){
        $this->db->select('kolamid,kolamname');
        $this->db->from('kolam');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_kolamid' class='col-sm-2 control-label'>kolam</label>
    <div class='col-sm-10'>
      <select id='r_kolamid' class='form-control' name='r_kolamid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->kolamid."'>".$row->kolamname."</option>";
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