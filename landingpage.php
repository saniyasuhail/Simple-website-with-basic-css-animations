<?php session_start();
include('connection.php'); 
include('header.php');
if(isset($_SESSION['email'])){?>

    <? 
    
    $email= $_SESSION['email'];
    
    $query="Select * from users where email='$email'";
    $result=mysqli_query($db,$query);
    while ($item=mysqli_fetch_array($result)){?>
<div class="background">
        <div class="split left">
            <div class="centered">
   
                    <h2>Welcome To The LENSON family.</h2>
    
            </div>
        </div>

        <div class="split right">
                <div class="centered">
                       <? if($item['photo']==NULL){?>
                          <img style="margin-top:70%;" src="user.png">  <?  }
                          else { 
                         echo '<img style="margin-top:70%;"src="data:image/jpeg;base64,'.base64_encode($item['photo']).'" alt="Profile photo">';}?>
                        <h2><?php echo " "; echo $item['Name']; ?></h2>
                        <p> <i class="fas fa-envelope" aria-hidden="true"></i><?php echo " "; echo $item['email']; ?></p>
                        <p> <i class="fas fa-phone" aria-hidden="true"></i><?php echo " "; echo $item['phone_number'];?></p>
                        <p> <i class="fas fa-birthday-cake" aria-hidden="true"></i><?php echo " "; echo $item['dob']; ?></p>
                        <?php
                       if($item['place_of_birth']!=""){?>
                         <p> <i class="fas fa-map-marker" aria-hidden="true"></i><?php echo " "; echo $item['place_of_birth']; }?></p>  
                         <?}?>
                </div>
        </div>
<div>
<?}
else{
header("Location : login.php?error=notsignedin");
exit();
}?>