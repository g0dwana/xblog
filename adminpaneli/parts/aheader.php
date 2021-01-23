<?php 

 session_start();


 if(isset($_SESSION["usermail"]))  
  {  
    echo '';
  }  
  else  
  {  
       header("location:login.php");  
  }  

 include('../../config/db.php');

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>X panel</title>

  <link href="parts/adstyle.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Custom styles for this template -->

</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Xblog paneli</a>

    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php">Çıkış Yap</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <!-- bos menu-->
       
            <li class="nav-item">
              <a class="nav-link " href="#">

              </a>
            </li>
            <!-- bos menu-->
            <li class="nav-item">
              <a class="nav-link " href="adminindex.php">
                <span data-feather="home"></span>
                Anasayfa <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminabout.php">
                <span data-feather="book"></span>
                Hakkımızda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminworks.php">
                <span data-feather="briefcase"></span>
                Çalışmalar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminusers.php">
                <span data-feather="users"></span>
                Üyelik sistemi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admincontact.php">
                <span data-feather="inbox"></span>
                İletişim
              </a>
            </li>

          </ul>
          <!-- 
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
            -->
        </div>
      </nav>
