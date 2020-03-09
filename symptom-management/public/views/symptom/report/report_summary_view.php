<!-- start page content  -->
<br/>
	<div class="container">
        <div class="row">
        	<div id="symptom-heading" class="col-xs-12">
            	<h3>Symptom Report Summary</h3>
                <p>Below is a summary of the Symptom Report you have just completed.  Click on any row to make corrections.</p>
            </div>  <!-- /#symptom-heading -->
        </div>  <!-- /.row -->
     	<div class="row">
			<div id="summary_table" class="col-md-12">
            <!-- BEGIN include inc/HFCC_report_summary.php -->
    		
            <form name="Concerns Report" action="javascript:alert(\'Thank you! Your answers have been saved.\')">
                <table id="quiz_table">
                    <thead id="summary_table_labels" valign="bottom"  >
                        <tr>
                            <th id="summary_label_column" colspan ="1" style="width:16%;text-align:center;">Symptom</th>
                            <th id="summary_label_column" colspan ="1" style="width:4%;"></th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;text-align:center;">Mild</th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;text-align:center;">Moderate</th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                            <th class="summary_heading_column" colspan ="2" style="width:16%;text-align:center;">Severe</th>
                            <th class="summary_heading_column" colspan ="1" style="width:8%;"></th>
                        </tr>
                    </thead>
                    <tbody><?php
					
	foreach($symptom_summary_array as $symptom){
		echo '
						<tr class="'.$symptom["tr_class"].'" onclick="javascript:get_page(\''.$symptom["seq"].'\');"><th class="summary_label">'.$symptom["s_name"].'</th>';

			switch ($symptom["response"]){
				case NULL:
				case 0:	echo '
							<td class="summary_label" colspan="1" style="font-size:0.5em;text-align:center;color:#999999;line-height:1.3;"><b>NO<br/>PROBLEMS</b></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
					break;
				case 1: echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MILD</b></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1" ></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
					break;
				case 2:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MILD</b></td>
							<td class="summary_mild_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1" ></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 3:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MILD</b></td>
							<td class="summary_moderate_bg" colspan="1" ></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 4:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MODERATE</b></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 5:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MODERATE</b></td>
							<td class="summary_moderate_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 6:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>MODERATE</b></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 7:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>SEVERE</b></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 8:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>SEVERE</b></td>
							<td class="summary_severe_bg" colspan="1"></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 9:	echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>SEVERE</b></td>
							<td class="summary_severe_bg" colspan="1"></td>';
						break;
				case 10:echo'
							<td class="summary_label" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_mild_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_moderate_graph" colspan="1">Severe</td>
							<td class="summary_moderate_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1"></td>
							<td class="summary_severe_graph" colspan="1" style="color:#ffffff;text-shadow:1px 1px 1px #999999;"><b>SEVERE</b></td>';
						break;
			}
			echo '
						</tr>';
		$counter ++;
	}	
?>
    
                    </tbody>
                </table>
                <br/>
        		<div id="custom_guide_link" >
					<input class="btn btn-primary center-block" id="report_button" type="button" value="Done" onclick="javascript:get_page('_003_003');" /><br/>
				</div>
            	<div id="print_btn">
                	<input type="button" value="Print This Page" onclick="window.print()" />
            	</div>  <!-- /#print_btn -->
            </form>  <!--  /Concerns Report -->
            </div> <!-- id="summary_table" class="col-md-12" -->
		</div>  <!-- /.row -->
	</div>  <!-- /#main_page.container -->
<!-- END include report_summary_view.php -->


