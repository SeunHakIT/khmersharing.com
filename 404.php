<?php 
 include_once'./config/sission.php';
 Session::checkSession();
?>
<?php require_once("header.php"); ?>
<?php require_once("sibar.php"); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
               <h1 class="page-header">List Videos</h1>
               <a href="addVideos.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new Viedos</b></a>&nbsp;&nbsp;


           </div>

           <div class="clearfix"></div>
           <div class="col-md-4">
            <?php include_once('filter.php') ?>

        </div>
    </div>
    <!-- /.row -->
</div>
<div class="page-content inset">
    <div class="panel panel-default set-videos">

        <div class="row">
            <!--list of video-->


            <div class="col-lg-offset-4 col-md-6">
                <h1 style="color: #f00;font-size: 17px;">Result Not found!</h1>
            </div>


        </div>

    </div>

</div>
</div>

<!-- /#wrapper -->

<?php require_once("footer.php"); ?>