<?php

//report_page_list_model
//gets list of symptom report screens

//$s_query = "SELECT * from screenlist 
//						WHERE seq LIKE '_003_002____'
//						AND s_type = 'screen'";
//$s_result = mysqli_query($link, $s_query);	

$s_query = "SELECT * from screenlist, cancerlist, cancer_symptoms, symptoms
			WHERE seq LIKE '_003_002____'
			AND cancerlist.cancer = '".$cancer_type."'
			AND cancerlist.id = cancer_symptoms.cancer_id
			 AND symptoms.id = cancer_symptoms.symptom_id
			AND seq = CONCAT('_003_002', symptoms.symptom_id)
			AND s_type = 'screen'
			ORDER BY symptoms.sort_name";
			
$s_result = mysqli_query($link, $s_query);

$report_page_array = array();

while($s_row = mysqli_fetch_array($s_result, MYSQLI_BOTH)){
	$report_page_array[] = $s_row;
}

//add in the "Summary" link
$s_query = "SELECT * from screenlist 
			WHERE seq LIKE '_003_002_900'
			AND s_type = 'screen'";
$s_result = mysqli_query($link, $s_query);	

while($s_row = mysqli_fetch_array($s_result, MYSQLI_BOTH)){
	$report_page_array[] = $s_row;
}

?>