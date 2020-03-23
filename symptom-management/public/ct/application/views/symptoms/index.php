<style>
.row-gap {margin-top:1em;}
label {font-weight:normal;}
legend {font-size:1.15em;font-weight:bold;margin-left:-2em;padding-top:20px;border-bottom:1px solid #999;} 
fieldset {margin-left:5em;}
.textareadiv{ border:1px solid #DDD; border-radius:5px; padding:0.75em; font-weight:normal; }
</style>
<!-- <div class="col-xs-10">  <!--right-side container div -->
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
	
	//parse through the info items		
	$resource_list = array();
	//$test_list = array();							
	if (strlen($symptom["info_001"]) < 1){ 
		$symptom["info_001"] = ''; 
		$resource_list[] = array(	"infoname"	=>	'',
									"infotitle"	=>	'',
									"infourl"	=>	'');
	}else{
		$info_string = stripslashes($symptom["info_001"]);
		$info_array = explode('<p><span class="item_title">',$info_string);
		$info_num = count($info_array)-1;
		foreach($info_array as $info){
			if(strlen($info) > 0){
				$name_array = explode(': </span><a href="',$info);
				//make sure there are items in the array
				if(count($name_array)<1){$name_array[] = '';}
				if(count($name_array)<2){$name_array[] = '';}
				$infoname = $name_array[0];
				$url_array = explode('" target="_blank">',$name_array[1]);
				//make sure there are items in the array
				if(count($url_array)<1){$url_array[] = '';}
				if(count($url_array)<2){$url_array[] = '';}
				$infourl = $url_array[0];
				$title_array = explode('</a>',$url_array[1]);
				$infotitle = $title_array[0];
											
				$resource_list[] = array(	"infoname"	=>	$infoname,
											"infotitle"	=>	$infotitle,
											"infourl"	=>	$infourl);
			}
		}
	}
	$info_num = count($resource_list);
		
?>
	</div>  <!--/row-->
     <div class="row">
    	<div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a data-toggle="tab" href="#symptom_name" >Symptom Name</a></li>
              <li role="presentation"><a data-toggle="tab" href="#basic_info">Basic Info</a></li>
              <li role="presentation"><a data-toggle="tab" href="#manage" >Managing</a></li>
              <li role="presentation"><a data-toggle="tab" href="#talking_about" >Talking About</a></li>
              <li role="presentation"><a data-toggle="tab" href="#more_info">More Info</a></li>
              <li role="presentation"><a data-toggle="tab" href="#report">Reporting</a></li>
            </ul>
     	</div>  <!--/col-xs-12-->       
	</div>  <!--/row-->       
    
    <div class="tab-content">
  		<div id="symptom_name" class="tab-pane active">
    		<form id="updatename_form" method="post" action="">
            	<fieldset>
                    <legend >Symptom Name</legend>
                    <div class="form-group"><label>Name to display for this symptom: </label><input type="text" class="namechange" id="label" name="label" value="<?php echo $display_name; ?>" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" required /></div>
                    <div class="form-group"><label>Sort-order name for this symptom: </label><input type="text" class="namechange" id="sort_name" name="sort_name" value="<?php echo stripslashes($symptom["sort_name"]); ?>" placeholder="Enter Sort Name" style="width:50%;margin-left:1em;padding-left:1em;" required /></div>
                </fieldset>
             	<div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:20%;">
    					<button type="submit" class="button button-primary pull-right" style="margin-left:2em;">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
                <input type="hidden" id="s_id" name="s_id" value="<?php echo $s_id; ?>" />
                <input type="hidden" id="symptom_id" name="symptom_id" value="<?php echo $symptom["symptom_id"]; ?>" />
                <input type="hidden" id="symptom_name" name="symptom_name" value="<?php echo $symptom["display_name"]; ?>" />
        	</form> 
          </div>  <!-- /.symptom_name -->
          
          <div id="basic_info" class="tab-pane">
                <div class="row">
                    <div id="symptom-heading" class="col-xs-12">
                        <h3 style="text-align:center;"><?php echo $display_name; ?>: Basic Information</h3>
                    </div>  <!-- /#symptom_heading  -->
                </div> <!--/.row --> 
                   
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#basic_what001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="basic_what001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["basic_what001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#basic_when001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="basic_when001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["basic_when001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#basic_cause001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="basic_cause001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["basic_cause001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->
                
                <div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:20%;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:save_changes();">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
                
          </div>  <!-- /.basic_info -->
          
          <div id="manage" class="tab-pane" style="margin-bottom:5em;">
          		<div class="row">
                    <div id="symptom-heading" class="col-xs-12">
                        <h3 style="text-align:center;">Managing Your <?php echo $display_name; ?></h3>
                    </div>  <!-- /#symptom_heading  -->
                </div> <!--/.row --> 
                
                <div class="row" style="margin-top:0;color:#999999;">
                	<div class="col-xs-12"><p>There are no Symptom Report records to show any problems with this symptom.  Using the tabs below, choose from Mild, Moderate, or Severe to read about symptom management for this symptom. Use the Symptom Report tool to document your symptom severity over time.</p></div>
                	<div class="col-xs-12">Click here to do a <b>Quick Report Update</b></div>
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#manage_001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="manage_001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["manage_001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->                
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#tc0')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="tc0_container" class="col-xs-9" style="border:1px solid #000000;">
                    	<div class="row">
                        	<div class="col-xs-1"><input type="radio" /></div>   <!--/.col-xs-1 -->
                            <div id="tc0" class="item_container col-xs-11 tinymce">
                            <?php echo stripslashes($symptom["tc0"]); ?>
                            </div>  <!--/.item_container -->
                            
                        </div>  <!--/.row -->
                    </div>  <!--/tc0_container -->
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:0.5em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#tc1')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="tc1_container" class="col-xs-9" style="border:1px solid #000000;background-color:#ddffee;">
                    	<div class="row">
                        	<div class="col-xs-1"><input type="radio" /></div>   <!--/.col-xs-1 -->
                            <div id="tc1" class="item_container col-xs-11 tinymce">
                            <?php echo stripslashes($symptom["tc1"]); ?>
                            </div>  <!--/.item_container -->
                            
                        </div>  <!--/.row -->
                    </div>  <!--/tc1_container -->
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:0.5em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#tc2')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="tc2_container" class="col-xs-9" style="border:1px solid #000000;background-color:#ffffe0;">
                    	<div class="row">
                        	<div class="col-xs-1"><input type="radio" /></div>   <!--/.col-xs-1 -->
                            <div id="tc2" class="item_container col-xs-11 tinymce">
                            <?php echo stripslashes($symptom["tc2"]); ?>
                            </div>  <!--/.item_container -->
                            
                        </div>  <!--/.row -->
                    </div>  <!--/tc2_container -->
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:0.5em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#tc3')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="tc3_container" class="col-xs-9" style="border:1px solid #000000;background-color:#ffdddd;">
                    	<div class="row">
                        	<div class="col-xs-1"><input type="radio" /></div>   <!--/.col-xs-1 -->
                            <div id="tc3" class="item_container col-xs-11 tinymce">
                            <?php echo stripslashes($symptom["tc3"]); ?>
                            </div>  <!--/.item_container -->
                            
                        </div>  <!--/.row -->
                    </div>  <!--/tc3_container -->
                </div>  <!--/.row -->

				<!-- manage tabs -->
                <div class="row" style="margin-top:2em;">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs">
                              <li role="presentation" class="active" style="background-color:#ddffee;color:#000000;">
                              	<a data-toggle="tab" href="#manage_mild_panel" style="background-color:#ddffee;color:#000000;">
                              		Mild
                              	</a></li>
                              <li role="presentation" style="background-color:#ffffe0;color:#000000;">
                              	<a data-toggle="tab" href="#manage_mod_panel" style="background-color:#ffffe0;color:#000000;">
                                	Moderate</a></li>
                              <li role="presentation" style="background-color:#ffdddd;color:#000000;">
                              	<a data-toggle="tab" href="#manage_severe_panel" style="background-color:#ffdddd;color:#000000;" >
                                	Severe</a></li>
                            </ul>
                        </div>  <!--/col-xs-12-->       
                  </div>  <!--/row-->
                  
                  <div class="tab-content">
                  		<div id="manage_mild_panel" class="tab-pane active" style="padding:20px;min-height:100px;background-color:#ddffee;">
                        	<div class="container-fluid" style="background-color:#ffffff;border:1px solid #000000;padding:1em;">
                            	<div class="row">
                                	<div class="col-xs-1" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#manage_mild')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                    <div id="manage_mild" class="item_container col-xs-10 tinymce"><?php echo $symptom["manage_mild"]; ?></div>
                                </div>
                            </div><!-- /.   container-fluid -->
                        </div>  <!-- /.   manage_mild -->
                        
                        <div id="manage_mod_panel" class="tab-pane" style="padding:20px;min-height:100px;background-color:#ffffe0;">
                        	<div class="container-fluid" style="background-color:#ffffff;border:1px solid #000000;padding:1em;">
                            	<div class="row">
                                	<div class="col-xs-1" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#manage_mod')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                    <div id="manage_mod" class="item_container col-xs-10 tinymce"><?php echo $symptom["manage_mod"]; ?></div>
                                </div>
                            </div><!-- /.   container-fluid -->
                        </div>  <!-- /.   manage_mod -->
                        
                        <div id="manage_severe_panel" class="tab-pane" style="padding:20px;min-height:100px;background-color:#ffdddd;">
                        	<div class="container-fluid" style="background-color:#ffffff;border:1px solid #000000;padding:1em;">
                            	<div class="row">
                                	<div class="col-xs-1" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#manage_severe')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                    <div id="manage_severe" class="item_container col-xs-10 tinymce"><?php echo $symptom["manage_severe"]; ?></div>
                                </div>
                            </div><!-- /.   container-fluid -->
                        </div>  <!-- /.   manage_mild -->
                        
                  </div>  <!-- /.   tab-content -->
                  
                  <div class="row">
                  
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:1em;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:save_changes();">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
				 
          </div>  <!-- /.manage -->
          
          <div id="talking_about" class="tab-pane">
          		<div class="row">
                    <div id="symptom-heading" class="col-xs-12">
                        <h3 style="text-align:center;">Talking About <?php echo $display_name; ?></h3>
                    </div>  <!-- /#symptom_heading  -->
                </div> <!--/.row -->
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#talk_001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="talk_001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["talk_001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->
                
                <div class="row" style="margin-top:2em;">
                    <div class="col-xs-2" style="text-align:right;margin-right:1em;"><a href="javascript:set_tinymce('#question_001')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                    <div id="question_001" class="item_container col-xs-8 tinymce">
                    <?php echo stripslashes($symptom["question_001"]); ?>
                    </div>  <!--/.item_container -->	
                </div>  <!--/.row -->
                
                <div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:20%;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:save_changes();">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
          
          </div>  <!-- /.talking_about -->
          
          <div id="more_info" class="tab-pane">
          		<div class="row">
                    <div id="symptom-heading" class="col-xs-12">
                        <h3 style="text-align:center;">More Information</h3>
                    </div>  <!-- /#symptom_heading  -->
                </div> <!--/.row --> 
                
                <div class="row" style="margin-top:-2em;">
                        <form class="form-horizontal" id="resource_form" method="post" action="">
                        <fieldset>
                            <legend >Information Resources</legend>
                </div>  <!--/.row -->
                
                <div id="resources" style="padding-left:4%;margin-top:-0.5em;">
                <?php
				$counter = 0; 
				foreach($resource_list as $resource){
					echo '
                    <div class="row">
                        <div class="col-xs-3">                              
                            <div class="form-group">
                                <label for="infoname_'.$counter.'" style="font-weight:bold;">Information Source: </label>
                                <textarea class="form-control resource_name" id="infoname_'.$counter.'" name="infoname_'.$counter.'" placeholder="Enter Information Source" style="width:100%;padding-left:1em;" required />'.$resource["infoname"].'</textarea>
                            </div>  <!-- /.form-group  -->
                        </div>  <!--/.col-xs-3 --> 
						<div class="col-xs-3">                              
                            <div class="form-group">
                                <label for="infotitle_'.$counter.'" style="font-weight:bold;">Resource Title: </label>
                                <textarea class="form-control resource_title" id="infotitle_'.$counter.'" name="infotitle_'.$counter.'"  placeholder="Enter Resource Title" style="width:100%;padding-left:1em;" required />'.$resource["infotitle"].'</textarea>
                            </div>  <!-- /.form-group  -->
                        </div>  <!--/.col-xs-3 -->
                        <div class="col-xs-6">     
                        	<div class="form-group">
                            	<label for="infourl_'.$counter.'" style="font-weight:bold;">Resource URL: </label>
                                <textarea class="form-control resource_url" id="infourl_'.$counter.'" name="infourl_'.$counter.'"  placeholder="Enter Resource URL" style="width:100%;padding-left:1em;" required />'.$resource["infourl"].'</textarea>
                           	</div>  <!-- /.form-group  -->
                    	</div>  <!--/.col-xs-6 -->
                    </div>  <!--/.row -->'; 
					$counter++;
					}
				?>
                </div>  <!--/.resources -->
                </fieldset>
                <input type="hidden" id="s_id" name="s_id" value="<?php echo $s_id; ?>" />
                <input type="hidden" id="symptom_id" name="symptom_id" value="<?php echo $symptom["symptom_id"]; ?>" />
                <input type="hidden" id="symptom_name" name="symptom_name" value="<?php echo $symptom["display_name"]; ?>" />
                <div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:1em;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:add_resource();">Add New Resource</button>
            		</div>
				</div>  <!--/row-->
                
                <!--<?php echo stripslashes($symptom["info_001"]); ?> -->
                
                <div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:1em;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:save_resources();">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
                
          </div>  <!-- /.more_info -->
          
          <div id="report" class="tab-pane">
          		<div class="row">
                    <div id="symptom-heading" class="col-xs-12">
                        <h3 style="text-align:center;">Report <?php echo $display_name; ?></h3>
                        <p style="color:#999999;">Please indicate, on a scale of 0 - 10, the severity of your <?php echo strtolower($display_name); ?> symptoms during the past week.</p>
                    </div>  <!-- /#symptom_heading  -->
                </div> <!--/.row --> 
                <div class="container-fluid" style="min-height:100px;border:1px solid #999999;padding-bottom:1em;padding-right:35px;">
                    <div class="row">
                    	<div class="col-xs-2"></div>
                        <div class="col-xs-3" style="text-align:center;"><b>Mild</b></div>
                        <div class="col-xs-3" style="text-align:center;"><b>Moderate</b></div>
                        <div class="col-xs-4" style="text-align:center;"><b>Severe</b></div>
                    </div> <!--/.row --> 
                    
                    <div class="row">
                    	<!-- No Problem -->
                    	<div class="col-xs-2" style="min-height:200px;padding-top:1em;">
                            <div class="row">
                            	<div class="col-xs-2"></div>
                                <div class="col-xs-3" style="text-align:center;padding:0;"><a href="javascript:set_tinymce('#report_tc0')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                <div id="report_tc0" class="item_container col-xs-5 tinymce" style="text-align:left;padding:0;">
                                <?php echo stripslashes($symptom["report_tc0"]); ?>
                                </div>  <!--/.report_tc0 --> 
                            </div>  <!--/.row --> 
                        </div>    <!--/.col-xs-2 -->	
                        <!-- Mild -->
                        <div class="col-xs-3" style="text-align:left;background-color:#ddffee;min-height:200px;padding-top:1em;">
                        	<div class="row">
                                <div class="col-xs-2" style="text-align:center;padding:0;"><a href="javascript:set_tinymce('#report_tc1')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                <div id="report_tc1" class="item_container col-xs-10 tinymce" style="text-align:left;padding:0;">
                                <?php echo stripslashes($symptom["report_tc1"]); ?>
                                </div>  <!--/.report_tc1 --> 
                            </div>  <!--/.row --> 
                        </div>  <!--/.col-xs-3 -->	
                        <!-- Moderate -->
                        <div class="col-xs-3" style="text-align:center;background-color:#ffffe0;min-height:200px;padding-top:1em;">
                        	<div class="row">
                                <div class="col-xs-2" style="text-align:center;padding:0;"><a href="javascript:set_tinymce('#report_tc2')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                <div id="report_tc2" class="item_container col-xs-10 tinymce" style="text-align:left;padding:0;">
                                <?php echo stripslashes($symptom["report_tc2"]); ?>
                                </div>  <!--/.report_tc2 --> 
                            </div>  <!--/.row --> 
                        </div>  <!--/.col-xs-3 -->
                        
                        <div class="col-xs-4" style="text-align:center;background-color:#ffdddd;min-height:200px;padding-top:1em;">
                        	<div class="row">
                                <div class="col-xs-2" style="text-align:center;padding:0;"><a href="javascript:set_tinymce('#report_tc3')"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a></div>
                                <div id="report_tc3" class="item_container col-xs-10 tinymce" style="text-align:left;padding:0;">
                                <?php echo stripslashes($symptom["report_tc3"]); ?>
                                </div>  <!--/.report_tc2 --> 
                            </div>  <!--/.row --> 
                        </div>  <!--/.col-xs-4 -->                        
                    </div> <!--/.row --> 
                    <!-- number indices -->
                    <style>
					.num_cell { min-height:30px;text-align:center;border-top:1px solid #999999;border-bottom:1px solid #999999;padding-top:0.2em; }
					.mild_cell{ background-color:#ddffee; }
					.mod_cell { background-color:#ffffe0; }
					.sev_cell { background-color:#ffdddd; }
					</style>
                    <div class="row" style="color:#999999;">
                        <div class="col-xs-1" style="min-height:30px;"></div>
                        <div class="col-xs-1 num_cell" style="border-left:1px solid #999999;"><b>0</b></div>
                        <div class="col-xs-1 num_cell mild_cell"><b>1</b></div>
                        <div class="col-xs-1 num_cell mild_cell"><b>2</b></div>
                        <div class="col-xs-1 num_cell mild_cell"><b>3</b></div>
                        <div class="col-xs-1 num_cell mod_cell" ><b>4</b></div>
                        <div class="col-xs-1 num_cell mod_cell" ><b>5</b></div>
                        <div class="col-xs-1 num_cell mod_cell" ><b>6</b></div>
                        <div class="col-xs-1 num_cell sev_cell" ><b>7</b></div>
                        <div class="col-xs-1 num_cell sev_cell" ><b>8</b></div>
                        <div class="col-xs-1 num_cell sev_cell" ><b>9</b></div>
                        <div class="col-xs-1 num_cell sev_cell" style="border-right:1px solid #999999"><b>10</b></div>
                    </div>  <!--/.row --> 
                    <div class="row">
                        <div class="col-xs-2" style="min-height:20px;"></div>  
                        <div class="col-xs-3 mild_cell" style="min-height:20px;"></div> 
                        <div class="col-xs-3 mod_cell"  style="min-height:20px;"></div>  
                        <div class="col-xs-4 sev_cell"  style="min-height:20px;"></div>  
                    </div>  <!--/.row -->               
                </div>   <!-- /.container  -->
                
                <div class="row">
    				<div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;padding-right:1em;">
    					<button type="button" class="button button-primary pull-right" style="margin-left:2em;" onclick="javascript:save_changes();">Save Changes</button>
            			<a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
        			</div>
				</div>  <!--/row-->
                
          </div>  <!-- /.report  -->
      </div>   <!-- /.tab-content -->       

</div>  <!--/class="col-xs-10"  right-side container div -->

<script type="text/javascript">
	var s_id = <?php echo $s_id; ?>;
	var changed_items = ["s_id","symptom_id","symptom_name"];
	
	var resource_index = 1;
	function add_resource(){
		
		var html = 	'<div id="resource_'+resource_index+'" class="row" >'+
					'	<div class="col-xs-3">'+  
					'		<div class="form-group">'+
					'			<label for="infoname_'+resource_index+'" style="font-weight:bold;">Information Source: </label>'+
					'			<textarea class="form-control resource_name" id="infoname_'+resource_index+'" name="infoname_'+resource_index+'"  placeholder="Enter Information Source" style="width:100%;padding-left:1em;" required /></textarea>'+
					'		</div>  <!-- /.form-group  -->'+
					'	</div>  <!--/.col-xs-3 -->'
					'</div>  <!--/.row -->';
		$("#resources").append(html);
		html = 		'	<div class="col-xs-3">'+  
					'		<div class="form-group">'+
					'			<label for="infotitle_'+resource_index+'" style="font-weight:bold;">Resource Title: </label>'+
					'			<textarea class="form-control resource_title" id="infotitle_'+resource_index+'" name="infotitle_'+resource_index+'" placeholder="Enter Resource Title" style="width:100%;padding-left:1em;" required /></textarea>'+
					'		</div>  <!-- /.form-group  -->'+
					'	</div>  <!--/.col-xs-3 -->';
		$("#resource_"+resource_index).append(html);			
		html = 		'	<div class="col-xs-6">'+    
					'		<div class="form-group">'+
					'			<label for="infourl_'+resource_index+'" style="font-weight:bold;">Resource URL: </label>'+
					'			<textarea class="form-control resource_url" id="infourl_'+resource_index+'" name="infourl_'+resource_index+'" placeholder="Enter Resource URL" style="width:100%;padding-left:1em;" required /></textarea>'+
					'		</div>  <!-- /.form-group  -->'+
					'	</div>  <!--/.col-xs-6 -->';
		$("#resource_"+resource_index).append(html);
		resource_index++;		
	} // end function add_resource
	
	function save_resources(){
		var html = '';
		var this_url = '';
		var display_url = '';
		for(var i=0;i<resource_index;i++){
			//make sure http:// is at the beginning of the URL
			this_url = '';
			display_url = '';
			if($("#infourl_"+i).val() > ''){  //check for any value
				var url_array = $("#infourl_"+i).val().split("://");
				if(url_array.length > 1){ 
				//alert(url_array.toString());
					this_url = "http://"+ url_array[1]; 
					display_url = url_array[1]; 
				}else{ 
					this_url = "http://"+$("#infourl_"+i).val(); 
					display_url = $("#infourl_"+i).val(); 
				}
			} //if($("#infourl_"+i).val() > '')
			
			html += '<p><span class="item_title">'+
					 $("#infoname_"+i).val()+': </span><a href="'+
					 this_url+'" target="_blank">'+
					 $("#infotitle_"+i).val()+'</a><br/><span id="more_info_url"><a href="'+
					 this_url+'" target="_blank">'+
					 display_url+'</a></span></p>';
		}// for i
		//alert(html);
		var serial_items = {sid:$("#sid").val(),symptom_id:$("#symptom_id").val(),symptom_name:$("#symptom_name").val(),info_001:html};
		$.post("<?php echo base_url().'/symptoms/updatesymptom'; ?>",
					serial_items,
					//{ s_id:s_id, label:$("#display_name").val(),sort_name:$("#sort_name").val() },
					function(data){
						if(data){
							alert("Your changes have been saved.");
							//window.location.reload(true);
						}else{
							alert("There was a problem updating the name.");
						}// if(data)
					},
					"text"); //post
	}//end function save_resources
		
	function save_changes(){
		//alert(changed_items.toString());
		var serial_items = {};
		for(var i=0;i<changed_items.length;i++){
			var key = changed_items[i];
			switch(key){
				case "s_id":
				case "symptom_id":serial_items[key] = $("#"+key).val(); break;
				case "symptom_name": //symptom_name must be returned as "label"
					serial_items["label"] = $("#"+key).val(); break;
				default: //alert(key+'--'+$("#"+key).html()); 
					serial_items[key] = $("#"+key).html();
				break;
			} //switch
		} //for
		
		$.post("<?php echo base_url().'/symptoms/updatesymptom'; ?>",
					serial_items,
					//{ s_id:s_id, label:$("#display_name").val(),sort_name:$("#sort_name").val() },
					function(data){
						if(data){
							alert("Your changes have been saved.");
							//window.location.reload(true);
						}else{
							alert("There was a problem updating the name.");
						}// if(data)
					},
					"text"); //post
		
	} //function
		
	function make_changed_items(id){
			if($.inArray(id, changed_items) == -1){  //check to see if this name is already in the array
				changed_items.push(id);
				//alert(changed_items.toString());
			}
		}
	
	function set_tinymce(target){
		$(".tinymce").css("background-color","initial");
		$(".tinymce").css("border","none");
		$(target).css("border","1px solid #CCCCCC");
		$(target).css("background-color","#f8f8f8");

	//		set tinymce
			tinymce.init({
				selector: target,
				inline:true,
				readonly:false,
				entity_encoding : "raw",
				//content_css : '<?= config_item('base_uri'); ?>/assets/css/bootstrap.css',
				menubar: "edit view insert format",
				plugins: [ 'autolink lists link textcolor', 'table  paste', 'code'  ],
  				toolbar: 'undo redo | bold italic forecolor backcolor | bullist numlist outdent indent | code ',
				init_instance_callback: function (editor) {
					$(target).focus();
					$(target).trigger('click');
					editor.on('Change', function (e) {
						var this_id = editor.id;
						make_changed_items(this_id);
					});
//					editor.on('SetContent', function (e) {
//					  console.log(e.content);
//					});
				  }
			});
		$(target).focus();
	}

	
	$(document).ready(function() {
		//get the number of resource items
		resource_index = <?= $info_num ?>;
		if(resource_index < 0){resource_index = 0;}
		
		//$(".namechange").on('change', function(event){
//			$.post("<?php echo base_url().'/symptoms/updatename'; ?>",
//					{ s_id:s_id, label:$("#display_name").val(),sort_name:$("#sort_name").val() },
//					function(data){
//						if(data){
//							window.location.reload(true);
//						}else{
//							alert("There was a problem updating the name.");
//						}// if(data)
//					},
//					"text"); //post
//		});//on change
		
		$(".text_item").on('change', function(event){
			var this_id = $(this).attr("id");
			make_changed_items(this_id);
		});
		
		
		
		

		//convert_for_tinymce();
		
		//updatename form submit
		$("#updatename_form").submit(function(e) {
			//prevent Default functionality
        	e.preventDefault();
			$.post("<?php echo base_url().'/symptoms/updatename'; ?>",
					$( this ). serialize(),
					//{ s_id:s_id, label:$("#display_name").val(),sort_name:$("#sort_name").val() },
					function(data){
						if(data){
							window.location.reload(true);
						}else{
							alert("There was a problem updating the name.");
						}// if(data)
					},
					"text"); //post
			});//submit	
		
			
	//	//form/submit
//		$("#_form").submit(function(e) {
//			//make tinymce save form data
//			tinymce.triggerSave();
//        	//prevent Default functionality
//        	e.preventDefault();
//			var serial_items = {};
//			for(var i=0;i<changed_items.length;i++){
//				//serial_items[changed_items[i]] = $( "input[name='"+changed_items[i]+"']" ).val(); 
//				serial_items[changed_items[i]] = $( "#"+changed_items[i] ).val(); 
//			}
//			$.post("<?php echo base_url().'/symptoms/updatesymptom'; ?>",
//					serial_items,
//					function(data){
//						alert("Symptom has been updated");
//						//window.location = "<?php echo base_url().'cancertypes/index/'.$c_id; ?>";
//					}, //function
//					"text"
//			);//post
//		});//submit
		
	}); //document.ready
</script>