<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .site-logo {
            margin-top: 20px; /* Adjust as needed */
            margin-left: 20px; /* Adjust as needed */
        }

        .site-logo a {
            font-size: 24px;
            /* Additional styles */
        }

        .col-md-6 {
            max-width: 400px; /* Adjust the max-width as needed */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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

        <div class="logo">
                    <div class="site-logo">
                        <a href="index.php" class="js-logo-clone">Pharma</a>
                    </div>
                </div>
                <div class="row">
            <div class="col-md-6 offset-md-3">

                <h1 class="text-center">Sign Up</h1>
                <form action="includes/signup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="nume">Nume</label>
                        <input type="text" class="form-control" id="nume" name="nume" placeholder="Nume">
                    </div>
                    <div class="form-group">
                        <label for="prenume">Prenume</label>
                        <input type="text" class="form-control" id="prenume" name="prenume" placeholder="Prenume">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"  name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirmareParola">Confirmare Parola</label>
                        <input type="password" class="form-control" id="confirmareParola" name="confirmareParola" placeholder="Confirmare Parola">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>