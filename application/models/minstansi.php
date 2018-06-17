<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class minstansi extends CI_Model {
    var $r_mkabupatenkota;
    public function setr_mkabupatenkota($y){
        $this->r_mkabupatenkota = $y;} 


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('instansi');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>instansiid</th><th>namainstansi</th><th>r_kabupatenkotaid</th><th>pegawaitetap</th><th>pegawaikontrak</th><th>strukturorganisasi</th><th>luluss2s3</th><th>luluss1</th><th>lulusd3</th><th>lulussma</th><th>lulussmp</th><th>total</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->instansiid."</td>"."<td>".$row->namainstansi."</td>"."<td>".$row->r_kabupatenkotaid."</td>"."<td>".$row->pegawaitetap."</td>"."<td>".$row->pegawaikontrak."</td>"."<td>".$row->strukturorganisasi."</td>"."<td>".$row->luluss2s3."</td>"."<td>".$row->luluss1."</td>"."<td>".$row->lulusd3."</td>"."<td>".$row->lulussma."</td>"."<td>".$row->lulussmp."</td>"."<td>".$row->total."</td>"."<td><a class='btn' href=\"//".base_url()."instansi\\edit\\".$row->instansiid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."instansi\\delete\\".$row->instansiid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->instansiid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('instansiid', $id);
        $this->db->delete('instansi');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('instansi');
        $this->db->where('instansiid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('instansi');
    }
    public function createview($action){
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='namainstansi' class='col-sm-2 control-label'>namainstansi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namainstansi' name='namainstansi'>
  </div>
</div>
                
 ".$r_kabupatenkotaid." 

<div class='form-group'>
  <label for='pegawaitetap' class='col-sm-2 control-label'>pegawaitetap</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='pegawaitetap' name='pegawaitetap'>
  </div>
</div>
                

<div class='form-group'>
  <label for='pegawaikontrak' class='col-sm-2 control-label'>pegawaikontrak</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='pegawaikontrak' name='pegawaikontrak'>
  </div>
</div>
                
<div class='form-group'><label for='strukturorganisasi' class='col-sm-2 control-label'>strukturorganisasi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='ada dan terlampir'>
  <label class='form-check-label' for='strukturorganisasi'>
    ada dan terlampir
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='ada tetapi tidak terlampir'>
  <label class='form-check-label' for='strukturorganisasi'>
    ada tetapi tidak terlampir
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='tidak ada'>
  <label class='form-check-label' for='strukturorganisasi'>
    tidak ada
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='luluss2s3' class='col-sm-2 control-label'>luluss2s3</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luluss2s3' name='luluss2s3'>
  </div>
</div>
                

<div class='form-group'>
  <label for='luluss1' class='col-sm-2 control-label'>luluss1</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luluss1' name='luluss1'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lulusd3' class='col-sm-2 control-label'>lulusd3</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulusd3' name='lulusd3'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lulussma' class='col-sm-2 control-label'>lulussma</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulussma' name='lulussma'>
  </div>
</div>
                

<div class='form-group'>
  <label for='lulussmp' class='col-sm-2 control-label'>lulussmp</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulussmp' name='lulussmp'>
  </div>
</div>
                

<div class='form-group'>
  <label for='total' class='col-sm-2 control-label'>total</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='total' name='total'>
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
        $this->db->from('instansi');
        $this->db->where('instansiid', $id);
        $query = $this->db->get();
        $this->load->model("mkabupatenkota");
        $r_kabupatenkotaid = $this->mkabupatenkota->selectoption();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='namainstansi' class='col-sm-2 control-label'>namainstansi</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='namainstansi' name='namainstansi' value='$row->namainstansi'>
  </div>
</div>
 ".$r_kabupatenkotaid." 
<div class='form-group'>
  <label for='pegawaitetap' class='col-sm-2 control-label'>pegawaitetap</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='pegawaitetap' name='pegawaitetap' value='$row->pegawaitetap'>
  </div>
</div>

<div class='form-group'>
  <label for='pegawaikontrak' class='col-sm-2 control-label'>pegawaikontrak</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='pegawaikontrak' name='pegawaikontrak' value='$row->pegawaikontrak'>
  </div>
</div>
<div class='form-group'><label for='strukturorganisasi' class='col-sm-2 control-label'>strukturorganisasi</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='ada dan terlampir' ".($row->strukturorganisasi=='ada dan terlampir'?'checked':'').">
  <label class='form-check-label' for='strukturorganisasi'>
    ada dan terlampir
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='ada tetapi tidak terlampir' ".($row->strukturorganisasi=='ada tetapi tidak terlampir'?'checked':'').">
  <label class='form-check-label' for='strukturorganisasi'>
    ada tetapi tidak terlampir
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='strukturorganisasi' id='strukturorganisasi' value='tidak ada' ".($row->strukturorganisasi=='tidak ada'?'checked':'').">
  <label class='form-check-label' for='strukturorganisasi'>
    tidak ada
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='luluss2s3' class='col-sm-2 control-label'>luluss2s3</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luluss2s3' name='luluss2s3' value='$row->luluss2s3'>
  </div>
</div>

<div class='form-group'>
  <label for='luluss1' class='col-sm-2 control-label'>luluss1</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='luluss1' name='luluss1' value='$row->luluss1'>
  </div>
</div>

<div class='form-group'>
  <label for='lulusd3' class='col-sm-2 control-label'>lulusd3</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulusd3' name='lulusd3' value='$row->lulusd3'>
  </div>
</div>

<div class='form-group'>
  <label for='lulussma' class='col-sm-2 control-label'>lulussma</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulussma' name='lulussma' value='$row->lulussma'>
  </div>
</div>

<div class='form-group'>
  <label for='lulussmp' class='col-sm-2 control-label'>lulussmp</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='lulussmp' name='lulussmp' value='$row->lulussmp'>
  </div>
</div>

<div class='form-group'>
  <label for='total' class='col-sm-2 control-label'>total</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='total' name='total' value='$row->total'>
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
        $this->db->where('instansiid', $id);
        $this->db->update('instansi', $data);
    }

    public function count(){
        return $this->db->count_all_results('instansi'); 
    }

    public function selectoption($filter=""){
        $this->db->select('instansiid,instansiname');
        $this->db->from('instansi');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_instansiid' class='col-sm-2 control-label'>instansi</label>
    <div class='col-sm-10'>
      <select id='r_instansiid' class='form-control' name='r_instansiid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->instansiid."'>".$row->instansiname."</option>";
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