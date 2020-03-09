<?php
class Cancerlist_model extends CI_Model {
		public function __construct()
        {
              //Autoload is being used to create the db connection
		}
		
		public function get_cancerlist(){
			
			$sql = "SELECT * from cancerlist ";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
			
		}
		
		public function updatename($namechange){
			$sql = "UPDATE cancerlist SET label = '".$namechange["label"]."'
					WHERE id = '".$namechange["c_id"]."' ";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			if(!$success){return false;}
			return $success;
		}
		
		public function add_new($cancertype){
			$sql = "SELECT * from cancerlist
					WHERE cancer = '".$cancertype["cancer"]."'";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){ 
				return "This cancer connection code string already exists.  Please use another connection code.";
			}
			
			$this->db->insert('cancerlist', $cancertype);
			return "success";
		}
		
		public function add_symptom($symptom){
			$cancer_id = $symptom["cancer_id"];
			$symptom_id = $symptom["symptom_id"];
			//get the cancer code string
			$sql = "SELECT * from cancerlist WHERE id = '".$cancer_id."'";
			$query = $this->db->query($sql);
			$cancer = '';
			if($query->num_rows() > 0){ 
				$result = $query->result_array();
				$cancer = $result[0]["cancer"];
				$label = $result[0]["label"];
			}else{ return "This cancer type was not found in the database."; }
			
			$symptom["cancertype"] = $cancer;
			//check for existing symptom
			$sql = "SELECT * from cancer_symptoms 
					WHERE cancer_id = '".$cancer_id."'
					AND symptom_id = '".$symptom_id."'";
			$query = $this->db->query($sql);
			if($query->num_rows() < 1){ 
				$this->db->insert('cancer_symptoms', Array(	"cancer_id"		=>	$cancer_id,
															"cancer_type"	=>	$cancer,
															"symptom_id"	=>	$symptom_id));
			}else{ return "This symptom is already assigned to ".$label."."; }
			
			return "success";
		}
		
		public function remove_symptom($symptom){
			$cancer_id = $symptom["cancer_id"];
			$symptom_id = $symptom["symptom_id"];
			$sql = "DELETE from cancer_symptoms 
					WHERE cancer_id = '".$cancer_id."'
					AND symptom_id = '".$symptom_id."'";
			$query = $this->db->query($sql);
			
			return "success";
		}
		
  }
 
?>