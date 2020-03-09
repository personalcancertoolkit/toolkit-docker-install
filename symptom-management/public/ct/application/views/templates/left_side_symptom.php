<!--<div class="container" style="margin-left:0;margin-top:10px;width:98%;"> -->
<div class="container-fluid" style="margin-top:10px;margin-left:0;margin-right:1em;">
	<div class="row">
    	<div class="col-xs-2 hidden-print" style="background-color:#eeeeee;margin-right:0;padding-left:0;padding-right:0;">
        	<div id="menu" style="padding-left:0;margin-left:0;margin-right:0;min-height:200px;">
            	<div style="text-align:center;margin-top:1em;width:100%;">CANCER TYPES</div>
                <ul style="list-style: none;margin-left:0;margin-right:0;padding-left:2em;">
                	
                <?php
					foreach($cancertypes as $c){
						$background = '';
						if($c_id == $c["id"]){$background = 'background-color:#FFFFFF;';}
						echo '
						<li style="padding-top:0.5em; padding-bottom:0.5em; padding-left:1em; padding-right:1em; margin-top:0.25em;'.$background.'"><a href="'.base_url().'/cancertypes/index/'.$c["id"].'">'.$c["label"].'</a></li>';
//						if($this_class == $class){
//							
//							foreach($submenu as $s){
//								//get the method name
//								$path_array = explode("/",$s["path"]);
//								$this_method = "";
//								if(count($path_array) > 1){$this_method = $path_array[1];}
//								//set the colors for links and background
//								$link_color = '';
//								if($s["included"] < 1){ $link_color = 'style="color:#999999;"'; }
//								$background = '';
//								if($this_method == $method ){$background = 'background-color:#FFFFFF;';}
//								echo '
//								<li style="padding-top:0.5em; padding-bottom:0.5em; padding-left:1em; padding-right:1em; margin-top:0.25em; margin-left:2em; font-size:0.8em; '.$background.'"><a id="sub_'.$s["id"].'" href="'.base_url().$s["path"].'" '.$link_color.'>'.$s["title"].'</a></li>';
//								$form_list["form_".$s["id"]] = $s["included"];
//							}
//						}
					} // foreach cancertypes
					reset($cancertypes);
					unset($c);
					$background = '';
					if($c_id == 0){$background = 'background-color:#FFFFFF;';}
					echo '<li style="padding-top:0.5em; padding-bottom:0.5em; padding-left:1em; padding-right:1em; margin-top:0.25em;"><a href="'.base_url().'/cancertypes/add">Add New Cancer Type</a></li>
						  <li style="padding-top:0.5em; padding-bottom:0.5em; padding-left:1em; padding-right:1em; margin-top:0.25em;'.$background.'"><a href="#">Create Symptom</a></li>
					';
				?>
                	
                </ul>
            </div>  <!-- /#menu -->
        </div>  <!-- /.   col-xs-2 --> 
        
        <script type="text/javascript">
			var form_list = [];
			<?php //echo 'form_list = '.json_encode($form_list).';';?>
		</script>
        
        <div id="form-container" class="col-xs-10 col-print-12"> <!-- closing tag found in templates/left_side_close  -->
        <div id="msg"></div> <!-- container for user messages about the form -->
        
        
        	