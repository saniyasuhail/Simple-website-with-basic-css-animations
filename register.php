
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet" >
 <link href="css/animation.css" rel="stylesheet" >


<style>

</style>

    <title>LENSON</title>
  </head>
  <body >

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <?php 
          session_start();
          if (isset($_GET['error'])) {
            if ($_GET["error"]=="emptyfields") {
              echo '<p class="signuperror">Fill in all fields</p>';
            }
            elseif ($_GET["error"]=="invalidmail") {
               echo '<p class="signuperror">Invalid Email</p>';
            }
            elseif ($_GET["error"]=="invaliduid") {
               echo '<p class="signuperror">Invalid Username</p>';
            }
            elseif ($_GET["error"]=="passwordcheck") {
               echo '<p class="signuperror">Your password do not match</p>';
            }
            elseif ($_GET["error"]=="usertaken") {
               echo '<p class="signuperror">Username is already taken</p>';
            }
            elseif ($_GET["error"]=="sqlerror") {
              echo '<p class="signuperror">Sorry, Try Again!!</p>';
           }
            } 
             if (isset($_GET['register'])) {
              if ($_GET["register"]=="success") {
               echo '<p class="signupsuccess">Register successful</p>';
             }
         }
         
           ?>
          <form action="signup.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="Name" name="name" class="form-control" placeholder="Your name" autofocus="autofocus">
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    
                    
                    <select class="form-control" name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        
                      </select> 
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="date" id="inputAddress" name="dob" class="form-control" placeholder="Your Date Of Birth" required>
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPlace" name="pob" class="form-control" placeholder="Your Place Of Birth">
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputContact" name="contact" class="form-control" placeholder="Contact" minlength=10 maxlength="10" required>
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address">
               
              </div>
            </div>
           
            	
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail1" name="uid" class="form-control" placeholder="User Name">
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password">
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="pwdcon" class="form-control" placeholder="Confirm password">
                    
                  </div>
                </div>
                </div>
                </div>
			              <div class="form-group">
                    
                  <div class="form-label-group ">
                  
                  <input class="form-control form-control-file" type="file" id="myfile" name="file12">  
                  
                                  
                      </div> 
                       </div>
              
            
           
            <button type="submit" class="btn btn-primary btn-block " name="signup-submit">Register</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <a class="d-block small" href="#">Forgot Password?</a>
            <a class="d-block small mt-3" href="index.php">Home</a>
          </div></div>
        </div>
      </div>
    </div>
</form>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
