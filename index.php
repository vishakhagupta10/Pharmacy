<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysqli_query($con,"SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again </font>";
}
break;
case 'Pharmacist':
$result=mysqli_query($con,"SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysqli_query($con,"SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysqli_query($con,"SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
echo <<<LOGIN
<!DOCTYPE html>
<html>



<head>
<title>My Pharmacy</title>


<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">

<style>
#content {
    width: 100%;
height: 100%;
}
#main{
  width: 100%;
height: 100%;}
</style>
</head>
<body background="images/bng.jpg">
<div id="content">
<div id="header">
<h1>My Pharmacy </h1>
</div>
<div id="main">

 <!--<section class="container">

     <div class="login">
     <style>
     h1
     {
       color: #ffffff;
       font-family: "Comic Sans Ms";
     }
     </style>
  <center>   <h1>Login here</h1>
   </center>
	  $message
      <form method="post" action="index.php">
	<center>	 <p><input type="text" name="username" value="" placeholder="Username"></p> </center>
    <center>    <p><input type="password" name="password" value="" placeholder="Password"></p></center>
<center>		<p><select name="position"> </center>
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>Cashier</option>
			<option>Manager</option>
			</select></p>
    <center>    <p class="submit"><input type="submit" name="submit" value="Login"></p>  <center>
      </form>
    </div>
    </section>-->
    <!-- above code has been commented out -->
  <form method="post" action="index.php">
    <div class="vid-container">

    <div class="inner-container">
      <img class="bgvid inner"        src="images/bng.jpg"
      />
      <div class="box">
        <h1>Login</h1>
        <input type="text" name="username" value="" placeholder="Username"/>
        <input type="password" name="password" value="" placeholder="Password"/>
        <center>		<p><select name="position"> </center>
        		<option>--Select position--</option>
        			<option>Admin</option>
        			<option>Pharmacist</option>
        			<option>Cashier</option>
        			<option>Manager</option>
        			</select></p>
              <button type="submit" name="submit" value="Login">Login</button>


      </div>
    </div>
  </div>
</div>
</form>


</div>
</body>

</html>
LOGIN;
?>
