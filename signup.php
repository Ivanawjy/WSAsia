<?php
  
  // Include database connectivity
      
  include_once('config.php');
  
  if (isset($_POST['submit'])) {
      
      $errorMsg = "";
      
      $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $role    = mysqli_real_escape_string($con, $_POST['role']);
      $email    = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $password = password_hash($password, PASSWORD_DEFAULT);
      if($role == 'none'){
      	$errorMsg  = "Select Your Role";
      }else{
	      $sql = "SELECT * FROM students WHERE email = '$email'";
	      $execute = mysqli_query($con, $sql);
	        
	      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	          $errorMsg = "Email in not valid try again";
	      }else if(strlen($password) < 6) {
	          $errorMsg  = "Password should be six digits";
	      }else if($execute->num_rows == 1){
	          $errorMsg = "This Email is already exists";
	      }else{
	          $query= "INSERT INTO user(fullname,username,role,email,password) 
	                  VALUES('$fullname','$username','$role','$email','$password')";
	          $result = mysqli_query($con, $query);
	      if ($result == true) {
	          header("Location:login.php");
	      }else{
	          $errorMsg  = "You are not Registred. Please Try again";
	      }
	  }
    }
  }

?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:50px">
<h1 style="text-align:center;">USER SIGN UP</h1><br>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        $errorMsg
                      </div>";
            }
        ?>
        <form action="" method="POST">
          <div class="form-group">
          	<label for="exampleFormControlSelect1">Fullname: </label>
             <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="">
          </div>
          <div class="form-group">
          	<label for="exampleFormControlSelect1">Username: </label>
             <input type="text" class="form-control" name="username" placeholder="Username" required="">
          </div>
          <div class="form-group">
            <label for="role">Role: </label>
			    <select class="form-control" id="role" name='role'>
			    	<option value="none">Select Your Role</option>
				     <option value="administrator">Administrator</option>
				     <option value="staff">Staff</option>
			    </select>
          </div>
          <div class="form-group">
          	<label for="exampleFormControlSelect1">Email: </label>
             <input type="email" class="form-control" name="email" placeholder="Email" required="">
          </div>
          <div class="form-group">
          	<label for="exampleFormControlSelect1">Password:</label>
             <input type="password" class="form-control" name="password" placeholder="Password" required="">
          </div>
          <p>If you have account <a href="login.php">Login</a></p>
          <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Sign Up">  
        </form>
      </div>
    </div>
  </div>
</body>
</html>