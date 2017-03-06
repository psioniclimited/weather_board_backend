<!DOCTYPE html>
<html lang="en" class="full">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Weather Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Full CSS -->
    <link href="css/full.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="video">
                        <!-- Aspect ratio = 16:9 -->
                        <video width="762" height="429" autoplay loop preload>
                          <source src="videos/video-1.mp4" type="video/mp4">
                        </video>
                    </div>
                </div><!-- row -->
                <div class="row">
                    
                </div><!-- row -->
            </div><!-- col-md-6 -->
            <div class="col-md-3">
                <div class="row">
                    <div id="myCarousel-1" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- <ol class="carousel-indicators">
                          <li data-target="#myCarousel-1" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel-1" data-slide-to="1"></li>
                          <li data-target="#myCarousel-1" data-slide-to="2"></li>
                        </ol> -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img src="images/img-4.jpg" width="595" height="200">
                          </div>

                          <div class="item">
                            <img src="images/img-4.jpg" width="595" height="200">
                          </div>
                        
                          <div class="item">
                            <img src="images/img-4.jpg" width="595" height="200">
                          </div>

                        </div>
                    </div><!-- myCarousel -->
                </div><!-- row -->
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol> -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img src="images/img-1.jpg" width="595" height="842">
                          </div>

                          <div class="item">
                            <img src="images/img-2.png" width="595" height="842">
                          </div>
                        
                          <div class="item">
                            <img src="images/img-3.jpg" width="595" height="842">
                          </div>

                        </div>
                    </div><!-- myCarousel -->
                </div><!-- row -->
            </div><!-- col-md-3 -->
            <div class="col-md-4">
                <div class="price-text" id="price-text">
                    <h1>আজকের দাম</h1>
                    <h3>১২/০২/২০১৭</h3>
                    <ul id="text">
                        <li>
                            <ul>   
                                <li class="col-md-6">মুলা</li>
                                <li class="col-md-6">১৯</li>
                                
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">আলু</li>
                                <li class="col-md-6">৩০</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">ফুলকপি</li>
                                <li class="col-md-6">৩০</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">শমি</li>
                                <li class="col-md-6">৩৫</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">মুলা</li>
                                <li class="col-md-6">১৯</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">শমি</li>
                                <li class="col-md-6">৩৫</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="col-md-6">আলু</li>
                                <li class="col-md-6">৩০</li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- price-text -->
            </div><!-- col-md-3 -->
        </div><!-- row -->
    </div><!-- /.container-fluid -->
    <div class="footer">
        <div class="web-ticker">
            <ul id="webTicker">
                <li>দেশে ২৩ শতাংশ শিশু জন্ম নিচ্ছে প্রয়োজনের চেয়ে কম ওজন নিয়ে।</li>
                <li>১৮ শতাংশ গর্ভবতী নারী অপুষ্টির শিকার। </li>
                <li>মাসহ অন্য শিশু পরিচর্যাকারীদের ৭৩ শতাংশ স্বাস্থ্যবিধি মানেন না।</li>
            </ul>
        </div>
    </div><!-- footer -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Jquery Web Ticker Plugin -->
    <script src="plugins/Web-Ticker-master/jquery.webticker.min.js"></script>

    <!-- Page script -->
    <script>
        $('#webTicker').webTicker({
            speed: 500,
            duplicate:true
        });
    </script>

</body>

</html>
