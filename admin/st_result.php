<?php
session_start();
require_once('functions/ddbconfig.php');				
	require_once('functions/functions.php');
	$user = new login_registration_class();
	
?>	
<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
			<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {background-color: #008CBA;border-radius:60px;} /* Blue */
.button3 {background-color: #black;border-radius:60px; padding: 8px 10px;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;border-radius:60px;} /* Gray */ 
.button5 {background-color: #555555;border-radius:60px; padding: 8px 10px;} /* Black */
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 84%;
}

td, th {
    border: 1px solid blue;
    text-align: middle;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
	</head>
	<body >
			
					
				<div class="container">
				<div class="b">	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				University management system</p></font>
				
<div class="secondthree">
					<div class="FIRST">
						<ul><b>
							<li><a href="index.php"><p><font color="red"><img src="../img/h.png" width="16" height="16" align="right"/>Home</p></a></center></li>
							<li><a href="#"><img src="../img/i.png" width="16" height="16" align="right"/>About</a></center></li>
							<li><a href="#"><img src="../img/a.png" width="20" height="20" align="right"/>Administration</a></center></b>
							
						<div class="SEC">
								<ul>
								
								<li><a href="Admin_log.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Admin login</a>
								<li><a href="srch.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Search Student</a>
								<li><a href="view3.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Student Details</a>
								<li><a href="update.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Update Student registration</a>
								</ul>
								</div>
							
								<b>
								<li><a href=""><img src="../img/ac.png" width="20" height="20" align="right"/>Academic</a></center></li>
								<li><a href=""><img src="../img/f.png" width="18" height="18" align="right"/>Faculty</a></center></li>
								<li><a href=""><img src="../img/add.png" width="18" height="18" align="right"/>Admission</a></center></li>
								<li><a href=""><img src="../img/std.png" width="20" height="20" align="right"/>Student</a></center></b>
								<div class="SEC">
								<ul>
								<li><a href="std_reg.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student Registration</a>
								<li><a href="std_log.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student login</a>
								<li><a href="st_result.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student Result</a>
								</ul>
								</div>
							
								</li>
								
								<b>
								<li><a href=""><img src="../img/in.png" width="18" height="18" align="right"/>International</a></center></li>
								<li><a href=""><img src="../img/oth.png" width="16" height="16" align="right"/>Other</a></center></li>
								</b>
								</ul>
							</div>
					
				
<div class="all_student fix">
		
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Add Result</th>
				<th style="text-align:center;">view Result</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['Name'];?></td>
				<td><?php echo $rows['id'];?></td>
				<td><a href="add_result.php?ar=<?php echo $rows['id']; ?>&vn=<?php echo $rows['Name'];?>">Add Result</a></td>
				<td><a href="view_result.php?vr=<?php echo $rows['id']; ?>&vn=<?php echo $rows['Name'];?>">View Result</a></td>
			</tr>
			<?php } ?>
	
		</table>

		
</div>
