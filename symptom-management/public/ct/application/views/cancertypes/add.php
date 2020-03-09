<style>
.row-gap {margin-top:1em;}
.symptoms {margin-top:1em;}
</style>
<div class="col-xs-10">  <!--right-side container div -->

	<div class="col-xs-12"><h3>Add New Cancer Type</h3></div>
	<form id="cancertype">
    <div class="row row-gap">
    	<div class="col-xs-12"><label>Name to display for this cancer type: </label><input type="text" id="label" name="label" value="" placeholder="Enter Cancer Name" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
	</div> <!--/row-->
    <div class="row row-gap">   
    	<div class="col-xs-12"><label>Connection code string (lower case, no spaces): </label><input type="text" id="cancer" name="cancer" value="" placeholder="Enter Cancer Code String" style="width:50%;margin-left:1em;padding-left:1em;" /></div>
    </div> <!--/row-->
    
    <div class="row row-gap">	
    	<div class="col-xs-12"><button type="submit" class="button button-primary pull-right">Submit</button></div>
	</div>  <!--/row-->
    
    </form>
    
    





</div>  <!--/class=col-xs-10 right-side container div -->

<script type="text/javascript">
	var c_id = <?php echo $c_id; ?>;
	$(document).ready(function() {
		$("#label").on('change', function(event){
			var codestring = ($( this ).val()).toLowerCase().replace(/\s/g, '');
			$("#cancer").val(codestring);
		});//on change
		
		$("#cancertype").submit(function(e) {
			//prevent Default functionality
        	e.preventDefault();
			$.post("<?php echo base_url()."cancertypes/add_new"; ?>",
				$("#cancertype").serialize(),
				function(data){
					if(data == "success"){
						alert("New Cancer Type Created.");
						location.reload(true);
					}else{
						alert(data);
					}
				},  //function
				"text"
			);//post
		});
		
	}); //document.ready
</script>