<?php require('includes/config.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyWords - Flashcards</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    
<style>
     h3{
         margin: 0;
         font-size: 28px;
         width: 100%;
     }
     
     .img-holder{
         width: 150px;
         height: 150px;
         margin: 0 auto 15px;
         border-radius: 50%;
         background: url() center/cover no-repeat;
     }
     
     a{
         color:#fff;
     }
     
     a:hover{
         color:#fff;
     }
     
     button{
         margin-top: 25px;
         padding: 15px 35px;
         color: #0c2e60;
         letter-spacing: 1px;
         border-radius: 25px;
         cursor: pointer;
         border: none;
         background: #0c2e60;
         background-image: linear-gradient(0 0, rgba(255, 255, 255, 0.2) 0%,
            rgba(255, 255, 255, 0.2) 35%,
            rgba(255, 255, 0.6) 40%,
            rgba(255, 255, 0) 50%), linear-gradient(to right, #0c2e60 0%, #0c2e60 100%);
         background-image: -webkit-linear-gradient(top left,
             rgba(255, 255, 255, 0.2) 0%, rgba(255,255,255, 0.2) 35%,
            rgba(255, 255, 255, 0.6) 40%, rgba(255, 255, 255, 0) 50%),
                -webkit-linear-gradient(left, #0c2e60 0%, #0c2e60 100%);
         background-position: -400px -400px, 0 0;
         background-size: 300% 300%, 100% 100%;
         -webkit-background-size: 300% 300%, 100% 100%;
         transition: background-position: 0s ease;
         -webkit-transition: background-position: 0s ease;
         background-repeat: no-repeat;
     }
     
     button:hover{
         background-position: 0 0, 0 0;
         transition-duration: 0.8s;
         -webkit-transition-duration: 0.8s;
     }
     
     .flip-card{
         float: left;
         position: relative;
         perspective: 1000px;
         -webkit-perspective: 1000px;
         margin-bottom: 200px;
     }
     
     .flip-card, .flip-card .front,
     .flip-card .back{
         width: 320px;
         height: 420px;
     }
     
     .flip-card .front,
     .flip-card .back{
         backface-visibility: hidden;
         -webkit-backface-visibility: hidden;
         background: #fff;
         position: absolute;
         top: 0;
         left: 0;
         color: #424242;
         text-align: center;
         padding: 30px;
         transition: 0.5s ease;
         -webkit-transition: 0.5s ease;
         box-shadow:0 0 23px -9px rgba(0, 0,0, 0.4);
         -webkit-box-shadow:0 0 23px -9px rgba(0, 0,0, 0.4);
         border-radius: 10px;
         display: flex;
         align-items: center;
         justify-content: center;
         flex-wrap: wrap;
     }
     
     .flip-card .back{
         z-index: 1;
         transform: rotateY(180deg);
         -webkit-transform: rotateY(180deg);
     }
     
     .flip-card:hover .front{
         transform: rotateY(-180deg);
         -webkit-transform: rotateY(-180deg);
     }
     
     .flip-card:hover .back{
         transform: rotateY(0deg);
         -webkit-transform: rotateY(0deg);
     }
</style>    
</head>

<body>
    <!--::men??::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/mywordslogo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Ana Sayfa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="flashcards.php">Flashcards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="start.php">Quiz</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="quiz.php">????renmeye Ba??la</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- men??-->
    <!-- flashcard-->
    <section class="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-7 col-lg-7">
                    <img src="img/flashcards.png" alt=""> 
                </div>
                <div class="col-md-5 col-lg-5">
                      <?php

            @$baglanti = new mysqli('localhost', 'root', '', 'mywordsdata');
            // Veritaban?? ba??lant??m??z?? yap??yoruz.
            if (mysqli_connect_error()) {
            echo mysqli_connect_error();
            exit;
            //e??er ba??lant??da hata varsa PHP ??al????mas??n?? sonland??r??yoruz.
            }

            $baglanti->set_charset("utf8");
            // T??rk??e karakter sorunu olmamas?? i??in utf8'e ??eviriyoruz.


            //Veri taban??ndan ilk ve son butonlar i??in tablodaki id de??erlerini ??ekiyoruz.
            $sorguIlk = $baglanti->query("select id from words order by id asc limit 1");
            //ilk id de??eri i??in tabloyu id ye g??re listeleyip ilk kayd?? al??yoruz
            $sonucIlk = $sorguIlk->fetch_assoc();
            $ilkId = $sonucIlk["id"];

            $sorguSon = $baglanti->query("select id from words order by id desc limit 1");
            //son id de??eri i??in tabloyu id ye g??re ters listeleyip ilk kayd?? al??yoruz
            $sonucSon = $sorguSon->fetch_assoc();
            $sonId = $sonucSon["id"];


            if ($_GET) {
                //Linklerden gelen get de??erlerini al??p sorgumuzda kullan??yoruz.
                $id = $_GET["id"];
                $yon = $_GET["yon"];


                //y??n ??nemli ona g??re sorgumuz de??i??ece??i i??in bir if yap??s??nda kullan??yoruz.
                if ($yon == "ileri") {
                    $sorgu = $baglanti->query("SELECT * FROM words where id > $id limit 1"); // Kelime tablosundaki veri ??ekiyoruz.
                }
                if ($yon == "geri") {
                    $sorgu = $baglanti->query("SELECT * FROM words where id < $id ORDER  by id desc limit 1"); // Kelime tablosundaki veri ??ekiyoruz.
                }


            } else {
                //e??er sayfa ilk defa a????lm????sa ilk de??eri al??yoruz.
                $sorgu = $baglanti->query("SELECT * FROM words limit 1");

            }

                //sonu??lar?? ??ekiyoruz.
                $sonuc = $sorgu->fetch_assoc();
        ?>          
            
             <?php if ($sonuc["id"] == $sonId) $sonDurum = "disabled"; ?>
                        <h3><?php echo $sonuc["title"]; ?></h3>
                       <div class="flip-card">
                          <div class="front">
                            <div class="img-holder"><?php 
                                    echo "
                                        <img class='img-holder' src='sets_img/".$sonuc['img']."' /> 
                                    ";
                                ?></div>
                            <div class="content">
                                <h3><?php echo $sonuc["term"]; ?></h3>
                                <p><?php echo $sonuc["sentence"]; ?></p>
                            </div> 
                          </div>
                          <div class="back">
                            <div class="content">
                                <h3><?php echo $sonuc["defination"]; ?></h3> 
                                <button><a <?php echo @$ilkDurum ?> href="flashcards.php?yon=geri&id=<?php echo $ilkId + 1; ?>"><i class="ti-angle-double-left"></i></a></button>
                                <button><a <?php echo @$ilkDurum ?> href="flashcards.php?yon=geri&id=<?php echo $sonuc["id"]; ?>"><i class="ti-angle-left"></i></a></button>
                                <button><a <?php echo @$sonDurum ?> href="flashcards.php?yon=ileri&id=<?php echo $sonuc["id"]; ?>"><i class="ti-angle-right"></i></a></button>
                                <button><a <?php echo @$sonDurum ?> href="flashcards.php?yon=ileri&id=<?php echo $sonId - 1; ?>"><i class="ti-angle-double-right"></i></a></button>
                            </div>
                          </div>
                       </div>   
                </div>
            </div>
        </div>
    </section>
    <!-- flashcard-->

    <!-- flashcard bilgi ekran??-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Flashcards</h2>
                            <p>Bu Sayfada Flashcards ile yeni kelimeler ????renebilirsiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- flashcard bilgi ekran??-->
    <!-- kay??tl?? kelime say??s??--->
    <section class="member_counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                       <span class="counter">
                           14
                        </span>
                        <h4>MyWordste bulunan Kelimeler</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                   
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>G??ncel</h5>
                        <h2>Ar??iv verilerimiz</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- kay??tl?? kelime say??s??-->
    <!-- footer-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.php"> <img src="img/mywordslogo.png" alt=""> </a>
                        <p>MyWords, 2020 y??l??nda hayata ge??irilen ve geli??meye devam eden bir ??ngilizce ????renme platformudur.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Sosyal Medya</h4>
                        <div class="social_icon">
                            <a href="https://www.facebook.com/mertgaygusuz"> <i class="ti-facebook"></i> </a>
                            <a href="https://tr.linkedin.com/in/mert-gaygusuz-056500161"> <i class="ti-linkedin"></i> </a>
                            <a href="mailto:mertgaygusuz@hotmail.com"> <i class="ti-envelope"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Navigasyon</h4>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="index.php">Ana Sayfa</a></li>
                                    <li><a href="flashcards.php">Flashcards</a></li>
                                    <li><a href="quiz.php">Quiz</a></li>
                       
                                </ul>
                            </div>									
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> T??m Haklar?? sakl??d??r. | Merga Yaz??l??m </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-->

    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>