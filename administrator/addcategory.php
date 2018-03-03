<?php 
 include './config/sission.php';
 Session::checkSession();
 
?>
<?php
ob_start();

?>
     <?php include("header.php");?>

     <?php
     require_once ("config/helper.php");
     ?>

     <?php require_once("sibar.php");?>

     <?php
     $db=new Database();
     ?>
     ?>
     <?php
     $fileError=[];
     $cat_name="";
      $icon="";
     $description="";
     $icon=$_POST['icon'];
     if(isset($_POST['save'])){
       $cat_name=$_POST['cat_name'];
       $description=$_POST['description'];

       if(empty($cat_name)){

         $fileError['cat_name']="Plase input your Category Name!";
       }

       if (empty($description)) {
         $fileError['description']="Plase input your description!";
       }

       if (count($fileError)==0) {

         $insert="INSERT INTO `category`( `name`, `description`,`icon`) VALUES ('".$cat_name."','".$description."','".$icon."') ";
         $resul=$db->insert($insert);
         header('Location:listCategory.php');

       }




     }

     ?>

     <!-- Page Content -->
     <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Add Category</h1>
          </div>

          <div class="col-md-6">
            <div class="panel panel-default">
              <form role="form" action="" method="post" accept-charset="utf-8">
                <div class="form-group has-success">

                  <label class="control-label" for="inputSuccess">Category Name</label>
                  <input type="text" class="form-control" id="inputSuccess" name="cat_name" value="<?php echo $cat_name;?>" id="name">
                  <span class="error"><?= show_error($fileError,"cat_name"); ?></span>
                </div>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning">Description</label>
                  <input type="text" class="form-control" id="inputWarning" name="description" value="<?= $description;?>" id="description">
                  <span class="error"><?= show_error($fileError,"description"); ?></span>
                </div>
                              <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning">Icon</label>
                  <input type="text" class="form-control" id="inputWarning" name="icon" value="<?= $description;?>" id="description">
                  <span class="error"><?= show_error($fileError,"description"); ?></span>
                </div>


                <input type="submit" class="btn btn-primary btn-lg btn-block" name="save" id="save" onclick="timeout_init()" value="Save">
                <br>
                <div class="form-group has-warning">

                  <span class="control-label" for="inputSuccess" id="error"></span>
                </div>


              </form>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->



      <!-- /#wrapper -->


      <?php
      require_once("footer.php");
      ?>

      <script language="Javascript">

        var timeout;

        function timeout_init() {
          timeout = setTimeout('timeout_trigger()', 3000);
          document.getElementById('Alert').innerHTML = 'Insert Sucess';
        }
        if('')




      </script>
