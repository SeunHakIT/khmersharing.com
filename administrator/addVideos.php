<?php 
 include './config/sission.php';
 Session::checkSession();
?>
<?php ob_start();?>

<?php 
require_once("header.php");

?>
<?php
require_once ("config/helper.php");
?>
<?php $db=new Database(); ?>

<!--insert Data-->
<?php
$vdoname="";
$vdUrl="";
$error=[];
$file="";
$vdCat="";
$catError=[];
if(isset($_POST['save'])){
  $vdoname=$_POST['vdoname'];
  $vdUrl=$_POST['vdUrl'];
  $vdCat=$_POST['Category'];
  
  if(empty($vdoname)){
    $error['vdoname']="Plase input videos title !!!";
  }elseif (empty($vdUrl)) {
   $error['vdUrl']="Plase input videos URL !!!";
 }//elseif ($_POST['Category']==0) {
//   $catError['Category']="Plase Select Category agai !!!!";
  
// }
  elseif (count($error)==0) {
   
    $file= date('d-m-Y-His').str_replace(" ", "", basename($_FILES["file"]["name"]));
    move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);
    $vd_insert="INSERT INTO `videos`(`title`, `image`, `url`, `category`) VALUES ('".$vdoname."','".$file."','".$vdUrl."','".$vdCat."') ";
    $resul=$db->insert($vd_insert);


    header('location:listVideos.php');
  }


}
?>
<!--endinsert Data-->

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add Videos</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">
                <!-- Select Basic -->
       
            <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Videos Title</label>
              <input type="text" class="form-control" id="inputSuccess" name="vdoname" value="<?php echo $vdoname; ?>">
              <span class="error"><?= show_error($error,"vdoname"); ?></span>
            </div>
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Videos Url</label>
              <input type="text" class="form-control" id="inputWarning" name="vdUrl" value="<?php echo $vdUrl; ?>">
              <span class="error"><?= show_error($error,"vdUrl"); ?></span>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputWarning">Pictur</label>
              <input type="file" name="file" id="file" value="<?php echo $file; ?>">
              <div class="img">
                <span><img src="./images/<?php echo $file; ?>" value ="<?php echo $file; ?>"alt=""></span>
                
                
              </div>
            </div>
            <!-- Form Name -->


            <!-- Select Basic -->
            <div class="form-group">
             <div class="form-group has-warning">Category</div>
             <select id="selectbasic" name="Category" class="form-control" value="<?php echo $vdCat; ?>">

              <option disabled value="">--Category--</option>
              <?php 
              $get_category="select * from category";
              $resul=$db->select($get_category);
              if($resul){
                while ($row=$resul->fetch_assoc()) { ?>

                  <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>

                  <?php } ?>
                  <?php } ?> 
                </select>
                <span class="error"><?= show_error($catError,"Category"); ?></span>



              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">Save</button>
                
                
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