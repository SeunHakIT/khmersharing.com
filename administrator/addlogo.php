<?php 
 include './config/sission.php';
 Session::checkSession();
 
?>
<?php ob_start();?>




<?php require_once("header.php");?>
<?php
require_once ("config/helper.php");
?>
<?php $db=new Database(); ?>

<!--insert Data-->
<?php
$logoname="";
$logo_ds="";
$error=[];
$file="";
$favi="";
$alt="";

if(isset($_POST['save'])){
  $logoname=$_POST['logoname'];
  $logo_ds=$_POST['logo_ds'];
  $alt=$_POST['alt'];

  if(empty($logoname)){
    $error['logoname']="Plase input slide title !!!";
  }elseif (empty($logo_ds)) {
   $error['logo_ds']="Plase input Slide Description !!!";
 }
 elseif (empty($alt)) {
   $error['alt']="Plase input Slide Alt !!!";
 }
 elseif (count($error)==0) {

  $file= date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
  move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);

    $favi= date('dmYHis').str_replace(" ", "", basename($_FILES["favi"]["name"]));
  move_uploaded_file($_FILES["favi"]["tmp_name"], "./images/".$favi);

  $slide_insert=("INSERT INTO `logos`(`name`, `description`, `picture`,`favi`,`alt`) VALUES ('".$logoname."','".$logo_ds."','".$file."','".$favi."','".$alt."')");
  $resul=$db->insert($slide_insert);
  header('location:logolist.php');


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
        <h1 class="page-header">New Logo</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Site Title</label>
              <input type="text" class="form-control" id="inputSuccess" name="logoname" value="<?php echo $logoname; ?>">
              <span class="error"><?= show_error($error,"logoname"); ?></span>
            </div>
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Description</label>
              <input type="text" class="form-control" id="inputWarning" name="logo_ds" value="<?php echo $logo_ds; ?>">
              <span class="error"><?= show_error($error,"logo_ds"); ?></span>
            </div>

            <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Alt</label>
              <input type="text" class="form-control" id="inputSuccess" name="alt" value="<?php echo $alt; ?>">
              <span class="error"><?= show_error($error,"alt"); ?></span>
            </div>
            <div class="form-group">
              <label class="control-label" for="inputWarning">Picture Logo</label>
              <input type="file" name="file" id="file" value="<?php echo $file; ?>">
            </div>
                <div class="form-group">
              <label class="control-label" for="inputWarning">Favicon Ionc</label>
              <input type="file" name="favi" id="favi" value="<?php echo $favi; ?>">
            </div>
            <!-- Form Name -->


            <!-- Select Basic -->

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