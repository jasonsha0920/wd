<?php
    require('./config.php');
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="">
    <meta name="description" content="巨詣實業位於新北市深坑區，致力於帶給人們更環保、更安全以及最先進的環保產品，藉以提升大家的生活品質。獨家代理日本ACHILLES 防蟲PVC門簾、防寒PVC門簾、防靜電PVC門簾、及各式消毒設備、捕蟲、防蟲設備等。服務客戶遍及各大食品廠、電子廠、藥廠、冷凍廠、零售業以及一般民眾。">
    <meta name="keywords" content="PVC、門簾、塑膠、工廠、食品廠、冷鏈、半導體、無塵室、店鋪、透明、防塵、防凍、防蟲、抗菌、靜電、電銲、焊接、滑軌、家庭、防焰">

    <!-- Facebook Oper Graph -->
    <meta property="og:title" content="WINDOOR 巨詣實業有限公司">
    <meta property="og:website" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Website Title -->
    <title>WINDOOR 巨詣實業有限公司</title>

    <!--web and app icons-->
    <link rel="apple-touch-icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/png">

    <!-- CSS -->
    <link href="vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />

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
    <?php         
        $select="SELECT * FROM banner";
        $where=" WHERE state=1 AND isdeleted=1";
        $order=" ORDER BY sortnum ASC";
        $sql=$select.$where.$order;
        $rs=mysql_query($sql);
    ?>
    <header class="header header-size-l">
             
        <div class="owl-carousel" id="header-slider">
            <?php while($row=mysql_fetch_array($rs)){ ?>            
            <div class="owl-slide" style="background-image:url(upload/banner/<?php echo $row['img'] ?>)"  onclick="location.href='<?php echo $row['url'] ?>';">
                <div class="header-text">            
                    <div class="header-t1"><h3 style="margin-bottom: 10px; font-size: 1.1em;"><?php echo $row['title'] ?></h3><p style="font-size: 0.7em; margin-top: 0px; letter-spacing: 2px;"><?php echo $row['subtitle'] ?></p></div>
                </div>  
            </div>
             
            <?php }?>
        </div>
    </header>    
    <section class="article index-article" style="margin: 20px auto;max-width: 1680px;">
        <div class="article-l">
            <div class="news-conent" style="padding: 10px 20px;">
            <h2 class="news-title"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;最新消息</h2>
            <ul class="news-first">
            <?php
                $newclass=getIndexRow("SELECT no,title,color FROM newsclass WHERE state=1 AND isdeleted=1",array('title','color'));

                $select="SELECT * FROM news";
                $where=" WHERE state=1 AND isdeleted=1";
                $order=" ORDER BY sortstate DESC,sortnum ASC, postdate DESC";
                $limit=" LIMIT 0,6";
                $sql=$select.$where.$order.$limit;
                $rs=mysql_query($sql);
                while($row=mysql_fetch_array($rs)){ 
            ?>
                <li class="news-first-item">
                    <a class="news-link" href="news-article.php?id=<?php echo $row['no']?>">
                    <div class="news-first-img" style="background-image:url(upload/news/<?php echo $row['img'] ?>);"></div>
                    <div class="news-first-info">
                        <h4 class="news-tag" style="color:<?php echo $newclass[$row['fid']]['color']?>"><?php echo $newclass[$row['fid']]['title']?></h3>
                        <h4 class="news-date"><?php echo $row['ondate']?></h4>
                        <h3 class="news-title"><?php echo $row['title']?></h3>
                        <p class="news-text"><?php echo mb_strimwidth($row['summary'], 0, 200, "...", "utf8")?></p>
                    </div>
                    </a>    
                </li>
            <?php }?>
            </ul>
            </div>
        </div>
        <div class="article-r" style=" border-left:1px solid #DFDFDF; border-right:1px solid #DFDFDF; border-bottom:1px solid #DFDFDF; border-top: 5px solid #734BA9;margin-bottom:20px; border-radius: 8px; ">
            <div class="news-conent" style="padding: 10px 20px;">                
                <h2 class="news-title"><i class="fa fa-link" aria-hidden="true"></i>&nbsp;相關連結</h2>
                <?php                
                $select="SELECT * FROM link";
                $where=" WHERE state=1 AND isdeleted=1";
                $order=" ORDER BY sortstate DESC,sortnum ASC";
                $limit=" LIMIT 0,6";
                $sql=$select.$where.$order.$limit;
                $rs=mysql_query($sql);
                while($row=mysql_fetch_array($rs)){ 
                 ?>
                 <a class="news-link" href="<?php echo $row['url']?>" ><?php echo $row['title']?></a>
                <?php }?>
                <a class="news-link" href="linklist.php" style="float: right;">- More -</a> 
            </div>
        </div>
        <div class="article-r" style=" border-left:1px solid #DFDFDF; border-right:1px solid #DFDFDF; border-bottom:1px solid #DFDFDF; border-top: 5px solid green ;margin-bottom:20px; border-radius: 8px; ">
            <div class="news-conent" style="padding: 10px 20px;">                
                <h2 class="news-title"><i class="fa fa-link" aria-hidden="true"></i>&nbsp;施作花絮</h2>                    
                <div class="coverflow" style="min-height: 330px;">
                    <?php                
                    $select="SELECT * FROM pic";
                    $where=" WHERE state=1 AND isdeleted=1";
                    $order=" ORDER BY sortstate DESC,sortnum ASC";
                    $limit="";
                    $sql=$select.$where.$order.$limit;
                    $rs=mysql_query($sql);
                    while($row=mysql_fetch_assoc($rs)){ 
                     ?>
                     <a href="#"><img src="upload/pic/<?php echo $row['img']; ?>" alt="" title=""></a>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="article-r" style="text-align: center">
         	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwindoor26626565%2F&tabs=timeline&width=375&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2097649583832851" width="375" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		 </div>    
        <div class="clearfix"></div>      
    </section>

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
