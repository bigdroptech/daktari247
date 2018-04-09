<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <title>Daktari 247</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/doc.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $('#home').tab('show')
        })
    </script>

    <script type="text/javascript">
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Modernizr script for autocomplete **This is literally a hack -->
  <script src="js/modernizr.custom.95515.js"></script>
  <script>
    Modernizr.load([
      'https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
      {
        test : Modernizr.input.list,
        nope : ['https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css',
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js',
            'js/DatalistPolyfill.js']
      }
    ]);
  </script>

</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll thedoc" href="index.php"> <img src="img/Daktari_BrandIdentity.png" alt="Daktari247"> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="feeds.php">Feeds</a>
                    </li>
                    <li>
                        <a href="about.php">About us</a>
                    </li>
                    <li>
                        <a class="signing" href="#">Download App</a>
                    </li>
                    <li>
                        <a class="signing" href="#">For Doctors</a>
                    </li>
                    <li>
                        <?php

                          if(isset($_SESSION['username'])) {

                          echo '<li class="loginbox"><img src="img/avatar.jpg" alt="avatar" title=""></li><li class="loginboxa"><a href="#">'. $_SESSION["username"] . '</a></li>';
                          echo '<li>
                                <a href="config/logout.php" id="logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>';
                        } else {
                                echo '<li>
                                        <a class="signing" href="#signin" data-toggle="modal" data-target="#signUp">Sign up</a>
                                    </li>';
                                echo '<li>
                                    <a class="signing" href="#login" data-toggle="modal" data-target="#signIn">Login </a>
                                    </li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>