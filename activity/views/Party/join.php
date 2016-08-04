<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <link rel="shortcut icon" href="/eddie/activity/views/Party/images/favicon/favicon.png" type="image/x-icon">
    <link rel="icon" href="/eddie/activity/views/Party/images/favicon/favicon.png" type="image/x-icon">

    <title>TEAM Creative Agency Template</title>
	
    <!--Library Styles-->    
    <link href="/eddie/activity/views/Party/css/bootstrap.min.css" rel="stylesheet">
    <link href="/eddie/activity/views/Party/css/lib/font-awesome.css" rel="stylesheet">
    <link href="/eddie/activity/views/Party/css/lib/nivo-lightbox.css" rel="stylesheet">
    <link href="/eddie/activity/views/Party/css/lib/nivo-themes/default/default.css" rel="stylesheet">
	
    <!--Template Styles-->
    <link href="/eddie/activity/views/Party/css/style.css" rel="stylesheet">
    <link href="/eddie/activity/views/Party/css/scheme/purple.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll">

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
	
    <div id="main-wrapper">
        
        <!-- Site Navigation -->
        <div id="menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html#">
                        <img src="/eddie/activity/views/Party/images/logo.png" alt="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a class="sscroll" href="index.html#home">Home</a></li>
                        <li><a class="sscroll" href="index.html#blog-front">活動內容</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        
        <div id="container">
            <!-- BEGIN HOME -->
            <section id="home" class="home">
                <!-- Superslides -->
                <div id="home-slide">
                    <ul class="slides-container text-center">
                        <li>
                            <div class="slide-text">
                                <h2>Built With Bootstrap</h2>
                                <span>Most popular HTML, CSS, and JS framework for developing responsive, mobile first projects</span>
                                <br/>
                            </div>
                          <div class="slide-filter"></div>
                            <img src="/eddie/activity/views/Party/images/slider/slide-1.jpg" class="par" alt="first">
                        </li>
                        <li>
                            <div class="slide-text">
                                <h2>Fullscreen Slider</h2>
                                <span>Superslides - A fullscreen, hardware accelerated slider for jQuery</span>
                                <br/>
                            </div>
                          <div class="slide-filter"></div>
                            <img src="/eddie/activity/views/Party/images/slider/slide-2.jpg" class="par" alt="first">
                        </li>
                        <li>
                            <div class="slide-text">
                                <h2>Elegant Design</h2>
                                <span>We focused on usability of the template and combined useful content blocks based on that</span>
                                <br/>
                            </div>
                          <div class="slide-filter"></div>
                            <img src="/eddie/activity/views/Party/images/slider/slide-3.jpg" class="par" alt="first">
                        </li>
                    </ul>
                    <nav class="slides-navigation slidez">
                        <a href="javascript:;" class="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="javascript:;" class="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </nav>
                </div>
                <!-- End of Superslide -->
            </section>
  
            <section id="blog-front" class="blog-front gray">
                <div class="row">
                    <!--<div class="col-md-12 mg-bt-80">-->
                        <div class="header-content">
                            <h2>活動內容</h2>
                            <h3><?php echo $data['title'];?></h3>
                        </div>
                    <!--</div>-->
                </div>
                        <div style="text-align:center">
                               <?php echo $data['info'];?>
                                <h3>輸入身分</h3>
                                <form method ="post" action = "auth">
                                    <input type="text" name="name" value ="" placeholder="員工名稱"/>
                                    <input type="text" name="number" value ="" placeholder="員工編號"/>
                                    <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
                                    <input type="hidden" name="start" value="<?php echo $data['start'];?>"/>
                                    <input type="hidden" name="end" value="<?php echo $data['end'];?>"/>
                                    <p></p>
                                    <input type="text" name="flag" value ="" placeholder="<?php echo $data['flag'];?>"/>
                                    <p></p>
                                    <div class="row">
                                        <input class="btn blog-btn" type="submit" value="參加"/>
                                    </div>
                                </form>
                            </a>
                            <p class="post-content"> <?php echo "報名時間 : " .$data['start'] ."  ~  ". $data['end'] ;?></p>
                        </div>
                </div>
            </section>
            
                </div>
                </div>
            </footer>
            <!-- END FOOTER -->
        </div>
    </div>


    <!-- Back to top -->
    <div id="backtotop">       
        <a class="to-top-btn sscroll" href="index.html#home"><i class="fa fa-angle-double-up"></i></a>
    </div>


    <!-- Library Scripts -->
    <script src="/eddie/activity/views/Party/js/jquery-1.10.2.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.preloader.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/nivo-lightbox.min.js"></script>
    <script src="/eddie/activity/views/Party/js/bootstrap.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.superslides.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/smoothscroll.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.sudoslider.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.bxslider.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.mixitup.min.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.backtotop.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="/eddie/activity/views/Party/js/lib/retina.min.js"></script>

    <!-- Custom Script -->    
    <script src="/eddie/activity/views/Party/js/main.js"></script>
</body>
<?php
if(isset($_SESSION['Error'])){
    echo "<script> alert('" . $_SESSION['Error'] . "')</script>";
    unset($_SESSION['Error']);
}
?>

</html>
