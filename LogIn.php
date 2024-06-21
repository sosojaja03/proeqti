<?php include('server.php') ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LogIn</title>
    <link rel="stylesheet" href="CSS/stylesheet.css" />
  </head>
  <body>
    <section>
      <div class="containerwrapper">
        <div class="container">
          <div class="RegistrationTitle-LogInTitle">Log In</div>
          <form action="LogIn.php" method="post">
          <?php include('errors.php'); ?>

            <fieldset>
              <legend>Log In</legend>

              <div class="input-box">
                <label for="username">Username</label>
                <input
                  type="text"
                  id="username"
                  name="username"
                  placeholder="Enter Your Username"
                  required
                />
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
                <!-- <input type="submit" name="submit" value="Login" /> -->
                <button type="submit" name="login_user" value="Log In">
                  Log In
                </button>
              </div>
              <div class="reglink">
                <p>Don't have an account?</p>
                <a href="Registration.php">Sign Up</a>
                <p>now!</p>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
