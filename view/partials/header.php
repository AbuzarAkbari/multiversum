<!DOCTYPE html>
<html lang="en">

  <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="view/assets/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="view/assets/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="view/assets/fav/favicon-16x16.png">
    <link rel="manifest" href="view/assets/fav/site.webmanifest">
    <link rel="mask-icon" href="view/assets/fav/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="view/assets/css/style.css" rel="stylesheet">
  </head>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top LightSeaGreen" >
        <a class="navbar-bran " href="index.php" style='text-decoration: none;'>
          <img width="90" src="view/assets/images/logo_test.svg" alt="logo">
        <span class='text-white' >Multiversum</span>

        </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?op=allProducts">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?op=contact">Contact</a>
            </li>
        </ul>
      <form class="form-inline" action="index.php?op=search" method="post">
        <div class="input-group mt-2">
          <input type="text" class="form-control" placeholder="Zoek een product" name="w">
          <div class="input-group-append">
            <button class="btn" type="button"><i class="fas fa-search"></i></button>
          </div>
        </div>
      <a href="index.php?op=shop" type="button" class="btn madison text-white mt-2"><i class="fas fa-shopping-cart"></i></a>
      </form>
    </div>
</nav>
