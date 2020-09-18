<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    body {
      background-image: url("bg.jpg");
  height: 100%;
  text-align:center;
}


.center{
  margin-top:20rem;
}
.center h2{
  color:#C0C0C0;
}
</style>
</head>
<body class="bg"><?
  if(isset($_GET['message']))
  {
    if($_GET['message']=="success")
    {?><div class="center">
      <h2>Welcome To Auton family. Please Sign In <a href="login.php">here </a></h2></div>
      <?
    }
    else
    {?>
      <h2>Sorry!!!! Some error. Please go <a href="index.php">here </a> </h2><?
    }
  } 
 ?>
</body>
</html>
