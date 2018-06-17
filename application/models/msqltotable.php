<?php
/*PHP_CLASS_GENERATOR
*MODEL
*GENERATE ON 2018-06-17 07:16:24
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class msqltotable extends CI_Model {


    public function select($arrfilter,$url=""){
        $this->db->select('*');
        $this->db->from('sqltotable');
        //check array filter not null
        foreach($arrfilter as $name => $value){
            if($value !='' && $value !='0'){
                $this->db->like($name, $value);
            }
        }

        $query = $this->db->get();
        $table ="<table class='table table-striped table-bordered table-hover'>";
        $table .=" <tr><th>sqltotableid</th><th>sqltotablename</th><th>sqltotablequery</th><th>sqltotabletype</th><th>sqltotableremark</th><th>Action</th></tr>";
        foreach ($query->result() as $row)
        {
            $table .= "<tr>"."<td>".$row->sqltotableid."</td>"."<td>".$row->sqltotablename."</td>"."<td>".$row->sqltotablequery."</td>"."<td>".$row->sqltotabletype."</td>"."<td>".$row->sqltotableremark."</td>"."<td><a class='btn' href=\"//".base_url()."sqltotable\\edit\\".$row->sqltotableid."\">Edit</a> | <a class='btn btn-dangger' href=\"//".base_url()."sqltotable\\delete\\".$row->sqltotableid."\">Delete</a>".($url!=''?" | <a class='btn btn-dangger'  href='//".base_url()."$url/".$row->sqltotableid."'>Detail</a>":'')."</td></tr>";
        }
        $table .="</table>";
        return $table;
    }

    public function delete($id){
        $this->db->where('sqltotableid', $id);
        $this->db->delete('sqltotable');
    }

    public function single($id){
        $this->db->select('*');
        $this->db->from('sqltotable');
        $this->db->where('sqltotableid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function create($array){
    
        $this->db->set($array);
        $this->db->insert('sqltotable');
    }
    public function createview($action){

        
        $form = "
        <form  enctype='multipart/form-data' class='form-horizontal' method='post' action='$action'>
            
<div class='form-group'>
  <label for='sqltotablename' class='col-sm-2 control-label'>sqltotablename</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltotablename' name='sqltotablename'>
  </div>
</div>
                

<div class='form-group'>
  <label for='sqltotablequery' class='col-sm-2 control-label'>sqltotablequery</label>
  <div class='col-sm-10'>
<textarea class='form-control' rows='3' id='sqltotablequery' name='sqltotablequery'></textarea>
  </div>
</div>
                
<div class='form-group'><label for='sqltotabletype' class='col-sm-2 control-label'>sqltotabletype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltotabletype' id='sqltotabletype' value='Normal'>
  <label class='form-check-label' for='sqltotabletype'>
    Normal
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltotabletype' id='sqltotabletype' value='Number'>
  <label class='form-check-label' for='sqltotabletype'>
    Number
  </label>
</div>
</div></div>

<div class='form-group'>
  <label for='sqltotableremark' class='col-sm-2 control-label'>sqltotableremark</label>
  <div class='col-sm-10'>
<textarea class='form-control' rows='3' id='sqltotableremark' name='sqltotableremark'></textarea>
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
        $this->db->from('sqltotable');
        $this->db->where('sqltotableid', $id);
        $query = $this->db->get();

        $form ="  <form  enctype='multipart/form-data' method='post' action='$action'>";
        foreach ($query->result() as $row){
            $form.=" 
<div class='form-group'>
  <label for='sqltotablename' class='col-sm-2 control-label'>sqltotablename</label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='sqltotablename' name='sqltotablename' value='$row->sqltotablename'>
  </div>
</div>

<div class='form-group'>
  <label for='sqltotablequery' class='col-sm-2 control-label'>sqltotablequery</label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='3' id='sqltotablequery' name='sqltotablequery'>$row->sqltotablequery</textarea>
  </div>
</div>
<div class='form-group'><label for='sqltotabletype' class='col-sm-2 control-label'>sqltotabletype</label><div class='col-sm-10'> 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltotabletype' id='sqltotabletype' value='Normal' ".($row->sqltotabletype=='Normal'?'checked':'').">
  <label class='form-check-label' for='sqltotabletype'>
    Normal
  </label>
</div>
 
<div class='form-check'>
  <input class='form-check-input' type='radio' name='sqltotabletype' id='sqltotabletype' value='Number' ".($row->sqltotabletype=='Number'?'checked':'').">
  <label class='form-check-label' for='sqltotabletype'>
    Number
  </label>
</div>
</div></div>
<div class='form-group'>
  <label for='sqltotableremark' class='col-sm-2 control-label'>sqltotableremark</label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='3' id='sqltotableremark' name='sqltotableremark'>$row->sqltotableremark</textarea>
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
        $this->db->where('sqltotableid', $id);
        $this->db->update('sqltotable', $data);
    }

    public function count(){
        return $this->db->count_all_results('sqltotable'); 
    }

    public function selectoption($filter=""){
        $this->db->select('sqltotableid,sqltotablename');
        $this->db->from('sqltotable');
        $query = $this->db->get();
        $form = "<div class='form-group'>
    <label for='r_sqltotableid' class='col-sm-2 control-label'>sqltotable</label>
    <div class='col-sm-10'>
      <select id='r_sqltotableid' class='form-control' name='r_sqltotableid' >";
        foreach ($query->result() as $row){
            $form.="<option value='".$row->sqltotableid."'>".$row->sqltotablename."</option>";
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