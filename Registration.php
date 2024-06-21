<?php
@include 'server.php';

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  // form validation
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
 

  // check the database for existing user
  $user_check_query = "SELECT * FROM users WHERE username='$username' and email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // register user if no errors
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
?>


  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Registration</title>
      <link rel="stylesheet" href="CSS/stylesheet.css" />
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body>
      <section>
      <div class="containerwrapper">
      <div class="container">
        <div class="RegistrationTitle-LogInTitle ">Registration</div> 
        <form action="Registration.php" method="post">
        <?php include('errors.php'); ?>

        <fieldset>
          <legend>Registration</legend>
        <div class="user-details"> 
          
            <div class="input-box">
           
              <label for="username">Username</label>
              <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter Your Username"
                value="<?php echo $username; ?>"
                required>
            </div>
          
            <div class="input-box">
              <label for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter Your Email"
                value="<?php echo $email; ?>"
                required
                >
              
            </div>
            <div class="input-box">
              <label for="password">Password</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter Your Password"
                required
              />
            </div>
         
    
            <div class="SignInButton">
            <!-- <input type="submit" name="submit" value="Submit"> -->
            <button type="submit" name="reg_user" value="Submit" onclick="reg()">Submit</button>
            </div>
            <div class="reglink">
             <p>Already Have Account? </p> <a href="LogIn.php">Sign In</a>
            </div>
          </fieldset>
</form>
      
        </div>
      </div>
    </div></section>
    <!-- <script src="JavaScript/script.js"> -->
    </script>
    </body>
  </html>
