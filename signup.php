<?php  
if (isset($_POST['signup-submit'])) {

require 'connection.php';

$name = mysqli_real_escape_string($db,$_POST['name']);
$sex = $_POST['gender'];
$dob = mysqli_real_escape_string($db,$_POST['dob']);
$pob =mysqli_real_escape_string($db,$_POST['pob']);
$contact = mysqli_real_escape_string($db,$_POST['contact']);
$email = $_POST['mail'];

$username = mysqli_real_escape_string($db,$_POST['uid']);
$pass = mysqli_real_escape_string($db,$_POST['pwd']);
$passcon = mysqli_real_escape_string($db,$_POST['pwdcon']);
//$passcon = $_FILE['file1'];
$pdata=addslashes(file_get_contents($_FILES['file12']['tmp_name']));
if (empty($name)||empty($email)||empty($username)||empty($pass)||empty($passcon)) {
	header("Location: register.php?error=emptyfields&firstname=".$fname.
	"&mail=".$email."&uid=".$username);
	exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: register.php?error=invalidmail&uid=");
	exit();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: register.php?error=invalidmail&uid=".$username);
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	header("Location: register.php?error=invaliduid&mail=".$email);
	exit();
}
else if ($pass !== $passcon) {
	header("Location: register.php?error=passwordcheck&firstname=".$fname."&lastname=".$lname.
	"&mail=".$email."&uid=".$username);
	exit();
} 
else{
	$sql = "SELECT username FROM users WHERE username=?";
	$stmt = mysqli_stmt_init($db);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location: register.php?error=sqlerror");
	exit();
	} 
	else{
		mysqli_stmt_bind_param($stmt,"s",$username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck > 0) {
			header("Location: register.php?error=usertaken&mail=".$email);
			exit();
		}
		else{
			$sql = "INSERT INTO users(`Name`,`Sex`,`dob`,`place_of_birth`,`phone_number`,`email`,`username`,`password`,`photo`)VALUES(?,?,?,?,?,?,?,?,?)";
			mysqli_stmt_execute($stmt);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: register.php?error=sqlerror");
			exit();
		}else{
			
			$hashedPwd =password_hash($pass,PASSWORD_DEFAULT);

			mysqli_stmt_bind_param($stmt,"ssssisssb",$name,$sex,$dob,$pob,$contact,$email,$username,$hashedPwd,$pdata);
			$q=mysqli_stmt_execute($stmt);
			if($q){
				$message="success";
				header("Location: message.php?message=$message");
				exit();
			}
			else{
				$message=mysqli_error($db);
				header("Location: register.php?error=$message");
				exit();
			}
			
		}
		}
	}			
}
mysqli_stmt_close($stmt);
mysqli_close($db);

}
else{
	header("Location: login.php");
	exit();
}
