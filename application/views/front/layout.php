<?php
$site = $this->site_model->listing();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url('assets/img/upload/config/' . $site->icon) ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bad+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Farro">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Article-List.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Brands.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Features-Boxed.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Footer-Clean.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Footer-Dark.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Team-Grid.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Testimonials.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/Lightbox-Gallery.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <script src="<?= base_url('assets/front') ?>/js/jquery.min.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5fa2a525e019ee7748f0c82a/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <!--End of Tawk.to Script-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean">
        <div class="container">

            <div class="container"><a class="navbar-brand" href="<?= base_url() ?>"><img class="img-fluid" src="<?= base_url('assets/img/upload/config/' . $site->logo) ?>" style="height: 62px;">&nbsp;U-Works!</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav text-center ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#testimoni">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact US</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if ($isi) {
        $this->load->view($isi);
    }
    ?>

    <div id="contact">
        <div class="block-pad">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <div class="col-md-6 d-xl-flex align-items-xl-center">
                        <div>
                            <h1 class="home-title title-green" data-aos="fade-right">Hubungi Kami</h1>
                            <p class="home-content-text" data-aos="fade-right">Anda punya pertanyan?<br>Kami akan membantu menjawab pertanyaan anda<br><br>
                                <a data-aos="fade-right" class="btn text-center content-btn" href="http://wa.me/<?= $site->wa ?>"><i class="icon ion-social-whatsapp"></i>&nbsp; Whatsapp</a></p>
                        </div>
                    </div>
                    <div data-aos="fade-left" class="col-md-6 d-xl-flex justify-content-xl-center align-items-xl-center"><img class="img-fluid" src="<?= base_url('assets/front') ?>/img/7879.jpg"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-clean home-bg-dark">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                        <a href="http://wa.me/<?= $site->wa ?>"><i class="icon ion-social-whatsapp"></i></a>
                        <a href="http://instagram.com/<?= $site->ig ?>"><i class="icon ion-social-instagram"></i></a>
                        <!-- <a href="http://facebook.com/<?= $site->fb ?>"><i class="icon ion-social-facebook"></i></a> -->
                        <a href="mailto:<?= $site->email ?>"><i class="icon ion-email"></i></a>
                        <a href="callto:<?= $site->telp ?>"><i class="icon ion-ios-telephone"></i></a>
                        <p class="copyright"><?= $site->namaweb ?> © <?= date('Y') ?></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?= base_url('assets/front') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script>
        $('div#gambar0').addClass('active');

        AOS.init();
    </script>

</body>

</html>