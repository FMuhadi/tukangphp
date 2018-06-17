<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class msaluran extends CI_Model {
    var $r_mkecamatan;
    public function setr_mkecamatan($y){
        $this->r_mkecamatan = $y;} 
    var $r_mkelurahan;
    public function setr_mkelurahan($y){
        $this->r_mkelurahan = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('saluran');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>saluranprimerid</th><th>namakawasan</th><th>salurantype</th><th>r_kecamatanid</th><th>r_kelurahanid</th><th>titikkoordinatawal</th><th>titikkoordinatakhir</th><th>panjangsaluran</th><th>lebarsaluranatas</th><th>lebarsaluranbawah</th><th>elevasisaluran</th><th>kapasitassaluran</th><th>konstruksisaluran</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->saluranprimerid."</td>"."<td>".$row->namakawasan."</td>"."<td>".$row->salurantype."</td>"."<td>".$row->r_kecamatanid."</td>"."<td>".$row->r_kelurahanid."</td>"."<td>".$row->titikkoordinatawal."</td>"."<td>".$row->titikkoordinatakhir."</td>"."<td>".$row->panjangsaluran."</td>"."<td>".$row->lebarsaluranatas."</td>"."<td>".$row->lebarsaluranbawah."</td>"."<td>".$row->elevasisaluran."</td>"."<td>".$row->kapasitassaluran."</td>"."<td>".$row->konstruksisaluran."</td>"."<td><a class='btn' href=\"//".base_url()."saluran\\edit\\".$row->saluranprimerid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."saluran\\delete\\".$row->saluranprimerid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->saluranprimerid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('saluranprimerid', $id);
        $this->db->delete('saluran');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('saluran');
        $this->db->where('saluranprimerid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('saluran');
    }
    public function createview($action){
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='namakawasan' class='col-sm-2 control-label'>namakawasan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namakawasan' name='namakawasan'>
  </div>
</div>
                
<div class='form-group'><label for='salurantype' class='col-sm-2 control-label'>salurantype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Primer'>
  <label class='form-check-label' for='salurantype'>
    Primer
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Sekunder'>
  <label class='form-check-label' for='salurantype'>
    Sekunder
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Tersier'>
  <label class='form-check-label' for='salurantype'>
    Tersier
  </label>
</div>
</div></div>
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
  <label for='panjangsaluran' class='col-sm-2 control-label'>panjangsaluran</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='panjangsaluran' name='panjangsaluran'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lebarsaluranatas' class='col-sm-2 control-label'>lebarsaluranatas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebarsaluranatas' name='lebarsaluranatas'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lebarsaluranbawah' class='col-sm-2 control-label'>lebarsaluranbawah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebarsaluranbawah' name='lebarsaluranbawah'>
  </div>
</div>
                

<div class='form-group'>
  <label for='elevasisaluran' class='col-sm-2 control-label'>elevasisaluran</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='elevasisaluran' name='elevasisaluran'>
  </div>
</div>
                
<div class='form-group'><label for='kapasitassaluran' class='col-sm-2 control-label'>kapasitassaluran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kapasitassaluran' id='kapasitassaluran' value='Saluran Terbuka'>
  <label class='form-check-label' for='kapasitassaluran'>
    Saluran Terbuka
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kapasitassaluran' id='kapasitassaluran' value='Saluran Tertutup'>
  <label class='form-check-label' for='kapasitassaluran'>
    Saluran Tertutup
  </label>
</div>
</div></div>
<div class='form-group'><label for='konstruksisaluran' class='col-sm-2 control-label'>konstruksisaluran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Beton'>
  <label class='form-check-label' for='konstruksisaluran'>
    Beton
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Pasangan Batu'>
  <label class='form-check-label' for='konstruksisaluran'>
    Pasangan Batu
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Tanah'>
  <label class='form-check-label' for='konstruksisaluran'>
    Tanah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Lainnya'>
  <label class='form-check-label' for='konstruksisaluran'>
    Lainnya
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
        $this->db->from('saluran');
        $this->db->where('saluranprimerid', $id);
        $query = $this->db->get();
        $this->load->model("mkecamatan");
        $r_kecamatanid = $this->mkecamatan->selectoption();
        $this->load->model("mkelurahan");
        $r_kelurahanid = $this->mkelurahan->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='namakawasan' class='col-sm-2 control-label'>namakawasan</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namakawasan' name='namakawasan' value='$row->namakawasan'>
  </div>
</div>
<div class='form-group'><label for='salurantype' class='col-sm-2 control-label'>salurantype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Primer' ".($row->salurantype=='Primer'?'checked':'').">
  <label class='form-check-label' for='salurantype'>
    Primer
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Sekunder' ".($row->salurantype=='Sekunder'?'checked':'').">
  <label class='form-check-label' for='salurantype'>
    Sekunder
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='salurantype' id='salurantype' value='Tersier' ".($row->salurantype=='Tersier'?'checked':'').">
  <label class='form-check-label' for='salurantype'>
    Tersier
  </label>
</div>
</div></div> ".$r_kecamatanid."  ".$r_kelurahanid." 
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

<div class='form-group'>
  <label for='panjangsaluran' class='col-sm-2 control-label'>panjangsaluran</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='panjangsaluran' name='panjangsaluran' value='$row->panjangsaluran'>
  </div>
</div>

<div class='form-group'>
  <label for='lebarsaluranatas' class='col-sm-2 control-label'>lebarsaluranatas</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebarsaluranatas' name='lebarsaluranatas' value='$row->lebarsaluranatas'>
  </div>
</div>

<div class='form-group'>
  <label for='lebarsaluranbawah' class='col-sm-2 control-label'>lebarsaluranbawah</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lebarsaluranbawah' name='lebarsaluranbawah' value='$row->lebarsaluranbawah'>
  </div>
</div>

<div class='form-group'>
  <label for='elevasisaluran' class='col-sm-2 control-label'>elevasisaluran</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='elevasisaluran' name='elevasisaluran' value='$row->elevasisaluran'>
  </div>
</div>
<div class='form-group'><label for='kapasitassaluran' class='col-sm-2 control-label'>kapasitassaluran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kapasitassaluran' id='kapasitassaluran' value='Saluran Terbuka' ".($row->kapasitassaluran=='Saluran Terbuka'?'checked':'').">
  <label class='form-check-label' for='kapasitassaluran'>
    Saluran Terbuka
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='kapasitassaluran' id='kapasitassaluran' value='Saluran Tertutup' ".($row->kapasitassaluran=='Saluran Tertutup'?'checked':'').">
  <label class='form-check-label' for='kapasitassaluran'>
    Saluran Tertutup
  </label>
</div>
</div></div><div class='form-group'><label for='konstruksisaluran' class='col-sm-2 control-label'>konstruksisaluran</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Beton' ".($row->konstruksisaluran=='Beton'?'checked':'').">
  <label class='form-check-label' for='konstruksisaluran'>
    Beton
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Pasangan Batu' ".($row->konstruksisaluran=='Pasangan Batu'?'checked':'').">
  <label class='form-check-label' for='konstruksisaluran'>
    Pasangan Batu
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Tanah' ".($row->konstruksisaluran=='Tanah'?'checked':'').">
  <label class='form-check-label' for='konstruksisaluran'>
    Tanah
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='konstruksisaluran' id='konstruksisaluran' value='Lainnya' ".($row->konstruksisaluran=='Lainnya'?'checked':'').">
  <label class='form-check-label' for='konstruksisaluran'>
    Lainnya
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
        $this->db->where('saluranprimerid', $id);
        $this->db->update('saluran', $data);
    }

    public function count(){
        return $this->db->count_all_results('saluran'); 
    }

    public function selectoption($filter=""){
        $this->db->select('saluranprimerid,saluranname');
        $this->db->from('saluran');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_saluranid' class='col-sm-2 control-label'>saluran</label>
    <div class='col-sm-10'>
      <select id='r_saluranid' class='form-control' name='r_saluranid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->saluranid."'>".$row->saluranname."</option>";
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