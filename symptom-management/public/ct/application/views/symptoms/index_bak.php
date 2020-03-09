<style>
.row-gap {margin-top:1em;}
label {font-weight:normal;}
legend {font-size:1.15em;font-weight:bold;margin-left:-2em;padding-top:20px;border-bottom:1px solid #999;} 
fieldset {margin-left:5em;}
.textareadiv{ border:1px solid #DDD; border-radius:5px; padding:0.75em; font-weight:normal; }
</style>
<div class="col-xs-10">  <!--right-side container div -->
	<div class="row">
<?php 
	$display_name = stripslashes($symptom["display_name"]);
	echo '
		<div class="col-xs-12"><h3>Symptom: '.$display_name.'</h3></div>'; 
	if (strlen($symptom["basic_title001"]) < 1)
		{ $symptom["basic_title001"] = '<h3>'.$display_name.': Basic Information</h1>'; }
	if (strlen($symptom["basic_what001"]) < 1)
		{ $symptom["basic_what001"] = '<p><span class="\&quot;item_title\&quot;">What is '.strtolower($display_name).'?</span><br />You have '.strtolower($display_name).' when ... &lt; add text here &gt;</p>'; }
	if (strlen($symptom["basic_when001"]) < 1)	
		{ $symptom["basic_when001"] = '<p><span class="\&quot;item_title\&quot;">When you have '.strtolower($display_name).'...</span><br /> ...&lt; add text here &gt;.</p>'; }
	if (strlen($symptom["basic_cause001"]) < 1)		
		{ $symptom["basic_cause001"] = '<p><span class="\&quot;item_title\&quot;">What causes '.strtolower($display_name).'?</span><br /> &lt; add text here &gt;.</p>'; }
	
	if (strlen($symptom["manage_001"]) < 1)		
		{ $symptom["manage_001"] = '<p><span class="\&quot;item_title\&quot;">What can I do about my '.strtolower($display_name).'?</span></p>
<p>First, how bad is your '.strtolower($display_name).'? Read these statements and click on the ONE that best describes your '.strtolower($display_name).' today:</p>';}
/////////////////////////////////////// Management TC statements ///////////////////////////////
	if (strlen($symptom["tc0"]) < 1){ 
		$symptom["tc0"] = "<label> I don't have ".strtolower($display_name)." problems.</label>" ;
	}else{
		$tc_array = explode('<label>',$symptom["tc0"]);
		if(count($tc_array)>1){ $tc = $tc_array[1]; }
		$tc_array = explode('</label>',$tc);
		if(count($tc_array)>0){ $symptom["tc0"] = stripslashes('<label>'.$tc_array[0].'</label>'); }
	}
	
	if (strlen($symptom["tc1"]) < 1){ 
		$symptom["tc1"] = "<label> I sometimes have trouble with ".strtolower($display_name).", but it doesn't keep me from doing my normal activities.</label>" ;
	}else{
		$tc_array = explode('<label>',$symptom["tc1"]);
		if(count($tc_array)>1){ $tc = $tc_array[1]; }
		$tc_array = explode('</label>',$tc);
		if(count($tc_array)>0){ $symptom["tc1"] = stripslashes('<label>'.$tc_array[0].'</label>'); }
	}
	
	if (strlen($symptom["tc2"]) < 1){ 
		$symptom["tc2"] = "<label> I am having trouble with ".strtolower($display_name).", and it keeps me from doing some things, but I can do most of my normal activities.</label>" ;
	}else{
		$tc_array = explode('<label>',$symptom["tc2"]);
		if(count($tc_array)>1){ $tc = $tc_array[1]; }
		$tc_array = explode('</label>',$tc);
		if(count($tc_array)>0){ $symptom["tc2"] = stripslashes('<label>'.$tc_array[0].'</label>'); }
	}
	
	if (strlen($symptom["tc3"]) < 1){ 
		$symptom["tc3"] = "<label> I have a lot of trouble with ".strtolower($display_name).", and it's keeping me from doing many of my normal activities.</label>" ;
	}else{
		$tc_array = explode('<label>',$symptom["tc3"]);
		if(count($tc_array)>1){ $tc = $tc_array[1]; }
		$tc_array = explode('</label>',$tc);
		if(count($tc_array)>0){ $symptom["tc3"] = stripslashes('<label>'.$tc_array[0].'</label>'); }
	}
////////////////////// end TC statements /////////////////////

////////////////// MILD/MOD/SEVERE management ////////////////
if (strlen($symptom["manage_mild"]) < 1){ $symptom["manage_mild"] = '<p><b>Your '.strtolower($display_name).' is <span id="text_mild">MILD</span></b></p><p>Here are some management tips for you:</p><p>Useful activities:<br/></p>
	<ul>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
	</ul>'; }

if (strlen($symptom["manage_mod"]) < 1){ $symptom["manage_mod"] = '<p><b>Your '.strtolower($display_name).' is <span id="text_moderate">MODERATE</span></b></p><p>Besides following the recommendations for MILD '.strtolower($display_name).', you should also consider these tips:</p><p>Useful activities:<br/></p>
	<ul>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
		<li>&lt; add text here &gt</li>
	</ul>'; }

if (strlen($symptom["manage_severe"]) < 1){ $symptom["manage_severe"] = '<p><b>Your '.strtolower($display_name).' is <span id="text_severe">SEVERE</span></b></p>
<p>You are probably unable to manage your rash on your own. You should call your doctor and seek help.</p>
<p>Read about <a href="index.php?seq=_003_001'.$symptom["symptom_id"].'_200">how to talk to your doctor about your '.strtolower($display_name).'</a>.</p>'; }

////////////////// end MILD/MOD/SEVERE management ////////////////


	if (strlen($symptom["talk_001"]) < 1)	
		{ $symptom["talk_001"] = '<p><span class="\&quot;item_title\&quot;">How can I talk to my doctor about my '.strtolower($display_name).'?</span></p>
			<ul>
			<li>Tell your doctor when your '.strtolower($display_name).' started and how it has gotten worse.</li>
			<li>Explain how your '.strtolower($display_name).' is affecting your quality of life.</li>
			<li>&lt; add text here &gt</li>
			<li>&lt; add text here &gt</li>
			<li>&lt; add text here &gt</li>
			</ul>'; }	

	if (strlen($symptom["question_001"]) < 1)	
		{ $symptom["question_001"] = '<p><span class="\&quot;item_title\&quot;">What questions can I ask my doctor?<br /></span></p>
			<ul>
			<li>&lt; add text here &gt</li>
			<li>&lt; add text here &gt</li>
			<li>&lt; add text here &gt</li>
			<li>&lt; add text here &gt</li>
			</ul>'; }
			
	if (strlen($symptom["info_001"]) < 1)
		{ $symptom["info_001"] = '<p><span class="item_title">&lt; add link source name here &gt: </span>&lt; Use the Insert menu above to enter a link name and URL here &gt</p>
		<p><span class="item_title">&lt; add link source name here &gt: </span>&lt; Use the Insert menu above to enter a link name and URL here &gt</p>'; }
		
?>
	</div>  <!--/row-->
    <form id="symptom_form" method="post" action="<?php echo base_url().'/symptoms/updatesymptom'; ?>">
    <div class="row">
    	<div class="col-xs-12">
        
        <fieldset>
        <legend >Symptom Name</legend>
            <div class="form-group"><label>Name to display for this symptom: </label><input type="text" class="namechange" id="display_name" name="display_name" value="<?php echo $display_name; ?>" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
            <div class="form-group"><label>Sort-order name for this symptom: </label><input type="text" class="namechange" id="sort_name" value="<?php echo stripslashes($symptom["sort_name"]); ?>" placeholder="Enter Sort Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
    	</fieldset>
        <fieldset>
        <legend>Symptom Information</legend>
        <div class="form-group"><label>Symptom Name: </label><input type="text" id="label_001" name="label_001" class="text_item" value="<?php echo $display_name; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" readonly/></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Basic Information Title: </label><textarea id="basic_title001" name="basic_title001" class="tinymce text_item" placeholder="Enter Symptom Basic Info" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["basic_title001"]); ?></textarea></div>
        <div class="form-group"><label>What Is <?php echo $display_name; ?> Text: </label><textarea id="basic_what001" name="basic_what001" class="tinymce text_item" placeholder="Enter What Is Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["basic_what001"]); ?></textarea></div>
        <div class="form-group"><label>When You Have <?php echo $display_name; ?> Text: </label><textarea id="basic_when001" name="basic_when001" class="tinymce text_item" placeholder="Enter When You Have Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["basic_when001"]); ?></textarea></div>
        <div class="form-group"><label>What Causes <?php echo $display_name; ?> Text: </label><textarea id="basic_cause001" name="basic_cause001" class="tinymce text_item" placeholder="Enter What Causes Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["basic_cause001"]); ?></textarea></div>
        </fieldset>
        <fieldset>
        <legend>Symptom Management</legend>
        <div class="form-group"><label><?php echo $display_name; ?> Symptom Management Page Title: </label><input type="text" id="label_001manage" name="label_001manage" class="text_item" value="<?php echo stripslashes($symptom["label_001manage"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        
        <div class="form-group"><label>What Can I Do About <?php echo $display_name; ?> Text: </label><textarea id="manage_001" name="manage_001" class="tinymce text_item" placeholder="Enter What Can I Do About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["manage_001"]); ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Toxicity Criteria Question Text for "No Problem": </label><textarea id="tc0" name="tc0" class="tinymce text_item" placeholder="Enter Toxicity Criteria 0 (No Problem)" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["tc0"]; ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Toxicity Criteria Question Text for "Mild": </label><textarea id="tc1" name="tc1" class="tinymce text_item" placeholder="Enter Toxicity Criteria 1 (Mild)" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["tc1"]; ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Toxicity Criteria Question Text for "Moderate": </label><textarea id="tc2" name="tc2" class="tinymce text_item" placeholder="Enter Toxicity Criteria 2 (Moderate)" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["tc2"]; ?></textarea></div> 
        
        <div class="form-group"><label><?php echo $display_name; ?> Toxicity Criteria Question Text for "Severe": </label><textarea id="tc3" name="tc3" class="tinymce text_item" placeholder="Enter Toxicity Criteria 3 (Severe)" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["tc3"]; ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Symptom Management Text for "Mild": </label><textarea id="manage_mild" name="manage_mild" class="tinymce text_item" placeholder='Enter Symptom Management Text for "Mild"' style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["manage_mild"]; ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Symptom Management Text for "Moderate": </label><textarea id="manage_mod" name="manage_mod" class="tinymce text_item" placeholder='Enter Symptom Management Text for "Moderate"' style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["manage_mod"]; ?></textarea></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Symptom Management Text for "Severe": </label><textarea id="manage_severe" name="manage_severe" class="tinymce text_item" placeholder='Enter Symptom Management Text for "Severe"' style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["manage_severe"]; ?></textarea></div>
        
        <div class="form-group"><label>Talking About <?php echo $display_name; ?> Page Title: </label><input type="text" id="label_001talk" name="label_001talk" class ="text_item" value="<?php echo stripslashes($symptom["label_001talk"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;"  /></div>
        
        <div class="form-group"><label>How Can I Talk About <?php echo $display_name; ?> Text: </label><textarea id="talk_001" name="talk_001" class="tinymce text_item" placeholder="Enter How Can I Talk About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["talk_001"]); ?></textarea></div>
        
        <div class="form-group"><label>Questions For My Doctor Text: </label><textarea id="question_001" name="question_001" class="tinymce text_item" placeholder="Enter Questions For My Doctor Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["question_001"]); ?></textarea></div>
        
        <div class="form-group"><label>More Information About <?php echo $display_name; ?> Page Title: </label><input type="text" id="label_001info" name="label_001info" class="text_item" value="<?php echo stripslashes($symptom["label_001info"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        
        <div class="form-group"><label>More Information About <?php echo $display_name; ?> Text: </label><textarea id="info_001" name="info_001" class="tinymce text_item" placeholder="Enter More Information About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["info_001"]); ?></textarea></div>
        </fieldset>
        <fieldset>
        <legend >Symptom Reporting</legend>
            <div class="form-group"><label>Report Symptom Name: </label><input type="text" id="label_002" name="label_002" class="text_item" value="<?php echo stripslashes($symptom["label_002"]); ?>" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" readonly /></div>
            <div class="form-group"><label>Report Symptom Title: </label><textarea id="report_title" name="report_title" class="tinymce textareadiv text_item" placeholder="Enter Report Page Title" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["report_title"]); ?></textarea></div>
            
            <div class="form-group"><label>Report Severity Statement No Problem: </label><textarea id="report_tc0" name="report_tc0" class="tinymce textareadiv text_item" placeholder="Enter Report Severity Statement No Problem" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["report_tc0"]); ?></textarea></div>
            <div class="form-group"><label>Report Severity Statement Mild: </label><textarea id="report_tc1" name="report_tc1" class="tinymce textareadiv text_item" placeholder="Enter Report Severity Statement Mild" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["report_tc1"]); ?></textarea></div>
            <div class="form-group"><label>Report Severity Statement Moderate: </label><textarea id="report_tc2" name="report_tc2" class="tinymce textareadiv text_item" placeholder="Enter Report Severity Statement Moderate" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["report_tc2"]); ?></textarea></div>
            <div class="form-group"><label>Report Severity Statement Severe: </label><textarea id="report_tc3" name="report_tc3" class="tinymce textareadiv text_item" placeholder="Enter Report Severity Statement Severe" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo stripslashes($symptom["report_tc3"]); ?></textarea></div>
            
    	</fieldset>
        <fieldset>
        <legend>Custom Guide</legend>
        <div class="form-group"><label>Symptom Name: </label><input type="text" id="label_003" name="label_003" class="text_item" value="<?php echo stripslashes($symptom["label_003"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" readonly /></div>
        
        <div class="form-group"><label><?php echo $display_name; ?> Symptom Management Page Title: </label><input type="text" id="label_003manage" name="label_003manage" class="text_item" value="<?php echo stripslashes($symptom["label_003manage"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        
        <div class="form-group"><label>Talking About <?php echo $display_name; ?> Page Title: </label><input type="text" id="label_003talk" name="label_003talk" class="text_item" value="<?php echo stripslashes($symptom["label_003talk"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        
        <div class="form-group"><label>More Information About <?php echo $display_name; ?> Page Title: </label><input type="text" id="label_003info" name="label_003info" class="text_item" value="<?php echo stripslashes($symptom["label_003info"]); ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        </fieldset>
    	</div>  <!--/col-xs-12-->
    
    <div class="row">
    	<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;">
    		<button type="submit" class="button button-primary pull-right" style="margin-left:2em;">Save Changes</button>
            <a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        </div>
	</div>  <!--/row-->
    	<input type="hidden" id="s_id" name="s_id" value="<?php echo $s_id; ?>" />
    	<input type="hidden" id="symptom_id" name="symptom_id" value="<?php echo $symptom["symptom_id"]; ?>" />
        <input type="hidden" id="symptom_name" name="symptom_name" value="<?php echo $symptom["display_name"]; ?>" />
        </form>
	</div>  <!--/row-->


</div>  <!--/class="col-xs-10"  right-side container div -->

<script type="text/javascript">
	var s_id = <?php echo $s_id; ?>;
	var changed_items = ["s_id","symptom_id","symptom_name"];
	$(document).ready(function() {
		
		$(".namechange").on('change', function(event){
			$.post("<?php echo base_url().'/symptoms/updatename'; ?>",
					{ s_id:s_id, label:$("#display_name").val(),sort_name:$("#sort_name").val() },
					function(data){
						if(data){
							window.location.reload(true);
						}else{
							alert("There was a problem updating the name.");
						}// if(data)
					},
					"text"); //post
		});//on change
		
		$(".text_item").on('change', function(event){
			var this_id = $(this).attr("id");
			make_changed_items(this_id);
		});
		
		function make_changed_items(id){
			if($.inArray(id, changed_items) == -1){  //check to see if this name is already in the array
				changed_items.push(id);
				//alert(changed_items.toString());
			}
		}
		
		
		//set tinymce
			tinymce.init({
				selector: '.tinymce',
				inline:false,
				readonly:false,
				content_css : '<?= config_item('base_uri'); ?>/assets/css/bootstrap.css',
				menubar: "edit view insert format",
				plugins: [ 'autolink lists link textcolor', 'table  paste', 'code'  ],
  				toolbar: 'undo redo | bold italic forecolor backcolor | bullist numlist outdent indent | code ',
				init_instance_callback: function (editor) {
					editor.on('Change', function (e) {
						var this_id = editor.id;
						make_changed_items(this_id);
					});
				  }
			});
		//convert_for_tinymce();
		
			
		//form/submit
		$("form").submit(function(e) {
			//make tinymce save form data
			tinymce.triggerSave();
        	//prevent Default functionality
        	e.preventDefault();
			var serial_items = {};
			for(var i=0;i<changed_items.length;i++){
				//serial_items[changed_items[i]] = $( "input[name='"+changed_items[i]+"']" ).val(); 
				serial_items[changed_items[i]] = $( "#"+changed_items[i] ).val(); 
			}
			$.post("<?php echo base_url().'/symptoms/updatesymptom'; ?>",
					serial_items,
					function(data){
						alert("Symptom has been updated");
						//window.location = "<?php echo base_url().'cancertypes/index/'.$c_id; ?>";
					}, //function
					"text"
			);//post
		});//submit
		
	}); //document.ready
</script>