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
	$display_name = $symptom["display_name"];
	echo '
		<div class="col-xs-12"><h3>Symptom: '.$display_name.'</h3></div>'; 
	if (strlen($symptom["basic_title001"]) < 1)
		{ $symptom["basic_title001"] = '<h1>'.$symptom["display_name"].': Basic Information</h1>'; }
	if (strlen($symptom["basic_what001"]) < 1)
		{ $symptom["basic_what001"] = '<p><span class="\&quot;item_title\&quot;">What is '.strtolower($symptom["display_name"]).'?</span><br />You have '.strtolower($symptom["display_name"]).' when ... &lt; add text here &gt;</p>'; }
	if (strlen($symptom["basic_when001"]) < 1)	
		{ $symptom["basic_when001"] = '<p><span class="\&quot;item_title\&quot;">When you have '.strtolower($symptom["display_name"]).'...</span><br /> ...&lt; add text here &gt;.</p>'; }
	if (strlen($symptom["basic_cause001"]) < 1)		
		{ $symptom["basic_cause001"] = '<p><span class="\&quot;item_title\&quot;">What causes '.strtolower($symptom["display_name"]).'?</span><br /> &lt; add text here &gt;.</p>'; }
	
		
	if (strlen($symptom["manage_001"]) < 1)		
		{ $symptom["manage_001"] = '<p><span class="\&quot;item_title\&quot;">What can I do about my '.strtolower($symptom["display_name"]).'?</span></p>
<p>First, how bad is your '.strtolower($symptom["display_name"]).'? Read these statements and click on the ONE that best describes your '.strtolower($symptom["display_name"]).' today:</p>';}
	if (strlen($symptom["talk_001"]) < 1)	
		{ $symptom["talk_001"] = '<p><span class="\&quot;item_title\&quot;">How can I talk to my doctor about my '.strtolower($symptom["display_name"]).'?</span></p>
			<ul>
			<li>Tell your doctor when your '.strtolower($symptom["display_name"]).' started and how it has gotten worse.</li>
			<li>Explain how your '.strtolower($symptom["display_name"]).' is affecting your quality of life.</li>
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
            <div class="form-group"><label>Name to display for this symptom: </label><input type="text" id="displayname" name="displayname" value="<?php echo $symptom["display_name"]; ?>" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
            <div class="form-group"><label>Sort-order name for this symptom: </label><input type="text" id="sortname" name="sortname" value="<?php echo $symptom["sort_name"]; ?>" placeholder="Enter Sort Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
    	</fieldset>
        <fieldset>
        <legend>Symptom Information</legend>
        <div class="form-group"><label>Symptom Name: </label><input type="text" id="label_001" name="label_001" class="text_item" value="<?php echo $symptom["label_001"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" readonly/></div>
        
        <div class="form-group"><label><?php echo $symptom["display_name"]; ?> Basic Information Title: </label><textarea id="basic_title001" name="basic_title001" class="tinymce text_item" placeholder="Enter Symptom Basic Info" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["basic_title001"]; ?></textarea></div>
        <div class="form-group"><label>What Is <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="basic_what001" name="basic_what001" class="tinymce text_item" placeholder="Enter What Is Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["basic_what001"]; ?></textarea></div>
        <div class="form-group"><label>When You Have <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="basic_when001" name="basic_when001" class="tinymce text_item" placeholder="Enter When You Have Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["basic_when001"]; ?></textarea></div>
        <div class="form-group"><label>What Causes <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="basic_cause001" name="basic_cause001" class="tinymce text_item" placeholder="Enter What Causes Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["basic_cause001"]; ?></textarea></div>
        </fieldset>
        <fieldset>
        <legend>Symptom Management</legend>
        <div class="form-group"><label><?php echo $symptom["display_name"]; ?> Symptom Management Page Title: </label><input type="text" id="label_001manage" name="label_001manage" class="text_item" value="<?php echo $symptom["label_001manage"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        <div class="form-group"><label>What Can I Do About <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="manage_001" name="manage_001" class="tinymce text_item" placeholder="Enter What Can I Do About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["manage_001"]; ?></textarea></div>
        <div class="form-group"><label>Talking About <?php echo $symptom["display_name"]; ?> Page Title: </label><input type="text" id="label_001talk" name="label_001talk" class ="text_item" value="<?php echo $symptom["label_001talk"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;"  /></div>
        <div class="form-group"><label>How Can I Talk About <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="talk_001" name="talk_001" class="tinymce text_item" placeholder="Enter How Can I Talk About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["talk_001"]; ?></textarea></div>
        <div class="form-group"><label>Questions For My Doctor Text: </label><textarea id="question_001" name="question_001" class="tinymce text_item" placeholder="Enter Questions For My Doctor Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["question_001"]; ?></textarea></div>
        
        <div class="form-group"><label>More Information About <?php echo $symptom["display_name"]; ?> Page Title: </label><input type="text" id="label_001info" name="label_001info" class="text_item" value="<?php echo $symptom["label_001info"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        <div class="form-group"><label>More Information About <?php echo $symptom["display_name"]; ?> Text: </label><textarea id="info_001" name="info_001" class="tinymce text_item" placeholder="Enter More Information About Text" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["info_001"]; ?></textarea></div>
        </fieldset>
        <fieldset>
        <legend >Symptom Reporting</legend>
            <div class="form-group"><label>Report Symptom Name: </label><input type="text" id="label_002" name="label_002" class="text_item" value="<?php echo $symptom["label_002"]; ?>" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" readonly /></div>
            <div class="form-group"><label>Report Symptom Title: </label><textarea id="report_title" name="report_title" class="tinymce textareadiv text_item" placeholder="Enter Report Page Title" style="width:95%;margin-left:1em;padding-left:1em;"><?php echo $symptom["report_title"]; ?></textarea></div>
    	</fieldset>
        <fieldset>
        <legend>Custom Guide</legend>
        <div class="form-group"><label>Symptom Name: </label><input type="text" id="label_003" name="label_003" class="text_item" value="<?php echo $symptom["label_003"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" readonly /></div>
        <div class="form-group"><label><?php echo $symptom["display_name"]; ?> Symptom Management Page Title: </label><input type="text" id="label_003manage" name="label_003manage" class="text_item" value="<?php echo $symptom["label_003manage"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        <div class="form-group"><label>Talking About <?php echo $symptom["display_name"]; ?> Page Title: </label><input type="text" id="label_003talk" name="label_003talk" class="text_item" value="<?php echo $symptom["label_003talk"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
        <div class="form-group"><label>More Information About <?php echo $symptom["display_name"]; ?> Page Title: </label><input type="text" id="label_003info" name="label_003info" class="text_item" value="<?php echo $symptom["label_003info"]; ?>" placeholder="" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
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
		
		$("#displayname").on('change', function(event){
			$.post("<?php echo base_url().'/symptoms/symptom_setup'; ?>",
					{ s_id:s_id, label:$(this).val() },
					function(data){
						if(data == "success"){
							alert(data);
							//window.location.reload(true);
						}else{
							alert(data);
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
			}
		}
		
		
		//set tinymce
			tinymce.init({
				selector: '.tinymce',
				inline:false,
				readonly:false,
				content_css : '<?= config_item('base_uri'); ?>/assets/css/portal_main.css',
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
						window.location = "<?php echo base_url().'cancertypes/index/'.$c_id; ?>";
					}, //function
					"text"
			);//post
		});//submit
		
	}); //document.ready
</script>