<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class msqltochart extends CI_Model {


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('sqltochart');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>sqltochartid</th><th>sqltochartname</th><th>sqltochartquery</th><th>sqltochartxlabel</th><th>sqltochartylabel</th><th>sqltocharttype</th><th>sqltochartremarks</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->sqltochartid."</td>"."<td>".$row->sqltochartname."</td>"."<td>".$row->sqltochartquery."</td>"."<td>".$row->sqltochartxlabel."</td>"."<td>".$row->sqltochartylabel."</td>"."<td>".$row->sqltocharttype."</td>"."<td>".$row->sqltochartremarks."</td>"."<td><a class='btn' href=\"//".base_url()."sqltochart\\edit\\".$row->sqltochartid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."sqltochart\\delete\\".$row->sqltochartid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->sqltochartid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('sqltochartid', $id);
        $this->db->delete('sqltochart');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('sqltochart');
        $this->db->where('sqltochartid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('sqltochart');
    }
    public function createview($action){

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='sqltochartname' class='col-sm-2 control-label'>sqltochartname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartname' name='sqltochartname'>
  </div>
</div>
                

<div class='form-group'>
  <label for='sqltochartquery' class='col-sm-2 control-label'>sqltochartquery</label>
  <div class='col-sm-10'>
<textarea class='form-control' rows='3' id='sqltochartquery' name='sqltochartquery'></textarea>
  </div>
</div>
                

<div class='form-group'>
  <label for='sqltochartxlabel' class='col-sm-2 control-label'>sqltochartxlabel</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartxlabel' name='sqltochartxlabel'>
  </div>
</div>
                

<div class='form-group'>
  <label for='sqltochartylabel' class='col-sm-2 control-label'>sqltochartylabel</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartylabel' name='sqltochartylabel'>
  </div>
</div>
                
<div class='form-group'><label for='sqltocharttype' class='col-sm-2 control-label'>sqltocharttype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='line'>
  <label class='form-check-label' for='sqltocharttype'>
    line
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='spline'>
  <label class='form-check-label' for='sqltocharttype'>
    spline
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='area'>
  <label class='form-check-label' for='sqltocharttype'>
    area
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='areaspline'>
  <label class='form-check-label' for='sqltocharttype'>
    areaspline
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='column'>
  <label class='form-check-label' for='sqltocharttype'>
    column
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='bar'>
  <label class='form-check-label' for='sqltocharttype'>
    bar
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='pie'>
  <label class='form-check-label' for='sqltocharttype'>
    pie
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='scatter'>
  <label class='form-check-label' for='sqltocharttype'>
    scatter
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='gauge'>
  <label class='form-check-label' for='sqltocharttype'>
    gauge
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='arearange'>
  <label class='form-check-label' for='sqltocharttype'>
    arearange
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='areasplinerange'>
  <label class='form-check-label' for='sqltocharttype'>
    areasplinerange
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='columnrange'>
  <label class='form-check-label' for='sqltocharttype'>
    columnrange
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='sqltochartremarks' class='col-sm-2 control-label'>sqltochartremarks</label>
  <div class='col-sm-10'>
<textarea class='form-control' rows='3' id='sqltochartremarks' name='sqltochartremarks'></textarea>
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
        $this->db->from('sqltochart');
        $this->db->where('sqltochartid', $id);
        $query = $this->db->get();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='sqltochartname' class='col-sm-2 control-label'>sqltochartname</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartname' name='sqltochartname' value='$row->sqltochartname'>
  </div>
</div>

<div class='form-group'>
  <label for='sqltochartquery' class='col-sm-2 control-label'>sqltochartquery</label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='3' id='sqltochartquery' name='sqltochartquery'>$row->sqltochartquery</textarea>
  </div>
</div>

<div class='form-group'>
  <label for='sqltochartxlabel' class='col-sm-2 control-label'>sqltochartxlabel</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartxlabel' name='sqltochartxlabel' value='$row->sqltochartxlabel'>
  </div>
</div>

<div class='form-group'>
  <label for='sqltochartylabel' class='col-sm-2 control-label'>sqltochartylabel</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltochartylabel' name='sqltochartylabel' value='$row->sqltochartylabel'>
  </div>
</div>
<div class='form-group'><label for='sqltocharttype' class='col-sm-2 control-label'>sqltocharttype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='line' ".($row->sqltocharttype=='line'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    line
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='spline' ".($row->sqltocharttype=='spline'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    spline
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='area' ".($row->sqltocharttype=='area'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    area
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='areaspline' ".($row->sqltocharttype=='areaspline'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    areaspline
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='column' ".($row->sqltocharttype=='column'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    column
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='bar' ".($row->sqltocharttype=='bar'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    bar
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='pie' ".($row->sqltocharttype=='pie'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    pie
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='scatter' ".($row->sqltocharttype=='scatter'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    scatter
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='gauge' ".($row->sqltocharttype=='gauge'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    gauge
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='arearange' ".($row->sqltocharttype=='arearange'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    arearange
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='areasplinerange' ".($row->sqltocharttype=='areasplinerange'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    areasplinerange
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltocharttype' id='sqltocharttype' value='columnrange' ".($row->sqltocharttype=='columnrange'?'checked':'').">
  <label class='form-check-label' for='sqltocharttype'>
    columnrange
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='sqltochartremarks' class='col-sm-2 control-label'>sqltochartremarks</label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='3' id='sqltochartremarks' name='sqltochartremarks'>$row->sqltochartremarks</textarea>
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
        $this->db->where('sqltochartid', $id);
        $this->db->update('sqltochart', $data);
    }

    public function count(){
        return $this->db->count_all_results('sqltochart'); 
    }

    public function selectoption($filter=""){
        $this->db->select('sqltochartid,sqltochartname');
        $this->db->from('sqltochart');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_sqltochartid' class='col-sm-2 control-label'>sqltochart</label>
    <div class='col-sm-10'>
      <select id='r_sqltochartid' class='form-control' name='r_sqltochartid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->sqltochartid."'>".$row->sqltochartname."</option>";
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