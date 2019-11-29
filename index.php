<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>IMB Online Kabupaten</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/lora-web-font.css" />
        <link rel="stylesheet" href="assets/css/opensans-web-font.css" />
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target="#main_navbar">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'></div>
		<nav class="navbar navbar-default navbar-fixed-top" id="main_navbar">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" height="40" width="200" alt="logo" /></a>
                </div>

                <!-- Collexct the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right ">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="#service">Pendaftaran</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->
        <header id="home" class="home">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="home-wrapper">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="home-content text-center">
                                    <h1>SELAMAT DATANG DI IMB ONLINE KABUPATEN</h1>
                                    <h4>Mudah, Cepat, Transparan, Kerja-Kerja</h4>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sections -->
        <section id="service" class="service sections">
            <div class="container">
                <div class="heading text-center">
                    <h1>PENDAFTARAN</h1>
                    <div class="separator"></div>
                </div>
                <!-- Example row of columns -->
                <div class="row">
                  <div class="wrapper">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item text-center">
                                <a href="index.php?cari=tracking"><i class="glyphicon glyphicon-search"></i></a>
                               <h5>TRACKING</h5>
                                <div class="separator2"></div>
                               
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item text-center">
                                <a href="login.php" onclick="alert('Silahkan Anda Login Terlebih Dahulu !!!')"><i class="glyphicon glyphicon-pencil"></i></a>
                                <h5>FORMULIR</h5>
                                <div class="separator2"></div>
                               
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item text-center">
                                <a href="daftar.php"><i class="glyphicon glyphicon-plus"></i></a>
                                <h5>REGISTRASI</h5>
                                <div class="separator2"></div>
                                
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item text-center">
                                <a href="https://www.youtube.com/channel/UCiaWqqpD5ZTRDP0c48HHE0A?view_as=subscriber" target="_blank"><i class="glyphicon glyphicon-facetime-video"></i></a>
                                <h5>VIDEO AMATIRAN</h5>
                                <div class="separator2"></div>
                               
                            </div>
                        </div> 

                    </div>
                </div>
            </div> <!-- /container -->       
        </section>
        <?php 

        if (isset($_GET['cari'])) {
   if($_GET['cari']==="tracking")
    include "modul/cari.php";
}
 ?>


        <!-- End of portfolio-one Section -->
        <!-- Sections --><!-- Sections --><!-- Sections -->
        <section id="contact" class="contact">
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="contact-top">
                            <h1>Hubungi Kami</h1>
                        </div>
                        <div class="contact-left-info">
                            <h5>Alamat</h5>
                            <p>Jl. Raya Pemda Bogor No.999</p>
                        </div>

                        <div class="contact-left-info">
                            <h5>WhatsApp</h5>
                            <p>+628-4444555000</p>
                            <p>+628-99890213888</p>
                        </div>

                        <div class="contact-left-info">
                            <h5>Email</h5>
                            <p>imbonlinekab.gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                      <!-- /.navbar-collapse -->
<div class="contact-form"></div>
                    </div>

                </div>
            </div> <!-- /container -->       
        </section>



        <!--Footer-->
        <footer id="footer" class="footer">
          <div class="container">
            <div class="scroll-top"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="copyright">
                  <p style="color: red;">&copy;K.H OYO 2018 All Rights Reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/isotope.min.js"></script>
        <script src="assets/js/plugins.js"></script>
         <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
