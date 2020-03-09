<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cancer Portal Configuration | <?php //echo $page_title; ?></title>
    <link href="<?= config_item('base_uri') ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= config_item('base_uri') ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?= config_item('base_uri') ?>/assets/css/forms.css">
    
    <script src="<?= config_item('base_uri'); ?>/assets/js/jquery-3.2.1.min.js" type="application/javascript"></script>
    <script src="<?= config_item('base_uri'); ?>/assets/js/bootstrap.min.js" type="application/javascript"></script>
    <script src="<?= config_item('base_uri'); ?>/assets/js/tinymce/tinymce.min.js"></script>
    
    <style> 
		/*.topnav, 
		.navbar-inverse .navbar-brand, .navbar-toggle, .navbar-header { color:#FFF;background-color:#09F; } !important
		*/
    </style>
    
    <script type="text/javascript">
    function convert_for_tinymce(){
			
			$("form textarea").each(function(index){ 
				var textarea = $( this );
				var attrs = {}; //empty list for attributes
				$.each(this.attributes, function(idx,attr){ attrs[attr.name] = attr.value; });//each.attributes
				attrs["class"] = "textareadiv tinymce";
				
				textarea.replaceWith(function(){
					return $("<div />",attrs).append(textarea.contents());
					//return $("<div />",attrs);
				});
			});//each text area
					
			var readonly = false;
//			if(! included){readonly = true;}
//			if(user_role < 1){readonly = true;}
			
			//set tinymce
			tinymce.init({
				selector: '.tinymce',
				inline:true,
				readonly:readonly,
				menubar: "edit insert format",
				plugins: [ 'autolink lists link textcolor', 'table  paste'  ],
  				toolbar: 'undo redo | bold italic forecolor backcolor | bullist numlist outdent indent ',
				init_instance_callback: function (editor) {
					editor.on('Change', function (e) {
					  //window.onbeforeunload = function() { return true;};
					});
				  }
			});
		}//end function
		
		function remove_symptom(cancer_id,symptom_id){
			$.post("<?php echo base_url()."cancertypes/remove_symptom";?>",
				{cancer_id:cancer_id, symptom_id:symptom_id},
				function (data){
					if(data = "success"){
						location.reload(true);
					}else{
						alert(data);
					}
				}, //close first callback function
		"text"); //close first $.post	
		}
		
		function remove_symptom_modal(cancer_id,symptom_id){
			$.post("<?php echo base_url()."cancertypes/remove_symptom";?>",
				{cancer_id:cancer_id, symptom_id:symptom_id},
				function (data){
					if(data = "success"){
						//jquery to update group modal
						$("#symptomrow_"+symptom_id).attr('onclick',"javascript:add_symptom('"+cancer_id+"','"+symptom_id+"');");
						$("#checkbox_"+symptom_id).html('<a><i class="fa fa-square-o fa-lg" aria-hidden="true"></i></a>');
						$("#action_"+symptom_id).html('<a>Add Symptom</a>');
					}else{
						alert(data);
					}
				}, //close first callback function
		"text"); //close first $.post	
		}
		
		function add_symptom(cancer_id, symptom_id){
			//alert("add symptom "+symptom_id+" from cancer type "+cancer_id);
				
			$.post("<?php echo base_url()."cancertypes/add_symptom";?>",
				{cancer_id:cancer_id, symptom_id:symptom_id},
				function (data){
					if(data = "success"){
						//jquery to update group modal
						$("#symptomrow_"+symptom_id).attr('onclick',"javascript:remove_symptom_modal('"+cancer_id+"','"+symptom_id+"');");
						$("#checkbox_"+symptom_id).html('<a><i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i></a>');
						$("#action_"+symptom_id).html('<a>Remove Symptom</a>');
					}else{
						alert(data);
					}
				}, //close first callback function
		"text"); //close first $.post	
			
		}
     </script>   
</head>

<body style="padding-top:50px;">

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="<?php echo base_url(); ?>/cancertypes">Cancer Portal Configuration Tool</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--<ul class="nav navbar-nav navbar-left">
                	<li id="settings"><a href="#" style="color:#FFF;">Settings</a></li>
                </ul>-->
                    
                <ul class="nav navbar-nav navbar-right">
                	<li id="create_symptom">
                    	<a href="<?php echo base_url(); ?>symptoms/create_symptom"><button type="button" id="create_symptom_btn" class="btn btn-sm btn-primary" style="margin-left:-1.2em;margin-right:1em;margin-top:-6px;margin-bottom:0;">Create Symptom</button></a>
                    </li> 
                    <!--<li id="login"><a href="<?php echo base_url(); ?>pages/logout" style="color:#FFF;">Log Out</a></li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>