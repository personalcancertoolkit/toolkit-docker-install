<style>
.row-gap {margin-top:1em;}
.symptoms {margin-top:1em;}
</style>
<div class="col-xs-10">  <!--right-side container div -->
<?php 
	$display_name = '';
	
	foreach($cancertypes as $c){
		
		if($c_id == $c["id"]){
			echo '
		<div class="col-xs-12"><h3>'.$c["label"].'</h3></div>'; 
		$display_name = $c["label"];
		}
		
	}//foreach
?>
    <div class="col-xs-12"><label>Name to display for this cancer type: </label><input type="text" id="cancername" name="cancername" value="<?php echo $display_name; ?>" placeholder="Enter Cancer Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
    
    <div class="row row-gap">
        <div class="col-xs-12"><h4 style="text-align:center;">Symptom Management List</h4></div>
    </div>  <!--/row-->
	<div class="row row-gap">
    <?php 
		foreach($symptoms as $s){
			$remove = '';
			if($c_id > 1){
				$remove = '<button type="button" class="btn btn-default btn-xs" onclick="javascript:remove_symptom(\''.$c_id.'\',\''.$s["symptom_id"].'\');" style="font-size:0.45em;margin-left:1.5em;padding:0.05em;" >REMOVE</button>';
			
			}
			echo'
			<div class="col-xs-4 symptoms"><a href="'.base_url().'symptoms/index/'.$c_id.'/'.$s["symptom_id"].'">'.$s["display_name"].'</a>'.$remove.'</div>';
				
		}//foreach
		echo'
			</div>  <!--/row-->';
			
		if($c_id > 1){
		echo'
				<div class="row row-gap">	
					<div class="col-xs-12"><a href="#" data-toggle="modal" data-target="#add_symptom_modal" ><button class="button button-primary pull-right">Add a Symptom</button></a></div>
				</div>  <!--/row-->';
		} //if
	?>
    





</div>  <!--/class="col-xs-10"  right-side container div -->

<script type="text/javascript">
	var c_id = <?php echo $c_id; ?>;
	$(document).ready(function() {
		$("#cancername").on('change', function(event){
			$.post("<?php echo base_url().'/cancertypes/updatename'; ?>",
					{ c_id:c_id, label:$(this).val() },
					function(data){
						if(data){
							window.location.reload(true);
						}else{
							alert("There was a problem updating the name.");
						}// if(data)
					},
					"text"); //post
		});//on change
		
		$("#finished").on('click', function(event){
			window.location.reload(true);
		}); //finished on click
		
	}); //document.ready
</script>

    <!-- ------------------------------------ ADD NEW SYMPTOM MODAL------------------------------------ -->      


<div class="modal fade" id="add_symptom_modal" tabindex="-1" role="dialog" aria-labelledby="add_symptom_modalLabel">
  <div class="modal-dialog modal-lg modal-drop" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_symptom_modalLabel">Add New Symptom</h4>
      </div> <!-- /.modal-header -->
      <div class="modal-body">
      	<div id="error_msg" role="alert"></div>  

          <h2>Symptoms</h2> 
           <?php if(!empty($all_symptoms)) {?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th style="width:20%;">Current Symptom</th>
        <th>Symptom Name</th>
       <th style="width:20%;text-align:center;">Actions</th>
      </tr>
    </thead>
    <tbody id="group_list">
    <?php 
	$counter = 0;
    foreach($all_symptoms as $s) { 
		$is_current = false;
		foreach($symptoms as $current){
			if($s["symptom_id"] == $current["symptom_id"]){ $is_current = true; }
		}//foreach		
		$row_onclick = 'onclick="javascript:add_symptom(\''.$c_id.'\', \''.$s["symptom_id"].'\');" style="cursor:hand;cursor:pointer;"';
		$checkbox = '<a><i class="fa fa-square-o fa-lg" aria-hidden="true"></a></i>';
		$action = '<a>Add Symptom</a>';
		if($is_current){
			$row_onclick = 'onclick="javascript:remove_symptom(\''.$c_id.'\', \''.$s["symptom_id"].'\');" style="cursor:hand;cursor:pointer;"';
			$checkbox = '<a><i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i></a>'; 
			$action = '<a>Remove</a>';
		}
	?>
    <!-- only draw the symptoms we can add -->
    <?php if(! $is_current){ $counter++; ?>	
      <tr id="symptomrow_<?php echo $s["symptom_id"]; ?>" <?php echo $row_onclick; ?> >
        <td id="checkbox_<?php echo $s["symptom_id"]; ?>"> <?php echo $checkbox ?> </td>
        <td><?php echo $s["display_name"] ?> </td>
        <td id="action_<?php echo $s["symptom_id"]; ?>" style="text-align:center;"><?php echo $action ?></td>
    <?php } ?>  
        
	<?php } ?>  <!--foreach-->
      </tr>
    </tbody>
  </table>
  <?php }  ?><!--if(!empty($all_symptoms))-->
  
  <?php if($counter < 1){
	  echo'
  		<div class="alert alert-info" role="alert"><strong>No Symptoms were found.</strong></div>';
  } ?>
  
             

    	<div class="row row-gap">
        	<div class="col-xs-12">
              <button id="finished" type="button" class="btn btn-success pull-right" style="margin-right:1em;"  data-dismiss="modal" aria-label="Finished">Finished</button>
              <button type="button" class="btn btn-default pull-right" style="margin-right:1em;" data-dismiss="modal" aria-label="Cancel">Cancel</button>
        	</div>  <!-- /.col-xs-12 (BUTTON) -->
    	</div> <!-- /.row row-gap  -->
        
  		</div> <!-- /.modal-body --> 
	  </div>   <!-- /.modal-content -->
   </div>   <!-- /.modal-dialog -->
</div>	 <!-- /.modal (container) -->
