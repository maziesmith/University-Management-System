<?php
require_once("functions/dbconfig.php");
require_once("functions/functions.php");
$user = new cls_func(); 

?>

<!DOCTYPE HTML>
<html class="no-js" lang="">
    <head>
			<meta charset="utf-8">
			<title>University management system</title>
			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/style1.css" rel="stylesheet" type="text/css" />
			<link href="css/style2.css" rel="stylesheet" type="text/css"/>
			 <link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload.css">
			<link rel="stylesheet" href="plugins/file-uploader/css/jquery.fileupload-ui.css">
		<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>

		<script>
			function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
	

   // setTimeout(function(){
  // window.location.reload(1);
//}, 5000);
	</script>
	
	</head>				
	<body >
			
				<div class="b">	
				
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="../img/logo.png" width="140" height="140"  alt="Silver logo" align="middle"/> 
				<font size="+4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Registration</p></font>
				
				<div class="secondthree">
					<div class="FIRST">
						<ul><b>
							<li><a href="index.php"><p><font color="red"><img src="../img/h.png" width="16" height="16" align="right"/>Home</p></a></center></li>
							<li><a href="#"><img src="../img/i.png" width="16" height="16" align="right"/>About</a></center></li>
							<li><a href="#"><img src="../img/a.png" width="20" height="20" align="right"/>Administration</a></center></b>
							
							<div class="SEC">
								<ul>
								
								<li><a href="Admin_log.php"><img src="../img/arr.png" width="15" height="15" align="left"/>Admin login</a>
								
								</ul>
								</div>
							
								<b>
								<li><a href=""><img src="../img/ac.png" width="20" height="20" align="right"/>Academic</a></center></li>
								<li><a href=""><img src="../img/f.png" width="18" height="18" align="right"/>Faculty</a></center></li>
								<li><a href=""><img src="../img/ad.png" width="18" height="18" align="right"/>Admission</a></center></li>
								<li><a href=""><img src="../img/std.png" width="20" height="20" align="right"/>Student</a></center></b>
								<div class="SEC">
								<ul>
								<li><a href="std_reg.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student Registration</a>
								<li><a href="std_log.php"><img src="../img/arr.png" width="18" height="18" align="left"/>Student login</a>
								</ul>
								</div>
							
								</li>
								
								<b>
								<li><a href=""><img src="../img/in.png" width="18" height="18" align="right"/>International</a></center></li>
								<li><a href=""><img src="../img/oth.png" width="16" height="16" align="right"/>Other</a></center></li>
								</b>
								</ul>
							</div>
					<div class="MIDDLE1">


					<center>
					<table border="4" cellpadding="0"
					cellspacing="0" width="40%" height="20%" align="middle";>
					<td>

					
						<img src="../img/std.png" width="20" height="20" align="middle"/>
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST"){
			//$name = $id = $prog = $password = $dob = $bg = $email = $father = $addr = $phone = $fileName= "";
							
							/*image start*/
													
						function guid() {
						   if (function_exists('com_create_guid')) {
									return com_create_guid();
								} else {
									mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
									$charid = strtoupper(md5(uniqid(rand(), true)));
									$hyphen = chr(45); // "-"
									$uuid = chr(123)// "{"
											. substr($charid, 0, 8) . $hyphen
											. substr($charid, 8, 4) . $hyphen
											. substr($charid, 12, 4) . $hyphen
											. substr($charid, 16, 4) . $hyphen
											. substr($charid, 20, 12)
											. chr(125); // "}"
									return $uuid;
								}
						}
							if($_FILES["personal_image"]["name"])
							{
								  $path_parts = pathinfo($_FILES["personal_image"]["name"]);
										  $ext = $path_parts['extension'];
										  $fileName = trim(guid(), '{}') . '.' . $ext;
							}

					move_uploaded_file($_FILES['personal_image']['tmp_name'], "../images/$fileName");

							/* image ends*/
							
							$name = $_POST['Name'];
							$id = $_POST['id'];
							$prog = $_POST['Program'];
							$password = $_POST['password'];
							$dob = $_POST['DOB'];
							$bg = $_POST['Blood_Group'];
							$email = $_POST['Email'];
							$father= $_POST['Father_Name'];
							$addr = $_POST['Full_Address'];
							$phone = $_POST['Phone_no'];		
							
						
		
						
						$register = $user->data_insert($name,$id,$prog,$password,$dob,$bg,$email,$father,$addr,$phone,$fileName);
						if($register){
							echo "<h3 style='text-align:center;color:green'>Registration Successful</h3>";
						}else{
							echo "<h3 style='text-align:center;color:green'>Id already exist</h3>";
						}
					}
						?>	
						
					<form action="" method="POST" enctype="multipart/form-data">
						<center>	<table >
								<tr>
									<td>Name:</td>
									<td><input type="text" name="Name" placeholder="Full Name"required autofocus /></td>
								</tr>
								<tr>
									<td>ID:</td>
									<td><input type="text" name="id" placeholder="15103056"required autofocus /></td>
								</tr>
								<tr>
									<td>Program:</td>
									<td>
										<select name="Program">
											<option  value="BCSE">BCSE</option> 
											<option value="BSEE">BSEEE</option> 
											<option value="BSME">BSME</option> 
											<option value="BSAg">BSAg</option> 
											<option value="BATHM">BATHM</option> 
											<option value="BSCE">BSCE</option> 
											<option value="BBA">BBA</option> 
										</select>
									</td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="password" placeholder=""required autofocus/></td>
								</tr>
								
								
								<tr>
									<td>Date of Birth:</td>
									<td><input type="date" name="DOB"required autofocus /></td>
								</tr>
								<tr>
									<td>Blood group:</td>
									<td>
										<select name="Blood_Group">
											<option  value="A+">A+</option> 
											<option value="B+">B+</option> 
											<option value="AB+">AB+</option> 
											<option value="O+">O+</option> 
											<option value="A-">A-</option> 
											<option value="B-">B-</option> 
											<option value="AB-">AB-</option> 
											<option value="O-">O-</option> 
										</select>
									</td>
								</tr>
								
							  <br><br>
								</tr>
								<tr>
									<td>Email:</td>
									<td><input type="email" name="Email"required autofocus /></td>
								</tr>
								<tr>
									<td>Father's name:</td>
									<td><input type="tel" name="Father_Name" required autofocus/></td>
								</tr>
								<tr>
									<td>Full Address:</td>
									<td><input type="text" name="Full_Address" required autofocus/></td>
								</tr>

								<tr>
									<td>Phone no:</td>
									<td><input type="text" name="Phone_no"required autofocus /></td>
									
								</tr>
								<tr>
									<td>Picture</td>
										<td>

										<img id="logo_preview" src="../images/no_image.png" style="height:150px; width:150px; border:2px green solid;"><br><br>										
										<input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')">
										<br><br>
										

										</td>
								</tr>
								
								
								
						</table>
							<div class="d">
							
							<input  type="submit" value="Register"/>
					     </div>  
					</form>   <br>
						   </center>
							
				
			</section>
			</td>
			</table>
			</center>
			
					</div>
					
				</div><br><br><br><br>
				
				<div class="copyright">
				<center>
				<b>&copy;Saad All Right Reserved</b>
				</center>
				</div>
				
			</div>
			</div>
			</div>
	</body>
</html>