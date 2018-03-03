<?php ob_start(); ?>
<?php require_once("config/Database.php"); ?>
<!DOCTYPE HTML> 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Location" content="http://seunhak.dx.am/">

    <title>HD Moives Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="./vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./vendor/bootstrap/css/style.css" rel="stylesheet">

<script data-cfasync="false">
  (function(r,e,E,m,b){E[r]=E[r]||{};E[r][b]=E[r][b]||function(){
  (E[r].q=E[r].q||[]).push(arguments)};b=m.getElementsByTagName(e)[0];m=m.createElement(e);
  m.async=1;m.src=("file:"==location.protocol?"https:":"")+"//s.reembed.com/G-1yMrQ1.js";
  b.parentNode.insertBefore(m,b)})("reEmbed","script",window,document,"api");
</script>
    <?php 
    $db=new Database();
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
    if($result){
        while ($row=$result->fetch_assoc()) { ?>


          <link rel="shortcut icon" href="./images/<?php echo $row['favi']; ?>">
          <?php }} ?>
      </head>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- MetisMenu CSS -->
      <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="dist/css/sb-admin-2.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <script src="vendor/jquery/mh.js"></script>
      <script src="vendor/jquery/videosplayer.js"></script>


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
      $(function() {
        $('.height').matchHeight();
    });
</script>


</head>

<body>

    <div id="wrapper">


        <?php 
        if(isset($_GET['action']) && isset($_GET['action'])=="logout"){
            Session::destroy();
            exit();
        }

        ?>
