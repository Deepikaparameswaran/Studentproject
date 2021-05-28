<?php
global $_REQUEST,$db_connection;

$db_connection=mysqli_connect("localhost","root","","studentresult");
if(!$db_connection)
{
$connected='Database Not Connected';
	
}
if(isset($_POST['roll_no']))
{
 $roll_no=$_POST['roll_no'];
}
if(isset($_POST['name']))
{
 $name=$_POST['name'];
}
if(isset($_POST['action']))
{
 $action=$_POST['action'];
}
if($action =='')
{
	$action='insert';
}
if(isset($_POST['res_id']))
{
 $res_id=$_POST['res_id'];
}
if(isset($_POST['stuid']))
{
 $stuid=$_POST['stuid'];
}
if(isset($_POST['emailid']))
{
 $emailid=$_POST['emailid'];
}
if(isset($_POST['mobile_no']))
{
 $mobile_no=$_POST['mobile_no'];
}
if(isset($_POST['dept_list']))
{
 $dept_name=$_POST['dept_list'];
}
if(isset($_POST['subject']))
{
 $sub_name=$_POST['subject'];
}
if(isset($_POST['mark_obtain']))
{
 $mark_obtain=$_POST['mark_obtain'];
}
if(isset($_POST['result']))
{
 $result=$_POST['result'];
}
if(isset($_POST['grade']))
{
 $grade=$_POST['grade'];
}

if(isset($result)){
if($result == 'Pass')
{
	$res_name='1';
}
else
{
    $res_name='0';

}
}
   $duplicate=0;

if($action !='delete')
{
$selection="select * from student where roll_no= '".$roll_no."' and name ='".$name."' and email ='".$emailid."' and mobile = '".$mobile_no."' and Dept = '".$dept_name."'";
$studentset=mysqli_query($db_connection,$selection);
$student_count=mysqli_num_rows($studentset);
$selection_result ="select * from result where roll_no= '".$roll_no."' and subject ='".$sub_name."' and mark_obtain ='".$mark_obtain."' and result = '".$res_name."' and grade = '".$grade."'";
$resultset=mysqli_query($db_connection,$selection_result);
$resultcount=mysqli_num_rows($resultset);

if($student_count>0 &&$resultcount )
{
   $duplicate=1;
}	
else
{
   $duplicate=0;
}
}
if($duplicate ==1 && $action !='delete')
{
echo 'Data Already exists.Kindly check';
}
else if($duplicate ==0 && $action =='insert')
{
$query_student="INSERT INTO `student`(`id`, `roll_no`, `name`, `email`, `mobile`, `Dept`) VALUES ('','".$roll_no."','".$name."','".$emailid."','".$mobile_no."','".$dept_name."')";
$db_insert_student=mysqli_query($db_connection,$query_student);

$query_result="INSERT INTO `Result`(`id`, `roll_no`, `subject`, `mark_obtain`, `result`, `grade`) VALUES ('','".$roll_no."','".$sub_name."','".$mark_obtain."','".$res_name."','".$grade."')";
$db_insert_result=mysqli_query($db_connection,$query_result);

if($db_insert_student && $db_insert_result)
{
echo 'Data inserted successfully';
}
else
{
echo 'Data not inserted.Kindly check';
}
}

else if($duplicate ==0 && $action =='edit')
{
$query_student="Update `student` set `roll_no`= '".$roll_no."' , `name` = '".$name."', `email` ='".$emailid."', `mobile` = '".$mobile_no."', `Dept` = '".$dept_name."' where id = '".$stuid."' ";
$db_update_student=mysqli_query($db_connection,$query_student);

$query_result="Update `result` set `roll_no`= '".$roll_no."' , `subject` = '".$sub_name."', `mark_obtain` ='".$mark_obtain."', `result` = '".$res_name."', `grade` = '".$grade."' where id = '".$res_id."' ";
$db_update_result=mysqli_query($db_connection,$query_result);

if($db_update_student && $db_update_result)
{
echo 'Data Updated successfully';
}
else
{
echo 'Data not Updated.Kindly check';
}
}

else if($action =='delete')
{
	$delete_query_student="DELETE FROM student where id = '".$stuid."' and roll_no='".$roll_no."'";
	$delete_student=mysqli_query($db_connection,$delete_query_student);
	$delete_query_result="DELETE FROM student where id = '".$res_id."'  and roll_no='".$roll_no."'";
	$delete_result=mysqli_query($db_connection,$delete_query_result);
	if($delete_student && $delete_result)
	{
	echo 'Data Deleted successfully';
	}
	else
	{
	echo 'Data not Deleted.Kindly check';
	}
}	


?>





