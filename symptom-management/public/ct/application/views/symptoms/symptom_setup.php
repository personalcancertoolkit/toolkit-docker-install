<!-- NOTES: provide a good heading for creating a new symptom, with an explanation that symptom sort names must be unique.  Provide a list of existing sort names.  -->

<style>
.row-gap {margin-top:1em;}
label {font-weight:normal;}
legend {font-size:1.15em;font-weight:bold;margin-left:-2em;padding-top:20px;border-bottom:1px solid #999;} 
fieldset {margin-left:5em;}
.textareadiv{ border:1px solid #DDD; border-radius:5px; padding:0.75em; font-weight:normal; }
</style>
        <div class="col-xs-10">  <!--right-side container div -->
            <div class="row">
                <div class="col-xs-12"><h3>Create New Symptom: Symptom Set-up</h3></div>
            </div>  <!--/row-->        
            <div class="row"> 
                <div class="col-xs-12">   
                <p>This is the initial step for creating a new symptom.  The symptom has a display name (which is what users of the project will see), and a sort name, which must be unique.  The sort name determines the order in which the symptom is displayed in a list, and it provides a unique key to identify this particular symptom, even though it may have the same display name as another symptom.  If you need to provide unique symptom management advice for patients who have different cancer types, you can use this feature to make a slightly different version of the symptom for a particular cancer type.</p>
                <p>You can see existing display names and sort names below.  Sort names may contain lower-case alpha-numeric characters and underscores.  Spaces are not allowed.</p>
                </div>  <!-- /.col-xs-12  -->
            </div>  <!--/row-->    
            <form id="symptom_form" method="post" action="<?php echo base_url().'/symptoms/symptom_setup'; ?>">
            <div class="row">
                <div class="col-xs-12">
                
                <fieldset>
                <legend >Symptom Name</legend>
                    <div class="form-group"><label>Name to display for this symptom: </label><input type="text" id="display_name" name="display_name" value="" placeholder="Enter Symptom Name" style="width:50%;margin-left:1em;padding-left:1em;" required /></div>
                    <div class="form-group"><label>Sort-order name for this symptom: </label><input type="text" id="sort_name" name="sort_name" value="" placeholder="Enter Sort Name" style="width:50%;margin-left:1em;padding-left:1em;" required /></div>
                </fieldset>
                
                <div class="row">
                    <div class="col-xs-12" style="margin-top:2em;margin-bottom:3em;">
                        <button type="submit" class="button button-primary pull-right" style="margin-left:2em;">Submit</button>
                        <a href="<?php echo base_url().'cancertypes/index/'.$c_id; ?>"><button type="button" class="button pull-right">Cancel</button></a>
                    </div>  <!-- /.col-xs-12  -->        
                </div>  <!--/row-->
              </div>  <!-- /.col-xs-12  -->        
            </div>  <!--/row-->
            </form> 
            <div class="row row-gap">
            	<div class=col-xs-12><b>Existing Symptom Display Names</b> (with sort names).</div>
            </div>  <!--/row-->
            <div class="row row-gap">
    <?php 
		foreach($all_symptoms as $s){
			echo'
			<div class="col-xs-4 symptoms"><b>'.$s["display_name"].'</b> ('.$s["sort_name"].')</div>';
				
		}//foreach
	?>
    </div>  <!--/row-->
            </div> <!-- /.col-xs-10  --> 
        </div> <!--/row-->  
   </body>  <!--/row--> 
   <script type="text/javascript">
		$(document).ready(function() {
			//form/submit
			$("form").submit(function(e) {
				//prevent Default functionality
				e.preventDefault();
				$.post("<?php echo base_url().'/symptoms/symptom_setup'; ?>",
						$("form").serialize(),
						function(data){
							if(data.status == 'success'){
								alert("Symptom Set-up for symptom "+data.display_name+" was successful.  Proceed to edit the symptom information.");
								window.location = "<?php echo base_url().'symptoms/index/'; ?>1/"+data.id;
							}else{
								alert(data.message);
							}
						}, //function
						"json"
				);//post
			});//submit
		});  //document.ready
	
	</script>
</html>  <!--/row-->   