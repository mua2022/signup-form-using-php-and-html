
<?php
include('config.php');
error_reporting(0);
if(isset($_POST['submit']))
{$admno=$_POST['admno'];
$sname=$_POST['sname'];
$gnd=$_POST['gnd']; 
$course=$_POST['course']; 
$year=&$_POST['year'];
$sql="INSERT INTO  students(Admno,Sname,Gender,Course,Year) VALUES(:admno,:sname,:gnd,:course,:year)";
$query = $dbh->prepare($sql);
$query->bindParam(':StudentId',$StudentId,PDO::PARAM_STR);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':gnd',$gnd,PDO::PARAM_STR);
$query->bindParam(':course',$course,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your Registration was successful</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMS  AND PHP</title>
	<style type="text/css">
		body{
			background: teal;
			align-items: center;
			color: blue;
		}

	</style>
</head>
<body >
	<form name="submit" method="POST" >
		
	
	<div class="panel-heading" > MMU STUDENT DETAILS</div>
<table>
<div class="form-group">
<tr><td>	<label>ENTER YOUR NAME:</label></td>
	<td><input type="text" name="sname"></td></tr>
</div>
<div  class="form-group">
	<td><label>ADMISSION NUMBER</label></td>
	<td><input type="text" name="admno"></td></tr>
</div>
<div>
	<td><label>GENDER</label></td>
	<td><input type="radio" name="gnd" value="M">M
		<input type="radio" name="gnd" value="F">F
		<input type="radio" name="gnd" value="T">Transgender</td></tr>
</div>
<div>
	<td><label>COURSE</label></td>
	<td><input type="text" name="course"></td></tr>
</div>
<div>
	<td><label>YEAR OF ADMISSION</label></td>
	<td><input type="text" name="year"></td></tr>
</div></table>
<input type="submit" name="submit" value="SEND DATA" >
</form>

</body>
</html>
