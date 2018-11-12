<?php
    require('./config.php');
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="輔仁大學性別平等教育委員會">
    <meta name="author" content="">

    <!-- Facebook Oper Graph -->
    <meta property="og:title" content="輔仁大學性別平等教育委員會">
    <meta property="og:website" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Website Title -->
    <title>輔仁大學性別平等教育委員會</title>

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
    <?php         
        $select="SELECT * FROM banner";
        $where=" WHERE state=1 AND isdeleted=1";
        $order=" ORDER BY sortnum ASC";
        $sql=$select.$where.$order;
        $rs=mysql_query($sql);
    ?>
    <header class="header header-size-s">
        <div class="header-text">
            <div class="header-t1">相關下載</div>
            <div class="header-t2"></div>
        </div>
        <div class="owl-carousel" id="header-slider">
            <?php while($row=mysql_fetch_array($rs)){ ?>
            <div class="owl-slide" style="background-image:url(upload/banner/<?php echo $row['img'] ?>)">
            </div>
            <?php }?>
        </div>
    </header>
    <section class="article clear-fix">
        <div class="article-header">
            <h2 class="article-title">相關連結</h2>
        </div>
        <div class="article-hr"></div>
        <div class="article-content">
        	<?php
                $pagesize=20;
                $page=mysql_real_escape_string(($_GET['page']=="")?1:$_GET['page']);
                $class=mysql_real_escape_string(($_GET['class']=="")?1:$_GET['class']);
                $newclass=getIndexRow("SELECT no,title,color FROM newsclass WHERE state=1 AND isdeleted=1",array('title','color'));

                $select="SELECT * FROM link";
                $where=" WHERE state =1 AND isdeleted =1 ";
                $order=" ORDER BY sortstate DESC,sortnum ASC";
                $limit=" LIMIT ".($page-1)*$pagesize.",".$pagesize;
                $sql=$select.$where.$order.$limit;
                $rs=mysql_query($sql);

                $total=getTotalCount($select.$where);
                while($row=mysql_fetch_array($rs)){
                ?>
            <a href="<?php echo $row['url']?>" class="news-link"><?php echo $row['title']?></a>
            <?php }?>            
        </div>
        <div class="page-control clear-fix">
          <?php
          $imax=ceil($total/$pagesize);
          if($total>0){
          for($i=1;$i<=$imax;$i++){
          if($i==$page){
          echo '<a class="page-link page-link-active" href="lawlist.php?class='.$class.'&page='.$i.'">'.$i.'</a>';
          }else{
          echo '<a class="page-link" href="lawlist.php?class='.$class.'&page='.$i.'">'.$i.'</a>';
          }
          }
          }else{
          echo "目前沒有任何資料";
          }
          ?>
    </div>
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
