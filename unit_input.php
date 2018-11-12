<?php
    require('./config.php');
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="2017 Conference on ERM in the Insurance Industry">
    <meta name="author" content="">

    <!-- Facebook Oper Graph -->
    <meta property="og:title" content="2017 Conference on ERM in the Insurance Industry">
    <meta property="og:website" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Website Title -->
    <title>2017 Conference on ERM in the Insurance Industry</title>

    <!--web and app icons-->
    <link rel="apple-touch-icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/png">

    <!-- CSS -->
    <link href="vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="css/fjalumni.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include '_nav.php'; ?>

    <!-- Header -->
    <header class="header header-size-n">
            <div class="article-header" style="text-align: center;">
                <br>
                <h2 class="article-title">- 論壇線上報名- </h2>
            </div>        
    </header>
    <div class="article" style="padding: 0 20px;">        
            <div class="header-t2">
                <form action="unit_check.php" method="post" style="padding-top: 50px;">
                    <input class="ui-input" type="text" name="id" required placeholder="輸入公司統編">
                    <?php //<input type="text" name="phone" placeholder="公司電話後四碼"> ?>
                    <input class="ui-btn" type="submit" name="" style="margin-top: 30px;">
                </form>
                <br>
                <div class="h2"><?php echo $_GET['msg']; ?></div>
            </div>
    </div>


    <section class="article index-article">
        
    </section>
    <div class="clear-fix"></div>
    <!-- Footer -->
    <?php include '_footer.php'; ?>
    
    <!-- Plugin JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE88kCwi9Qr7vxbzCiqMTdH96gQDCtT30&v=3.exp"></script>
    <script src="vendor/jquery/jquery-1.10.1.min.js"></script>
    <script src="vendor/jquery/jquery-ui.min.js"></script>
    <script src="vendor/owlcarousel/owl.carousel.js"></script>
    <script src="js/fjalumni.js"></script>
    <script src="js/fjalumnimap.js"></script>

</body>

</html>
