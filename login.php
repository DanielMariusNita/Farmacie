<!DOCTYPE html>
<html lang="en">
<head>
<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
  }
  .site-logo {
            /* For top-left positioning */
            /* position: absolute;
            top: 20px;
            left: 20px; */

            /* For top-center positioning */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* Adjust as needed */
        }

        .site-logo a {
            font-size: 24px;
            /* Additional styles */
        }

  .container {
    width: 100%;
  }

  .col-md-6 {
    max-width: 400px; /* Adjust the max-width as needed */
  }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="logo">
                    <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Pharma</a>
                </div>
            </div>
                <h1 class="text-center">Login</h1>
                <form action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>