<?php 
 include './config/sission.php';
 Session::checkSession();
?>
<?php 
require_once("header.php");

?>


<?php require_once("sibar.php");?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard  
</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


    <!-- /#wrapper -->

<?php
    require_once("footer.php");
?>