<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "Ulpa");
function make_query($connect)
{
 $query = "SELECT * FROM HomeBanner where Active='1' ORDER BY BannerId ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="'.$row["BannerImage"].'" alt="'.$row["BannerTitle"].'" />
   <div class="carousel-caption">
    <h3>'.$row["BannerTitle"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>

<!-- <!DOCTYPE html> -->
<html lang="en">

<!-- Mirrored from themes.iki-bir.com/Ulpa Desal/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 May 2018 17:15:34 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="text" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title>Ulpa Desal</title>
<!-- <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="style/revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="style/revolution/css/navigation.css">
<link rel="stylesheet" type="text/css" href="style/revolution/revolution-addons/filmstrip/css/revolution.addon.filmstrip.css">
<link rel="stylesheet" type="text/css" href="style/revolution/revolution-addons/typewriter/css/typewriter.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style/css/color/teal.css">
<link rel="stylesheet" type="text/css" href="style/css/font/font2.css">
<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
</style>

</head>
<body>
<div class="content-wrapper">
  <nav class="navbar solid opacity absolute nav-wrapper-light navbar-expand-lg center justify-content-between text-uppercase">
    <div class="container">
      <div class="navbar-header">
        <div class="navbar-brand d-lg-none d-xl-none"><!-- <a href="index.php"><img src="#" srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x" alt="" /></a> --></div>
        <div class="navbar-hamburger ml-auto d-lg-none d-xl-none">
          <button class="hamburger animate" data-toggle="collapse" data-target=".navbar-collapse"><span></span></button>
        </div>
      </div>
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse">
        <div class="navbar-nav-wrapper">
          <ul class="nav navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="about.html">About Us</a> </li>
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="service.php">Services</a></li>
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="achievements.php">Achievements</a></li>
            
           </ul>
         </div>
              
    <div class="navbar-brand d-none d-lg-block"><!-- <a href="index.php"><img src="#" srcset="style/images/logo.png 1x, style/images/logo@2x.png 2x" alt="" /></a> --></div>
                 
          <div class="navbar-nav-wrapper">
          <ul class="nav navbar-nav ml-auto">
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="events.php">Event</a></li>
           
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="media.php">Media</a></li>
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="guestbook.php">Guest Book</a></li>
             <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="contact.html">Contact</a></li>


          </ul>
          <!-- /.navbar-nav --> 
        </div>
        <!-- /.navbar-nav-wrapper --> 
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container --> 
  </nav>
  <!-- /.navbar -->
    
     
  
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connect); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($connect); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

  
 <!--  </div> -->
  <!-- /.rev_slider_wrapper -->
  <div class="wrapper light-wrapper">
    <div class="container inner">
      <h2 class="section-title mb-30 text-center">Meet Ulpa</h2>
      <div class="row">
        <div class="col-lg-6 text-center">
          <figure class="rounded"><img src="style/images/ulpa1.png" alt=""></figure>
        </div>
        <!-- /column -->
        <div class="space30 d-block d-lg-none d-xl-none"></div>
        <div class="col-lg-6">
          <p class="lead larger"><span class="dropcap color-default">H</span>ello! I'm Julia Ulpa Desal, a wedding & portrait photographer. I would like to give you a unique photography experience, built to serve you best and capture your special moments for you and your families creatively and beautifully.</p>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed diam eget risus varius blandit sit amet non magna. </p>
          <ul class="social social-color social-s mb-15">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
          </ul>
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row -->
      <div class="space70"></div>
      <div class="row">
        <div class="col-md-4">
          <h4>What is My Process?</h4>
          <p>Duis mollis, est non commodo luctus, nisi porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem.</p>
          <ol>
            <li>Vivamus sagittis lacus vel augue laoreet.</li>
            <li>Cras mattis consectetur purus sit amet.</li>
            <li>Vestibulum id ligula porta felis euismod.</li>
            <li>Nulla vitae elit libero, a pharetra augue.</li>
          </ol>
        </div>
        <!-- /column -->
        <div class="col-md-4">
          <h4>Why Choose Me?</h4>
          <p>Vestibulum id ligula porta felis euismod semper. Cras mattis consectetur purus sit amet fermentum. Donec ullamcorper nulla non metus.</p>
          <ul class="unordered-list list-default">
            <li>Donec ullamcorper nulla non metus auctor.</li>
            <li>Cras justo odio, dapibus ac facilisis.</li>
            <li>Praesent commodo cursus magna.</li>
            <li>Curabitur blandit tempus porttitor.</li>
          </ul>
        </div>
        <!-- /column -->
        <div class="col-md-4">
          <h4>My Skills</h4>
          <ul class="progress-list">
            <li>
              <p>Weddding & Bridal</p>
              <div class="progressbar line default" data-value="90"></div>
            </li>
            <li>
              <p>Family & Portrait</p>
              <div class="progressbar line default" data-value="80"></div>
            </li>
            <li>
              <p>Maternity & Newborn</p>
              <div class="progressbar line default" data-value="85"></div>
            </li>
            <li>
              <p>Food & Drink</p>
              <div class="progressbar line default" data-value="65"></div>
            </li>
          </ul>
          <!-- /.progress-list --> 
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row -->
      <div class="space20"></div>
      <div class="text-center"><a href="#" class="btn btn-full-rounded">See My Portfolio</a></div>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.wrapper -->
  <div class="wrapper gray-wrapper">
    <div class="container inner">
      <h2 class="section-title mb-30 text-center">Dance Forms</h2>
      <div class="tiles text-center">
        <div class="items row">
          <div class="item col-md-6 col-lg-3">
            <figure class="overlay rounded overlay1 mb-20"><a href="#"><img src="style/images/BharataNatyam.jpg" alt="" /></a>
              <figcaption class="d-flex">
                <div class="align-self-center mx-auto">
                  <h5 class="mb-0">See Album</h5>
                </div>
              </figcaption>
            </figure>
            <h4 class="mb-0">Bharatnatyam</h4>
            
          </div>
          <!--/.item -->
          <div class="item col-md-6 col-lg-3">
            <figure class="overlay rounded overlay1 mb-20"><a href="#"><img src="style/images/Odissi.jpg" alt="" /></a>
              <figcaption class="d-flex">
                <div class="align-self-center mx-auto">
                  <h5 class="mb-0">See Album</h5>
                </div>
              </figcaption>
            </figure>
            <h4 class="mb-0">Odissi</h4>
          </div>
          <!--/.item -->
          <div class="item col-md-6 col-lg-3">
            <figure class="overlay rounded overlay1 mb-20"><a href="#"><img src="style/images/Manipuri.jpg" alt="" /></a>
              <figcaption class="d-flex">
                <div class="align-self-center mx-auto">
                  <h5 class="mb-0">See Album</h5>
                </div>
              </figcaption>
            </figure>
            <h4 class="mb-0">Manipuri</h4>
          </div>
          <!--/.item -->
          <div class="item col-md-6 col-lg-3">
            <figure class="overlay rounded overlay1 mb-20"><a href="#"><img src="style/images/Kuchipudi.jpg" alt="" /></a>
              <figcaption class="d-flex">
                <div class="align-self-center mx-auto">
                  <h5 class="mb-0">See Album</h5>
                </div>
              </figcaption>
            </figure>
            <h4 class="mb-0">Kuchipudi</h4>
          </div>
          <!--/.item --> 
        </div>
        <!--/.row --> 
      </div>
      <!-- /.tiles --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.wrapper -->
  <div class="wrapper image-wrapper bg-image inverse-text" data-image-src="style/images/bg2.jpg">
    <div class="container inner pt-120 pb-120">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="swiper-container-wrapper basic-slider">
            <div class="swiper-container text-center">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <blockquote class="icon icon-top larger">
                    <p>Consectetur adipiscing elit. Duis mollis, est non commodo luctus gestas eget quam integer. Curabitur blandit tempus rutrum faucibus.</p>
                    <footer class="blockquote-footer">Connor Gibson</footer>
                  </blockquote>
                </div>
                <!-- /.swiper-slide -->
                <div class="swiper-slide">
                  <blockquote class="icon icon-top larger">
                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper. Cras justo odio.</p>
                    <footer class="blockquote-footer">Coriss Ambady</footer>
                  </blockquote>
                </div>
                <!-- /.swiper-slide -->
                <div class="swiper-slide">
                  <blockquote class="icon icon-top larger">
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis.</p>
                    <footer class="blockquote-footer">Barclay Widerski</footer>
                  </blockquote>
                </div>
                <!-- /.swiper-slide --> 
              </div>
              <!-- /.swiper-wrapper --> 
            </div>
            <!-- /.swiper-container -->
            <div class="swiper-pagination gap-small"></div>
          </div>
          <!-- .swiper-container-wrapper --> 
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.wrapper -->
  <div class="wrapper light-wrapper">
    <div class="container inner">
      <h2 class="section-title mb-30 text-center">My Portfolio</h2>
      <div id="cube-grid2-filter" class="cbp-filter-container text-center">
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All</div>
        <div data-filter=".cat1" class="cbp-filter-item">Category 1</div>
        <div data-filter=".cat2" class="cbp-filter-item">Category 2</div>
        <div data-filter=".cat3" class="cbp-filter-item">Category 3</div>
      </div>
      <div class="clearfix"></div>
      <div class="space20"></div>
      <div id="cube-grid2" class="cbp text-center">
        <div class="cbp-item cat2 cat3">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp5.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Wedding</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat1">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp6.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Maternity</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat1">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp7.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Engagement</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat2 cat3">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp8.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Bridal</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat3">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp9.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Newborn</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat1">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp10.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">People & Portrait</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat3">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp11.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Family</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat2 cat3">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp12.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Children</h4>
        </div>
        <!--/.cbp-item -->
        <div class="cbp-item cat1">
          <figure class="overlay rounded overlay1 mb-20"><a href="portfolio-post3.html"> <img src="style/images/art/cp13.jpg" alt="" /></a>
            <figcaption class="d-flex">
              <div class="align-self-center mx-auto">
                <h5 class="mb-0">See Photos</h5>
              </div>
            </figcaption>
          </figure>
          <h4 class="mb-0">Food & Drink</h4>
        </div>
        <!--/.cbp-item --> 
      </div>
      <!--/.cbp --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.wrapper -->
  <footer class="dark-wrapper inverse-text">
    <div class="container inner pt-60 pb-30 text-center">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-md-4">
              <div class="widget">
                <h3 class="widget-title">Location</h3>
                <address class="mb-0">
                Moonshine St. 14/05 Light City<br />
                34509, Neverland
                </address>
              </div>
              <!-- /.widget --> 
            </div>
            <!-- /column -->
            <div class="col-md-4">
              <div class="widget">
                <h3 class="widget-title">Follow</h3>
                <ul class="social social-mute social-s">
                  <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
              <!-- /.widget --> 
            </div>
            <!-- /column -->
            <div class="col-md-4">
              <div class="widget">
                <h3 class="widget-title">Contact</h3>
                <a href="mailto:first.last@email.com" class="nocolor">first.last@email.com</a> <br />
                +00 (123) 456 78 90 </div>
              <!-- /.widget --> 
            </div>
            <!-- /column --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row -->
      <div class="space40"></div>
      <p class="text-center">© 2018 Ulpa Desal. All rights reserved. Theme by elemis.</p>
    </div>
    <!-- /.container --> 
  </footer>
</div>
<!-- /.content-wrapper --> 
<!--  <script src="style/js/jquery.min.js"></script>  -->
<script src="style/js/popper.min.js"></script> 
<!-- <script src="style/js/bootstrap.min.js"></script>  -->
<script src="style/revolution/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/revolution/js/jquery.themepunch.revolution.min.js"></script> 
<script src="style/revolution/revolution-addons/filmstrip/js/revolution.addon.filmstrip.min.js"></script> 
<script src="style/revolution/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.actions.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.carousel.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.kenburn.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.migration.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.navigation.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.parallax.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.slideanims.min.js"></script> 
<script src="style/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="style/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="style/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="style/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="style/js/plugins.js"></script> 
<script src="style/js/scripts.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    debugger;
$("#dynamic_slide_show").carousel();
  });
</script>

</body>

<!-- Mirrored from themes.iki-bir.com/Ulpa Desal/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 May 2018 17:19:09 GMT -->
</html>