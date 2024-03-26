<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
               <li><a href="index.php">Home</a></li>
                <li><a href="q_simple.php">Q_Simple</a></li>
                <li><a href="q_complexe.php">Q_complexe</a></li>
                <li><a href="shop.php">Store</a></li>
                <li class="has-children">
                  <?php
                  if (isset($_SESSION["Rol"])) {
                    ?>
                  <a href="#">Opțiuni Cont</a>

                  <ul class="dropdown">
                    <li><a href="modifica_date.php">Modifica Date Personale</a></li>
                    <li class="has-children">
                      <a href="#">Stergere Cont</a>
                      <ul class="dropdown">
                        <li><?php echo '<a href="delete_user.php?id=' . $_SESSION["UtilizatorID"].'">Ești sigur?</a>' ?> </li>
                  </ul>
                    </li>
                    
                  </ul>
                </li>
                <?php } ?>
                <?php
                if (isset($_SESSION["Rol"])) {
                    if ($_SESSION["Rol"] == "Admin" || $_SESSION["Rol"] == "Manager") {
                      echo '<li><a href="administrativ.php">Admin</a></li>';
                    }
                }
                ?>
              </ul>
            </nav>
          </div>
          <?php if (isset($_SESSION["Rol"])) { ?>

          <div class="icons">
          

            <a href="cart.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="favorite.php" class="icons-btn d-inline-block heart">
            <span class="icon-heart"></span>
            </a>
            <?php }?>

            <?php if(!isset($_SESSION["Nume"]))
            {
            ?>
            <a href="login.php" class="btn btn-primary">Login/Signup</a>

            </div>
            <?php
            }
            else{
              ?>
              <?php echo $_SESSION["Nume"];?> 
            <a href="includes/logout.inc.php" class="btn btn-primary ml-2">LOGOUT</a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>