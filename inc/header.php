<?php ob_start();?>
<?php require_once './config/Database.php';?>
<?php require_once './config/format.php'; ?>
<?php $fm=new format(); ?>
<?php $db=new Database(); ?>
<html lang="en">
<head>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <style>
    body {
      background: #fff;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }
    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 500px;

    }
    
     .swiper-container1 {
      width: 100%;
      height: 50%;
    }
    .swiper-slide {
      font-size: 18px;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 30px;
    }

  </style>

<!--    list_logo-->

    <?php
    $select =("SELECT
                 *
    FROM 
    (SELECT 
                 *
    FROM logos
    ORDER BY id DESC
    LIMIT 1
    ) AS a
    ORDER BY id");
    $result=$db->select($select);

    ?>
  <?php 

  if($result){
   $row=$result->fetch_assoc(); { ?>
      <title><?php echo $row['name']; ?></title>
      <?php }} ?>
<!--list_category_use_menu-->
    <?php

    $select_nav="select *  from category";
    $result_cat=$db->select($select_nav);
    ?>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
     
<script data-cfasync="false">
  (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
  (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
  m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-1yMrQ1.js";
  b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
</script>
      <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  
      <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">

      <link rel="stylesheet" type="text/css" href="./css/main.css">
      <link rel="stylesheet" type="text/css" href="./css/custom.css">


      <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="./css/bootstrap-them.css">

      <script type="text/javascript" src="./js/swiper.min.js"> </script>
      <link rel="stylesheet" type="text/css" href="./css/slide.css">
      <link rel="stylesheet" type="text/css" href="./css/swiper.min.css">

      



      <?php 

      if($result){
       $row=$result->fetch_assoc(); { ?>

          <link rel="shortcut icon" href="./administrator/images/<?php echo $row['favi']; ?>">
    <?php }} ?>
        </head>

        <body>
          <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">


              <?php

              $result=$db->select($select);
              if($result){
                while ($row=$result->fetch_assoc()) { ?>

                  <a class="navbar-brand" href="http://www.khmersharings.com"> <img src="./administrator/images/<?php echo $row['picture']; ?>" alt="<?php echo $row['alt']; ?>" class="img-responsive"></a>
                  <?php } ?>


                  <?php } ?>



                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto ">
                      <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                      </li>


                      <?php 

                      if($result_cat){
                        while ($row=$result_cat->fetch_assoc()) { ?>
                         <li class="nav-item">
                           <a href="moives.php?n=<?php echo($row['id']); ?>"><?php echo $row['name']; ?></a>
                         </li>

                         <?php } ?>
                         <?php }

                         ?>



                       </ul>

                       <?php  
                       $find="";
                       if(isset($_GET['filter'])){
                        $find=$_GET['find'];
                        header("Location:search.php?s=$find");
                      }


                      ?>

                      <div id="search">
                        <div class="search-content ">
                          <form method="get" id="searchform" action="">
                            <input type="hidden" value="search" name="rs">
                            <input class="form-control search-input" type="text" placeholder="Searching..." name="find" id="s" value="<?php echo($find); ?>">
                            <button type="submit" name="filter">
                              <i class="fa fa-search"></i>

                            </button> 

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>

                <div class="container">