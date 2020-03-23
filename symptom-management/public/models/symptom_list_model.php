<?php

//symptom_list_model
//gets list of symptom screens

//$s_query = "SELECT * from screenlist 
//						WHERE seq LIKE '_003_001____'
//						AND s_type = 'screen'";
//$s_result = mysqli_query($link, $s_query);	

$s_query = "SELECT * from screenlist, cancerlist, cancer_symptoms, symptoms
			WHERE seq LIKE '_003_001____'
			AND cancerlist.cancer = '".$cancer_type."'
			AND cancerlist.id = cancer_symptoms.cancer_id
			AND symptoms.id = cancer_symptoms.symptom_id
			AND seq = CONCAT('_003_001', symptoms.symptom_id)
			AND s_type = 'screen'
			ORDER BY symptoms.sort_name";
			
$s_result = mysqli_query($link, $s_query);
if (!$s_result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

$symptom_array = array();

while($s_row = mysqli_fetch_array($s_result, MYSQLI_BOTH)){
	$symptom_array[$s_row["seq"]] = $s_row;
}

?>