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
    <header class="header header-size-s">
        <div class="header-text">
            <div class="header-t1">最新消息</div>
            <div class="header-t2">News</div>
        </div>
        <div class="owl-carousel" id="header-slider">
            <?php while($row=mysql_fetch_array($rs)){ ?>
            <div class="owl-slide" style="background-image:url(upload/banner/<?php echo $row['img'] ?>)">
            </div>
            <?php }?>
        </div>
    </header>
    <section class="news article clear-fix">
        <div class="article-header news-header clear-fix"> </div>
        <div class="article-content">
            <ul class="news-list">
            <?php
                $pagesize=10;
                $page=mysql_real_escape_string(($_GET['page']=="")?1:$_GET['page']);
                $class=mysql_real_escape_string(($_GET['class']=="")?1:$_GET['class']);

                $newclass=getIndexRow("SELECT no,title,color FROM newsclass WHERE state=1 AND isdeleted=1",array('title','color'));

                $select="SELECT * FROM news";
                $where=" WHERE state=1 AND isdeleted=1";
                $order=" ORDER BY sortstate DESC,sortnum ASC, postdate DESC";
                $limit=" LIMIT ".($page-1)*$pagesize.",".$pagesize;
                $sql=$select.$where.$order.$limit;
                $rs=mysql_query($sql);

                $total=getTotalCount($select.$where);

                while($row=mysql_fetch_array($rs)){ 
            ?>
                <li class="news-list-item">
                    <a class="news-link" href="news-article.php?id=<?php echo $row['no']?>">
                    <div class="news-img" style="background-image:url(upload/news/<?php echo $row['img'] ?>)"></div>
                    <div class="news-info">
                        <h4 class="news-tag" style="color:<?php echo $newclass[$row['fid']]['color']?>"><?php echo $newclass[$row['fid']]['title']?></h3>
                        <h4 class="news-date"><?php echo $row['ondate']?></h4>
                        <h3 class="news-title"><?php echo $row['title']?></h3>
                        <p class="news-text"><?php echo mb_strimwidth($row['summary'], 0, 60, "...", "utf8")?></p>
                    </div>
                    </a>    
                </li>
            <?php }?>
            </ul>
            <div class="page-control clear-fix">
                <?php
                    $imax=ceil($total/$pagesize);
                    if($total>0){
                        for($i=1;$i<=$imax;$i++){
                            if($i==$page){
                                echo '<a class="page-link page-link-active" href="news.php?class='.$class.'&page='.$i.'">'.$i.'</a>';
                            }else{
                                echo '<a class="page-link" href="newslist.php?class='.$class.'&page='.$i.'">'.$i.'</a>';
                            }
                        }       
                    }else{
                        echo "目前沒有任何資料";
                    }
                ?>
            </div>
        </div>
    </section>
    <div class="clear-fix"></div>

    <!-- Footer -->
    <?php include '_footer.php'; ?>
    
    <!-- Plugin JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxik1GX5Ru6tChHT_hiUAgS2K4ZILGgJw&v=3.exp&sensor=false"></script>
    <script src="vendor/jquery/jquery-1.10.1.min.js"></script>
    <script src="vendor/jquery/jquery-ui.min.js"></script>
    <script src="vendor/owlcarousel/owl.carousel.js"></script>
    <script src="js/fjalumni.js"></script>

</body>
</html>
