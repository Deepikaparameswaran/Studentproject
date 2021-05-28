<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <style>
     table
	  {

        border-style:solid;

        border-width:2px;

        border-color:black;

       }
</style>
<script language="javascript">

  function edit(stud_id,res_id,roll_id,name,email,mobile,dept,subject,mark,result,grade)
 {
    if(confirm("Are you sure you want to edit"))
	{
	$('#res_id').val(res_id);
	$('#action').val("edit");	
	$('#stud_id').val(stud_id);
	$('#roll_no').val(roll_id);
	$('#name').val(name);
	$("#name").prop("readonly", true);
	$('#emailid').val(email);
	$("#emailid").prop("readonly", true);
    $('#mobile_no').val(mobile);
	$("#mobile_no").prop("readonly", true);
	$('#mark_obtain').val(mark);
	$('#dept_list').val(dept);
	$("#dept_list").prop("readonly", true);
	$('#dept_list option:not(:selected)').attr('disabled', true);
	$("#subject").val(subject);

	$('#result').val(result);
	$('#grade').val(grade);
	$('.save_button').hide();
	$('.edit_button').show();
	}	
} 

function delete_data(stud_id,res_id,roll_id)
{
    if(confirm("Are you sure you want to delete"))
	{
	$.ajax({
						type	: 'POST',
						url		: 'function.php',
						data	: {'roll_no':roll_id,'res_id':res_id,'stuid':stud_id,'action': 'delete'},
						success	: function(response) {
							alert(response);
							location.reload();
							},
						error	: function(response) {
							console.log(response);
						},
					});
	}	
} 
</script>
	 
</head>
<body>

<?php 


    $sql1 = 'SELECT s.id as student_id,r.id as result_id,name,s.roll_no,mobile,email,Dept,subject,result,mark_obtain,grade FROM student s  join result r on
	s.roll_no=r.roll_no and s.id=r.id';
	$resultset=mysqli_query($db_connection,$sql1);
	$r_count=mysqli_num_rows($resultset);
		if($r_count>0)
		{?>
		<main id="main-content" class="clearfix" role="main">
			<div class="mt-container">
			<div class="overlay-timeout"></div>
				<div class="panel panel-default">
				<div class="panel-body" style="overflow-x:auto;padding:0px !important;">
				<table class="table table-bordered table-hover" style="margin-bottom:3px;">
				<thead>
		     	<th class="text-center text-wrap" style="background-color: #3b5998; color: #FFF;">S.No</th>
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Roll No</th>
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Studentname</th>
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Email</th>
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Mobile</th>
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Dept</th>		
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Subject</th>		
				<th class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Mark Obtain</th>		
				<th class="text-center text-wrap" style="background-color: #3b5998; color: #FFF;">Result </th>		
				<th class="text-center text-wrap" style="background-color: #3b5998; color: #FFF;">Grade </th>		
				<th colspan="2" class="text-center text-wrap" style="min-width: 100px;max-width: 100px;background-color: #3b5998; color: #FFF;">Option </th>		
				</tr>
				<?php  $i=1;
				while($row=mysqli_fetch_assoc($resultset)) 
				{
				$student_id=$row["student_id"];
				$result_id=$row["result_id"];
                $name=$row["name"];
                $roll_no=$row["roll_no"];
                $mobile=$row["mobile"];
                $email=$row["email"];
                $Dept=$row["Dept"];
                $subject=$row["subject"];
                $mark_obtain=$row["mark_obtain"];
                $result=$row["result"];
				if($result =='0')
				{
					 $result='PASS';
				}
				else
				{
					 $result='FAIL';
				}
                $grade=$row["grade"];
          ?>    <tbody class="table-body">	
				<td class="text-left text-wrap"><?php //echo $val['title'];?>
			<p class="item-title mod-title-tooltip" 
					 data-toggle="tooltip" data-placement="right" title="<?php echo $i; ?>">
						<?php  echo $i ; ?>		
							</p>						
						</td>
						<td class="text-left text-wrap" width="1px"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $roll_no?>">
								<?php echo $roll_no; ?>
							</p>
						</td>	
						<td class="text-left text-wrap" width="60%"><?php //echo $val['title'];?>
							<p class="item-title mod-title-tooltip" data-toggle="tooltip" data-placement="right" title="<?php echo $name; ?>">
								<?php echo $name; ?>
							</p>						
						</td>	
						<td class="text-left text-wrap" width="70%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $email?>">
								<?php echo $email; ?>
							</p>
						</td>						
						<td class="text-left text-wrap" width="50%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $mobile?>">
								<?php echo $mobile; ?>
							</p>
						</td>		
						<td class="text-left text-wrap" width="30%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $Dept?>">
								<?php echo $Dept; ?>
							</p>
						</td>	
						<td class="text-left text-wrap" width="40%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $subject?>">
								<?php echo $subject; ?>
							</p>
						</td>
						<td class="text-left text-wrap" width="10%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $mark_obtain?>">
								<?php echo $mark_obtain; ?>
							</p>
						</td>
						<td class="text-left text-wrap" width="10%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $result?>">
								<?php echo $result; ?>
							</p>
						</td>
						<td class="text-left text-wrap" width="10%"><?php //echo $val['path'];?>
							<p class="item-title mod-title-tooltip"  data-toggle="tooltip" data-placement="right" title="<?php echo  $grade?>">
								<?php echo $grade; ?>
							</p>
						</td>
						<td class="editrow" width="1%">
						<input type="button" class="btn btn-success btn-xs" data-student_id="<?php echo $student_id ?>"
						data-result_id="<?php echo $result_id ?>" data-roll_id="<?php echo $roll_no ?>"
						onclick="edit(<?php echo $student_id?>,<?php echo $result_id?>,<?php echo $roll_no?>,<?php echo "'$name'"?>,<?php echo "'$email'"?>
						,<?php echo $mobile?>,<?php echo "'$Dept'"?>,<?php echo "'$subject'"?>,<?php echo "'$mark_obtain'"?>,<?php echo "'$result'"?>,
						<?php echo "'$grade'"?>
						);" value="Edit"/>
						</td>
						
						<td class="deleterow" width="1%">
						<input type="button" class="btn btn-danger btn-xs" data-delete_id="<?php echo $val['id']; ?>"	
						onclick="delete_data(<?php echo $student_id?>,<?php echo $result_id?>,<?php echo $roll_no?>);" value="Delete"/>
						</td>			
						<?php $i++; ?>
												
					</tr>
				<?php }
				} ?>
				</tbody>
			</table>
	</div>
</div>
</div>
</main>
</body>
</html>	 
	 
	  
	  
	

