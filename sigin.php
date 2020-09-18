<?php 
if (isset($_POST['login-submit'])) {
	require 'connection.php';

 $mailuid = $_POST['mailuid'];
 $pass = $_POST['pwd'];

if (empty($mailuid)||empty($pass)) {
	header("Location: login.php?error=emptyfields");
	exit();
}
else{
	$sql = "SELECT * FROM users WHERE username=? OR email=?;";
	$stmt = mysqli_stmt_init($db);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location: login.php?error=sqlerror");
	exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			$pwdCheck = password_verify($pass,$row['password']);
			if ($pwdCheck == false) {
			header("Location: login.php?error=wrongpwd");
			exit();
			}
			elseif ($pwdCheck == true) {
				session_start();
				
			    $_SESSION['name'] = $row['Name'];
				
				
				
				$_SESSION['email'] = $row['email'];
				
				$_SESSION['username'] = $row['username'];
				echo '
				<script>
					alert("login successful!");
					
				</script>';
				
				header("Location: landingpage.php?login=success"); 
				exit();
			}
			else{
				header("Location: login.php?error=wrongpwd");
				exit();
			}
		}
		else{
			header("Location: login.php?error=nouser");
			exit();
		}
	}
}

}
else{
	header("Location: index.php");
	exit();
	}