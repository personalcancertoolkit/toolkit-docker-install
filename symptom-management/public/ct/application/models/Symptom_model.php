<?php
class Symptom_model extends CI_Model {
		public function __construct()
        {
              //Autoload is being used to create the db connection
		}
		
		public function get_all_symptoms(){
			
			$sql = "SELECT cancer_symptoms.symptom_id, sort_name, display_name from cancer_symptoms, symptoms
					WHERE cancer_id = '1'
					AND cancer_symptoms.symptom_id = symptoms.id
					ORDER BY sort_name";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
			
		}
		
		public function get_symptoms_by_cancer_id($cancer_id){
			
			$sql = "SELECT cancer_symptoms.symptom_id, sort_name, display_name from cancer_symptoms, symptoms
					WHERE cancer_id = '".$cancer_id."'
					AND cancer_symptoms.symptom_id = symptoms.id
					ORDER BY sort_name";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return $result;
			
		}
		
		
		public function get_symptom_by_symptom_id($symptom_id){
			$symptom = Array(	"id"				=>	$symptom_id,
								"symptom_id"		=>	'',
								"display_name"		=>	'',
								"sort_name"			=>	'',
								"label_001"			=>	'',
								"basic_title001"	=>	'',
								"basic_what001"		=>	'',
								"basic_when001"		=>	'',
								"basic_cause001"	=>	'',
								"label_001manage"	=>	'',
								"manage_001"		=>	'',
								"tc0"				=>	'',
								"tc1"				=>	'',
								"tc2"				=>	'',
								"tc3"				=>	'',
								"manage_mild"		=>	'',
								"manage_mod"		=>	'',
								"manage_severe"		=>	'',
								"label_001talk"		=>	'',
								"talk_001"			=>	'',
								"question_001"		=>	'',
								"label_001info"		=>	'',
								"info_001"			=>	'',
								"label_002"			=>	'',
								"report_title"		=>	'',
								"report_tc0"		=>	'',
								"report_tc1"		=>	'',
								"report_tc2"		=>	'',
								"report_tc3"		=>	'',
								"label_003"			=>	'',
								"basic_003"			=>	'',
								"label_003manage"	=>	'',
								"label_003talk"		=>	'',
								"label_003info"		=>	''									
								);
			$sql = "SELECT * from symptoms WHERE id = '".$symptom_id."' ";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if($query->num_rows() > 0){
				$symptom["symptom_id"] = $result[0]["symptom_id"];
				$symptom["display_name"] = $result[0]["display_name"];
				$symptom["sort_name"] = $result[0]["sort_name"];
			}else{
				return false;
			}
			$seq = $symptom["symptom_id"];
			$sql = "SELECT * from screenlist WHERE seq LIKE '_003_00_".$seq."%' ";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			if ($success){
				foreach($result as $row){
					switch($row["seq"]){
						case "_003_001".$seq		: $symptom["label_001"] 		= $row["s_name"];break;
						case "_003_001".$seq."_100"	: $symptom["label_001manage"] 	= $row["s_name"];break;
						case "_003_001".$seq."_200"	: $symptom["label_001talk"] 	= $row["s_name"];break;
						case "_003_001".$seq."_300"	: $symptom["label_001info"] 	= $row["s_name"];break;
						case "_003_002".$seq		: $symptom["label_002"] 		= $row["s_name"];break;
						case "_003_003".$seq		: $symptom["label_003"] 		= $row["s_name"];break;
						case "_003_003".$seq."_100"	: $symptom["label_003manage"] 	= $row["s_name"];break;
						case "_003_003".$seq."_200"	: $symptom["label_003talk"] 	= $row["s_name"];break;
						case "_003_003".$seq."_300"	: $symptom["label_003info"] 	= $row["s_name"];break;
					}//switch
				}//foreach
			}else{
				return $symptom;
			}//if success
			//get text markup
			$seq_id = "000"; //placeholder for seq without underscore.
			$seq_array = explode("_",$seq);
			if(count($seq_array) > 1){ $seq_id = $seq_array[1]; }
			$html_id = "100300_".$seq_id."%";
			$sql = "SELECT * from texthtml WHERE html_id LIKE '".$html_id."' ";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			if ($success){
				$seq = $symptom["symptom_id"];
				foreach($result as $row){
					switch($row["html_id"]){
						case "1003001".$seq_id."001": 	$symptom["basic_title001"] 	= addslashes($row["html"]);break;
						case "1003001".$seq_id."001001":$symptom["basic_what001"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."001002":$symptom["basic_when001"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."001003":$symptom["basic_cause001"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."100000":$symptom["manage_001"]		= addslashes($row["html"]);break;
						case "1003001".$seq_id."200001":$symptom["talk_001"]		= addslashes($row["html"]);break;
						case "1003001".$seq_id."200002":$symptom["question_001"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."300001":$symptom["info_001"]		= addslashes($row["html"]);break;
						case "1003002".$seq_id."04"	: 	$symptom["report_title"] 	= addslashes($row["html"]);break;
						//tc statements amd MILD/MOD/SEVERE
						case "1003001".$seq_id."100000000":$symptom["tc0"]			= addslashes($row["html"]);break;
						case "1003001".$seq_id."100000001":$symptom["tc1"]			= addslashes($row["html"]);break;
						case "1003001".$seq_id."100000002":$symptom["tc2"]			= addslashes($row["html"]);break;
						case "1003001".$seq_id."100000003":$symptom["tc3"]			= addslashes($row["html"]);break;
						case "1003001".$seq_id."100001000":$symptom["manage_noprob"]= addslashes($row["html"]);break;
						case "1003001".$seq_id."100001001":$symptom["manage_mild"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."100001002":$symptom["manage_mod"]	= addslashes($row["html"]);break;
						case "1003001".$seq_id."100001003":$symptom["manage_severe"]= addslashes($row["html"]);break;
					}//switch
				}//foreach
				//get report_tc's from answers table
				$sql = "SELECT * FROM answer WHERE id LIKE '1003002".$seq_id."__'";
				$query = $this->db->query($sql);
				$result = $query->result_array();
				$error = $this->db->error();
				$success = ($error["code"] == 0);
				if ($success){
					$counter = 0;
					foreach($result as $row){
						$symptom["report_tc".$counter] = addslashes($row["a_text"]);
						$counter ++;
					}
				}
			}else{
				return $symptom;
			}
			return $symptom;
		}
		
		public function updatename($namechange){
			//get the symptom record
			$symptom_code = '_xxx'; //initialize with a code that can't work;
			$symptom_id = '0';
			$label = $namechange["label"];
			$sort_name = $namechange["sort_name"];
			$s_id = $namechange["s_id"];
			$sql = "SELECT * from symptoms WHERE id = '".$s_id."' ";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			if(! $success){ return false; }
			
			$result = $query->result_array();
			if($query->num_rows() > 0){ 
				$symptom_code = $result[0]["symptom_id"]; 
				$symptom_index = $result[0]["id"]; 
			}
			switch (strlen($symptom_id)){
				case '1': $symptom_index = '00'.$symptom_index; break;
				case '2': $symptom_index = '0'.$symptom_index; break;
			}//switch
			
			
			$sql = "UPDATE symptoms SET display_name = '".$label."', sort_name = '".$sort_name."'
					WHERE id = '".$s_id."' ";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			if(! $success){ return false; }
			//update screenlist _001/000 labels   -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_001'.$symptom_code, $label, '1003001000');
			if(! $success){ return false; }
			//update screenlist _001/001 Manage labels   -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_001'.$symptom_code.'_100', 'Managing Your '.$label, '1003001001');
			if(! $success){ return false; }
			//update screenlist _001/002 Talking About labels   -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_001'.$symptom_code.'_200', 'Talking About Your '.$label, '1003001002');
			if(! $success){ return false; }
			//update screenlist _001/003 More Information labels  -- seq, s_name, displaylist_id
				//there is no update for _001/003 becuse its label does not contain the symptom name
			//update screenlist _002 labels  -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_002'.$symptom_code, $label, '1003002'.$symptom_index);
			if(! $success){ return false; }
			//update screenlist _003/000 labels   -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_003'.$symptom_code, $label, '1003001000');
			if(! $success){ return false; }
			//update screenlist _003/001 Manage labels   -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_003'.$symptom_code.'_100', 'Managing Your '.$label, '1003001001');
			if(! $success){ return false; }
			//update screenlist _003/002 Talking About labels  -- seq, s_name, displaylist_id
			$success = $this->write_screenlist('_003_003'.$symptom_code.'_200', 'Talking About Your '.$label, '1003001002');
			if(! $success){ return false; }	
			//update screenlist _003/003 More Information labels  -- seq, s_name, displaylist_id
				//there is no update for _001/003 becuse its label does not contain the symptom name	

			
			//More question q_text, metadata must be updated
			//htmllist, starting at 100300100304  -- 2 series  ??maybe - are these being used??
			//texthtml, starting at 100300100304  -- 2 series + html docs for basic, etc., what is, How can I.... ??maybe - are these being used??
			//texthtml toxicity criteria
			//texthtml MILD/MOD/SEVERE
			
			
			
			if(!$success){return false;}
			return $success;
		}//end updatename function
		
		public function updatesymptom($symptom){
			$seq = $symptom["symptom_id"];
			$seq_id = "000"; //placeholder for seq without underscore.
			$seq_array = explode("_",$seq);
			if(count($seq_array) > 1){ $seq_id = $seq_array[1]; }
			foreach($symptom as $key=>$value){
			$id = "0";
			switch($key){
			case "label_001"		: $id = "1003001".$seq_id			;$seq = "_003_001".$seq				;$html = $value; break;
			case "basic_title001"	: $id = "1003001".$seq_id."001"		;$seq = "_003_001".$seq."_001"		;$html = $value; break;
			case "basic_what001"	: $id = "1003001".$seq_id."001001"	;$seq = "_003_001".$seq."_001_001"	;$html = $value; break;
			case "basic_when001"	: $id = "1003001".$seq_id."001002"	;$seq = "_003_001".$seq."_001_002"	;$html = $value; break;
			case "basic_cause001"	: $id = "1003001".$seq_id."001003"	;$seq = "_003_001".$seq."_001_003"	;$html = $value; break;
			case "label_001manage"	: $id = "1003001".$seq_id."100"		;$seq = "_003_001".$seq."_001"		;$html = $value; break;
			case "manage_001"		: $id = "1003001".$seq_id."100000"	;$seq = "_003_001".$seq."_001_000"	;$html = $value; break;
			case "label_001talk"	: $id = "1003001".$seq_id."200"		;$seq = "_003_001".$seq."_200"		;$html = $value; break;
			case "talk_001"			: $id = "1003001".$seq_id."200001"	;$seq = "_003_001".$seq."_200_001"	;$html = $value; break;
			case "question_001"		: $id = "1003001".$seq_id."200002"	;$seq = "_003_001".$seq."_200_002"	;$html = $value; break;
			case "label_001info"	: $id = "1003001".$seq_id."300"		;$seq = "_003_001".$seq."_300"		;$html = $value; break;
			case "info_001"			: $id = "1003001".$seq_id."300001"	;$seq = "_003_001".$seq."_300_001"	;$html = $value; break;
			case "label_002"		: $id = "1003002".$seq_id			;$seq = "_003_002".$seq				;$html = $value; break;
			case "report_title"		: $id = "1003002".$seq_id."04"		;$seq = "_003_002".$seq."_04"		;$html = $value; break;
			case "label_003"		: $id = "1003003".$seq_id			;$seq = "_003_003".$seq				;$html = $value; break;
			case "label_003manage"	: $id = "1003003".$seq_id."100"		;$seq = "_003_003".$seq."_100"		;$html = $value; break;
			case "label_003talk"	: $id = "1003003".$seq_id."200"		;$seq = "_003_003".$seq."_200"		;$html = $value; break;
			case "label_003info"	: $id = "1003003".$seq_id."300"		;$seq = "_003_003".$seq."_300"		;$html = $value; break;
			//tc items
			case "tc0"				: $id = "1003001".$seq_id."100000000";$seq = ''							;$html = $value; break;
			case "tc1"				: $id = "1003001".$seq_id."100000001";$seq = ''							;$html = $value; break;
			case "tc2"				: $id = "1003001".$seq_id."100000002";$seq = ''							;$html = $value; break;
			case "tc3"				: $id = "1003001".$seq_id."100000003";$seq = ''							;$html = $value; break;
			//manage items
			case "manage_mild"		: $id = "1003001".$seq_id."100001001";$seq = ''							;$html = $value; break;
			case "manage_mod"		: $id = "1003001".$seq_id."100001002";$seq = ''							;$html = $value; break;
			case "manage_severe"	: $id = "1003001".$seq_id."100001003";$seq = ''							;$html = $value; break;
			}//switch
				//do queries here
				//do screenlist.s_name queries
			switch($key){
				case "label_001"		:
				case "label_001manage"	:
				case "label_001talk"	:
				case "label_001info"	:
				case "label_003"		:
				case "label_003manage"	:
				case "label_003talk"	:
				case "label_003info"	:
				$this->write_screenlist($seq, $html, ''); break;
			}//switch
				//do texthtml.html queries
			switch($key){
				case "basic_title001"	:
				case "basic_what001"	:
				case "basic_when001"	:
				case "basic_cause001"	:
				case "manage_001"		:
				case "manage_mild"		:
				case "manage_mod"		:
				case "manage_severe"	:
				case "talk_001"			:
				case "question_001"		:
				case "info_001"			:
				case "report_title"		: $this->write_texthtml( $id, '', $html); break;
//				//tc items
				case "tc0"	:
					$html = $this->process_tc_items($html);
					$html = '<div id="tc0" onclick="$(\'#tcrb0\').attr(\'checked\',\'checked\');report(\'0\',\'TC_NoTrouble '.$symptom["symptom_name"].'\');"><input id="tcrb0" type="radio" name="tc" value="0"/>'.$html.'</div>';$this->write_texthtml( $id, $symptom["symptom_name"].' No Trouble', $html );
					break;
				case "tc1"	:
					$html = $this->process_tc_items($html);
					$html = '<div id="tc1" onclick="$(\'#tcrb1\').attr(\'checked\',\'checked\');set_symptom_tab(\'mild_tab\',\'tab_item_mild\');report(\'2\',\'TC_Mild '.$symptom["symptom_name"].'\');"><input id="tcrb1" type="radio" name="tc" value="1">'.$html.'</div>';$this->write_texthtml( $id, $symptom["symptom_name"].' TC1', $html );
					break;
				case "tc2"	:
					$html = $this->process_tc_items($html);
					$html = '<div id="tc2" onclick="$(\'#tcrb2\').attr(\'checked\',\'checked\');set_symptom_tab(\'moderate_tab\',\'tab_item_moderate\');report(\'5\',\'TC_Moderate '.$symptom["symptom_name"].'\');"><input id="tcrb2" type="radio" name="tc" value="2">'.$html.'</div>';$this->write_texthtml( $id, $symptom["symptom_name"].' TC2', $html);
				break;
				case "tc3"	:
					$html = $this->process_tc_items($html);
					$html = '<div id="tc3" onclick="$(\'#tcrb3\').attr(\'checked\',\'checked\');set_symptom_tab(\'severe_tab\',\'tab_item_severe\');report(\'8\',\'TC_Severe '.$symptom["symptom_name"].'\');"><input id="tcrb3" type="radio" name="tc" value="3">'.$html.'</div>';$this->write_texthtml( $id, $symptom["symptom_name"].' TC3', $html);
				break;
			}//switch
		}//foreach
		return true;
	}//end updatesymptom
	
	public function process_tc_items($html){
		$tc_array = explode('<label>',$html); //get rid of extraneous markup
		if(count($tc_array)>1){ $tc = $tc_array[1]; } //get the text that follows <label>
		$tc_array = explode('</label>',$tc); //handle the trailing tags starting with </label>
		if(count($tc_array)>0){ $html = '<label>'.$tc_array[0].'</label>'; } //restore the <label> tags
		//trigger_error($html);
		return $html;
	}
	
//	public function create_symptom(){
//	  $symptom_id = 0;
//	  
//	  $symptom = Array(	"id"				=>	$symptom_id,
//								"symptom_id"		=>	'',
//								"display_name"		=>	'',
//								"sort_name"			=>	'',
//								"label_001"			=>	'',
//								"basic_title001"	=>	'',
//								"basic_what001"		=>	'',
//								"basic_when001"		=>	'',
//								"basic_cause001"	=>	'',
//								"label_001manage"	=>	'',
//								"manage_001"		=>	'',
//								"label_001talk"		=>	'',
//								"talk_001"			=>	'',
//								"question_001"		=>	'',
//								"label_001info"		=>	'',
//								"info_001"			=>	'',
//								"label_002"			=>	'',
//								"report_title"		=>	'',
//								"label_003"			=>	'',
//								"basic_003"			=>	'',
//								"label_003manage"	=>	'',
//								"label_003talk"		=>	'',
//								"label_003info"		=>	''									
//								);
//								
//	  return $symptom;
//  	}
	
	public function symptom_setup($symptom_name){
		$display_name = $symptom_name["display_name"];
		$sort_name = strtolower($symptom_name["sort_name"]); //remove caps
		$sort_name = str_replace(' ', '', $sort_name); //remove spaces
		$failure_message = "There was a problem with the database.  The Symptom was not created.";
		$data = Array(	"status"		=>	'failed',
						"id"			=>	0,
						"symptom_id"	=>	'',
						"display_name"	=>	$display_name,
						"sort_name"	=>	$sort_name,
						"message"		=>	'');
		
		$sql = "SELECT * from symptoms WHERE sort_name = '".$sort_name."' ";
		$query = $this->db->query($sql);	
		if($query->num_rows() > 0){
			$data["message"] = "This symptom sort name already exists.  Please choose a different sort name.";
			return $data;
		}
		
		$sql = "INSERT into symptoms (`id`,`symptom_id`,`sort_name`,`display_name`)
				VALUES(NULL,'_000', ".$this->db->escape($sort_name).", ".$this->db->escape($display_name).")";
		$query = $this->db->query($sql);
		$error = $this->db->error();
		$success = ($error["code"] == 0);
		if(! $success){$data["message"] = $failure_message; return $data; }
		$id = $this->db->insert_id();
		$symptom_code = $id.'';  //convert the id to a string
		switch (strlen($symptom_code)){
			case 1: $symptom_code = '_00'.$symptom_code;break;
			case 2: $symptom_code = '_0'.$symptom_code;break;
			default: $symptom_code = '_'.$symptom_code;break;
		}//switch
		$symptom_index = $id.'';//convert to string
		switch (strlen($symptom_index)){
			case 1: $symptom_index = '00'.$symptom_index;break;
			case 2: $symptom_index = '0'.$symptom_index;break;
		}//switch
		
		$sql = "UPDATE symptoms set symptom_id = '".$symptom_code."' WHERE id = '".$id."'";
		$query = $this->db->query($sql);
		$error = $this->db->error();
		$success = ($error["code"] == 0);
		if(! $success){$data["message"] = $failure_message; return $data; }
		//add to cancer_symptoms
		$sql = "INSERT INTO `cancer_symptoms` (`id`, `cancer_id`, `cancer_type`, `symptom_id`) VALUES (NULL, '1', 'all','".$id."')";
		$query = $this->db->query($sql);
		$error = $this->db->error();
		$success = ($error["code"] == 0);
		if(! $success){$data["message"] = $failure_message; return $data; }
		
		//screenlist 001/000
		$success = $this->write_screenlist('_003_001'.$symptom_code, $display_name, '1003001000');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//write the first texthtml field : '1003001xxx001'
		$success = $this->write_texthtml('1003001'.$symptom_index.'001', $display_name.': Basic Information','<h1>'.$display_name.': Basic Information</h1>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _001/001 Manage labels   -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_001'.$symptom_code.'_100', 'Managing Your '.$display_name, '1003001001');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//write the first "manage" text field
		$success = $this->write_texthtml("1003001".$symptom_index."100000", $display_name.' TC Instructions','<p><span class="\&quot;item_title\&quot;">What can I do about my '.strtolower($display_name).'?</span></p><p>First, how bad is your '.strtolower($display_name).'? Read these statements and click on the ONE that best describes your '.strtolower($display_name).' today:</p>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//TC0
		$success = $this->write_texthtml("1003001".$symptom_index."100000000", $display_name.' No Problems','<div id="tc0" onclick="$(\'#tcrb0\').attr(\'checked\',\'checked\');report(\'0\',\'TC_NoTrouble '.$display_name.'\');"><input id="tcrb0" type="radio" name="tc" value="0"/><label> I don\'t have '.strtolower($display_name).' problems.</label></div>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//TC1
		$success = $this->write_texthtml("1003001".$symptom_index."100000001", $display_name.' TC1','<div id="tc1" onclick="$(\'#tcrb1\').attr(\'checked\',\'checked\');set_symptom_tab(\'mild_tab\',\'tab_item_mild\');report(\'2\',\'TC_Mild '.$display_name.'\');"><input id="tcrb1" type="radio" name="tc" value="1"><label> I sometimes have trouble with '.strtolower($display_name).', but it doesn\'t keep me from doing my normal activities.</label></div>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//TC2
		$success = $this->write_texthtml("1003001".$symptom_index."100000002", $display_name.' TC2','<div id="tc2" onclick="$(\'#tcrb2\').attr(\'checked\',\'checked\');set_symptom_tab(\'moderate_tab\',\'tab_item_moderate\');report(\'5\',\'TC_Moderate '.$display_name.'\');"><input id="tcrb2" type="radio" name="tc" value="2"><label> I am having trouble with '.strtolower($display_name).', and it keeps me from doing some things, but I can do most of my normal activities.</label></div>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//TC3
		$success = $this->write_texthtml("1003001".$symptom_index."100000003", $display_name.' TC3','<div id="tc3" onclick="$(\'#tcrb3\').attr(\'checked\',\'checked\');set_symptom_tab(\'severe_tab\',\'tab_item_severe\');report(\'8\',\'TC_Severe '.$display_name.'\');"><input id="tcrb3" type="radio" name="tc" value="3"><label> I have a lot of trouble with '.strtolower($display_name).', and it\'s keeping me from doing many of my normal activities.</label></div>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		// manage_mild
		$success = $this->write_texthtml("1003001".$symptom_index."100001001", $display_name.' Manage MILD', '<p><b>Your '.strtolower($display_name).' is <span id="text_mild">MILD</span></b></p><p>Here are some management tips for you:</p><p>Useful activities:<br/></p>
	<ul>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
	</ul>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		// manage_mod
		$success = $this->write_texthtml("1003001".$symptom_index."100001002", $display_name.' Manage MODERATE', '<p><b>Your '.strtolower($display_name).' is <span id="text_moderate">MODERATE</span></b></p><p>Besides following the recommendations for MILD '.strtolower($display_name).', you should also consider these tips:</p><p>Useful activities:<br/></p>
	<ul>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
	</ul>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		// manage_severe
		$success = $this->write_texthtml("1003001".$symptom_index."100001003", $display_name.' Manage SEVERE', '<p><b>Your '.strtolower($display_name).' is <span id="text_severe">SEVERE</span></b></p>
<p>You are probably unable to manage your '.strtolower($display_name).' on your own. You should call your doctor and seek help.</p>
<p>Read about <a href="index.php?seq=_003_001_'.$symptom_index.'_200">how to talk to your doctor about your '.strtolower($display_name).'</a>.</p>');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		
		//update screenlist _001/002 Talking About labels   -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_001'.$symptom_code.'_200', 'Talking About Your '.$display_name, '1003001002');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _001/003 More Information labels  -- seq, s_name, displaylist_id
		// _001/003 must be created in this case
		$success = $this->write_screenlist('_003_001'.$symptom_code.'_300', 'More Information', '1003001003');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		
		//update screenlist _002 labels  -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_002'.$symptom_code, $display_name, '1003002'.$symptom_index);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//screenlist _002 -> displaylist for report
		$success = $this->write_displaylist('1003002'.$symptom_index, '100300200000', $display_name);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//reporting TC's -- quiz_list entry (relational table between quiz and question)
		$success = $this->write_quiz_list($symptom_index, $display_name);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//question entry for report view
		$success = $this->write_question($symptom_index, $display_name);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//answer_list entries (relational table between question and answer)
		$success = $this->write_answer_list_entries($symptom_index, $display_name);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//write report TC strings to answer table -- displayed on report UI
		$success = $this->write_answers($symptom_index, $display_name);
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _003/000 labels   -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_003'.$symptom_code, $display_name, '1003001000');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _003/001 Manage labels   -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_003'.$symptom_code.'_100', 'Managing Your '.$display_name, '1003001001');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _003/002 Talking About labels  -- seq, s_name, displaylist_id
		$success = $this->write_screenlist('_003_003'.$symptom_code.'_200', 'Talking About Your '.$display_name, '1003001002');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		//update screenlist _003/003 More Information labels  -- seq, s_name, displaylist_id
			//this one must be created here
		$success = $this->write_screenlist('_003_003'.$symptom_code.'_300', 'More Information', '1003001003');
		if(! $success){ $data["message"] = $failure_message; return $data; }
		
		
		$data["status"] = "success";
		$data["id"] = $id;
		$data["symptom_id"] = $symptom_code;		
		return $data;
	}
	
	public function write_screenlist($seq, $s_name, $d_list){
		//check for existing screenlist record
		$sql = "SELECT * from screenlist WHERE seq = '".$seq."'";
		$query = $this->db->query($sql);
		if($query->num_rows() < 1){
			//do insert here
			$id = '1';
			$seq_array = explode("_",$seq);
			foreach($seq_array as $s){ $id .= $s; }
			$sql = "INSERT INTO `screenlist` (`id`, `seq`, `s_name`, `s_type`, `deeplink`, `displaylist_id`) 
					VALUES ('".$id."', '".$seq."', ".$this->db->escape($s_name).", 'screen', '', '".$d_list."')";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;		
		}else{
			//do update here
			$sql = "UPDATE screenlist SET s_name = '".$s_name."'
					WHERE seq = '".$seq."' ";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}
	}//end write_screenlist
	
	public function write_displaylist($displaylist_id, $displayobj_id, $comment){
		$id = $displaylist_id.'04';
		//check for existing record
		$sql = "SELECT * from displaylist WHERE id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() < 1){
		//do insert here
			$sql = "INSERT INTO `displaylist` (`id`, `displaylist_id`, `displayobj_id`, `comment`) 
					VALUES ('".$id."', '".$displaylist_id."', '".$displayobj_id."', ".$this->db->escape($comment).")";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}else{
			//do update here
			$sql = "UPDATE displaylist SET `displaylist_id` = '".$displaylist_id."', `displayobj_id` = '".$displayobj_id."',  
					`comment` = ".$this->db->escape($comment)."
					WHERE `id` = '".$id."' ";		
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}
	} //end write displaylist
	
	public function write_texthtml($html_id, $text, $html){
		//$html = html_entity_decode($html);
		$sql = "SELECT * from texthtml WHERE html_id = '".$html_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() < 1){
			//do insert here
			$sql = "INSERT INTO `texthtml` (`html_id`, `text`, `html`) 
					VALUES ('".$html_id."', ".$this->db->escape($text).", ".$this->db->escape($html).")";	
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;		
		}else{
			//do update here
			
			$sql = "UPDATE texthtml SET `text` = ".$this->db->escape($text).", `html` = ".$this->db->escape($html)."
					WHERE `html_id` = '".$html_id."' ";
			//trigger_error($sql);		
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}
	} //end write_texthtml
	
	public function write_quiz_list($symptom_index, $display_name){
		$id = '1003002'.$symptom_index;
		$comment = 'Symptom report '.$display_name;
		//check for existing record
		$sql = "SELECT * from quiz_list WHERE id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() < 1){
		//do insert here
			$sql = "INSERT INTO `quiz_list` (`id`, `quiz_id`, `question_id`, `comment`) 
					VALUES ('".$id."', '1003002','".$id."', ".$this->db->escape($comment).")";	
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;		
		}else{
			//do update here
			$sql = "UPDATE quiz_list SET `quiz_id` = '1003002', question_id = '".$id."', comment = ".$this->db->escape($comment)."
					WHERE id = '".$id."' ";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}
	} //end write_quiz_list
	
	public function write_question($symptom_index, $display_name){
		$id = '1003002'.$symptom_index;
		$symptom_name = strtolower($display_name);
		$q_text = 'Please indicate, on a scale of 0 - 10, the severity of your '.$symptom_name.' symptoms during the past week.';
		//create the metadata string
		$metadata = '';
		$delimiter = '';
		$metadata_array = explode(' ', $symptom_name);
		foreach($metadata_array as $m){
			$metadata .= $delimiter.$m;
			$delimiter = '_';
		}
		//check for existing record
		$sql = "SELECT * from question WHERE id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() < 1){
			//do insert here
			$sql =  "INSERT INTO `question` (`id`, `qtext_id`, `q_text`, `a_list_id`, 
					`correct_key`, `correct_id`, `incorrect_id`, `info_id`, `mdata_type`, `metadata`, `comment`) 
					VALUES ('".$id."', '".$id."', ".$this->db->escape($q_text).", '".$id."', NULL, NULL, NULL, NULL, 'symptom_report', 
					".$this->db->escape($metadata).", ".$this->db->escape($symptom_name).")";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;		
		}else{
			//do update here
			$sql = "UPDATE question set `qtext_id` = '".$id."', `q_text` = ".$this->db->escape($q_text).", `a_list_id` = '".$id."',
					`mdata_type` = 'symptom_report', `metadata` = ".$this->db->escape($metadata).", `comment` = ".$this->db->escape($symptom_name)."
					WHERE id = '".$id."'";
			$query = $this->db->query($sql);
			$error = $this->db->error();
			$success = ($error["code"] == 0);
			return $success;
		}		
	} // end write_question
	
	public function write_answer_list_entries($symptom_index, $display_name){
		for($i=0;$i<5;$i++){
			$id = '1003002'.$symptom_index.'0'.$i;
			$symptom_id = '1003002'.$symptom_index;
			$comment = strtolower($display_name).' '.$i;
			//check for existing record
			$sql = "SELECT * from answer_list WHERE id = '".$id."'";
			$query = $this->db->query($sql);
			if($query->num_rows() < 1){
				//do insert here
				$sql = "INSERT INTO `answer_list` (`id`, `q_id`, `a_id`, `comment`) 
						VALUES ('".$id."', '".$symptom_id."', '".$id."', ".$this->db->escape($comment).")";
				$query = $this->db->query($sql);
				$error = $this->db->error();
				$success = ($error["code"] == 0);	
				if(! $success){return $success;}
			}else{
				//do update here
				$sql = "UPDATE answer_list set `q_id` = '".$symptom_id."', `a_id` = '".$id."', `comment` = ".$this->db->escape($comment)."
						WHERE id = '".$id."'";
				$query = $this->db->query($sql);
				$error = $this->db->error();
				$success = ($error["code"] == 0);	
				if(! $success){return $success;}		
			}
		} //for
		return $success;
	} //end write_answer_list_entries
	
	public function write_answers($symptom_index, $display_name){
		$symptom_name = strtolower($display_name);
		for($i=0;$i<4;$i++){
			$id = '1003002'.$symptom_index.'0'.$i;
			switch ($i){
				case 0: $a_text = "No<br/>Problems.";break;
				case 1: $a_text = "I have some trouble with ".$symptom_name.", but I am able to do my normal activities.";break;
				case 2: $a_text = "I have problems with ".$symptom_name.", and have some trouble with normal activities.";break;
				case 3: $a_text = "I have so much trouble with ".$symptom_name." that I can't do my normal activities.";break;
			}
			//check for existing record
			$sql = "SELECT * from answer WHERE id = '".$id."'";
			$query = $this->db->query($sql);
			if($query->num_rows() < 1){
				$sql = "INSERT INTO `answer` (`id`, `option_id`, `a_text`, `atext_id`) 
						VALUES ('".$id."', '".$i."', ".$this->db->escape($a_text).", '".$id."')";
				$query = $this->db->query($sql);
				$error = $this->db->error();
				$success = ($error["code"] == 0);	
				if(! $success){return $success;}		
			}else{
				//do update here
				$sql = "UPDATE answer set `option_id` = '".$i."', a_text = ".$this->db->escape($a_text).", `atext_id` = '".$id."'
						WHERE id = '".$id."'";
				$query = $this->db->query($sql);
				$error = $this->db->error();
				$success = ($error["code"] == 0);	
				if(! $success){return $success;}		
			}
		}//for
		return $success;
	}
  
  }//end model
  
 //SELECT html_id, html from texthtml WHERE html_id LIKE '1______079___' LIMIT 1 
 
?>