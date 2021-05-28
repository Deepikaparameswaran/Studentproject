<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>	


<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-table.css">
<link rel="stylesheet" type="text/css" href="css/style.css?v=3.1">
<link rel="stylesheet" type="text/css" href="css/mticons.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.css">

<div class="row" style="margin: 0 auto; padding: 5px 0;">
			<h4> <center>STUDENT RECORD FORM</center></h4>
			</div><section class="content">
	<form id="student_form" method="post" onsubmit="form_validate()" enctype="multipart/form-data"  >
		<div class="panel panel-default collapse in" style="width:40%; margin: 0 auto;" id="filter">
			<div class="panel-body" style="margin:0 auto;">
			
				<input type="hidden" class="form-control" id="res_id" name="res_id">
				<input type="hidden" class="form-control" id="stuid" name="stuid">
				<input type="hidden" class="form-control" id="action" name="action">
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="roll_no">Roll No.</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter The Roll Number">
					</div>
				</div>
				
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="name">Name</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" id="name" name="name"   placeholder="Enter The Student Name">
					</div>
				</div>
				
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="emailid">Email Id*</label>
					</div>
					<div class="col-md-8">
						<input type="email" class="form-control" id="emailid" name="emailid"  placeholder="Enter The Email Address">
					</div>
				</div>
				
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="mobile_no">Mobile Number*</label>
					</div>
					<div class="col-md-8">
						<input type="tel" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter The Mobile Number">
					</div>
				</div>
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
				<div class="col-md-4">
                        <label for="dept_list">Department</label>
						</div>
					<div class="col-md-8">
                        <select name="dept_list" id="dept_list" class="form-control">
						    <option value="">Select Department</option>
							<option value="ECE">ECE</option>
                            <option value="CSE">CSE</option>
                            <option value="IT">IT</option>
                            <option value="EEE">EEE</option>
                            <option value="EIE">EIE</option>
                            <option value="MECH">MECH</option>
                            <option value="CIVIL">CIVIL</option> 											
                        </select>
						</div>
					</div>
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
                        <label for="subject">Subject</label>
						</div>
						<div class="col-md-8">
                        <select name="subject" id="subject" class="form-control">
							<option value="">Select Subject</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="PSP">PSP</option>
                            <option value="JAVA">JAVA</option>
                            <option value="M1">M1</option>
                            <option value="BEEE">BEEE</option>
                            <option value="MECH">MECH</option>
                            <option value="CIRCUIT THEORY">CIRCUIT THEORY</option> 											
                        </select>
					</div>
				</div>
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="mark_obtain">Mark Obtain*</label>
					</div>
					<div class="col-md-8">
						<input type="number" class="form-control" id="mark_obtain" name="mark_obtain" onchange="autofill()" placeholder="Enter The Student Mark">
					</div>
				</div>
				
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="result">Result*</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" id="result" name="result" readonly placeholder="Student Result">
					</div>
				</div>
				
				<div class="row" style="margin: 0 auto; padding: 5px 0;">
					<div class="col-md-4">
						<label for="grade">Grade**</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" id="grade" name="grade" readonly placeholder="Student Grade">
					</div>
				</div>				
				
				<div style="padding: 5px 0;">
					<div style="margin-left: 40%;">
					<span class="save_button">
						<button type="submit" class="btn btn-success btn-sm" id="save_form_btn">Add</button>
						</span>
						<span class="edit_button" style="display:none">
						<button type="edit" class="btn btn-success btn-sm" id="edit_form_btn">Update</button>
						</span>	
						<button type="reset" id="enquiry-form-reset" name="reset" class="btn btn-danger btn-sm" style="margin-left: 10px;">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
<br>
<?php  include "db_connect.php"; 
 include "view_results.php"; ?>

<script>

function autofill(){
    var x = document.getElementById('mark_obtain').value;
    if(x>90 && x<=100)
    {
        document.getElementById('result').value= 'Pass';
        document.getElementById('grade').value= 'S';
    }
	else if(x>80 && x<=90)
    {
        document.getElementById('result').value= 'Pass';
        document.getElementById('grade').value= 'A+';
    }
	else if(x>70 && x<=80)
    {
        document.getElementById('result').value= 'Pass';
        document.getElementById('grade').value= 'A';
    }
	else if(x>60 && x<=70)
    {
        document.getElementById('result').value= 'Pass';
        document.getElementById('grade').value= 'B';
    }
	else if(x>50 && x<=60)
    {
        document.getElementById('result').value= 'Pass';
        document.getElementById('grade').value= 'C';
    }
	else if(x>=0 && x <=50)
    {
        document.getElementById('result').value= 'Fail';
        document.getElementById('grade').value= 'F'
    }
	else{
		alert('Please Enter Marks Between 0 to 100');
	}
	
	
}


function form_validate()
{
	var roll_no=document.getElementById("roll_no").value;
	var name=document.getElementById("name").value;
	var email=document.getElementById("emailid").value;
	var mobileno=document.getElementById("mobile_no").value;
	var deptlist=document.getElementById("dept_list").value;
	var subject=document.getElementById("subject").value;
	var marks=document.getElementById("mark_obtain").value;	
	if(roll_no=='' || name=='' || email== '' || mobileno=='' || deptlist== '' || subject== '' || marks=='')
	  
	  {
		 alert('Please fill all the fields');
      }
	  else
	  {
		    event.preventDefault();
		    var url = "function.php"; 
			var form =$("#student_form").serialize();
				$.ajax({
					url: url,
					data: form, 
					type: 'post',
					success	: function(response) {
                    alert(response);
					location.reload();
					},	
					error	: function(response) {
						console.log(response);
						console.log('not hi');

					},					
		  
		  
	  });
	  
}
}






</script>