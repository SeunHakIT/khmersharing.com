<?php ob_start();?>
<?php 
 include './config/sission.php';
 Session::checkSession();
 
?>
<?php 
require_once("header.php");


?>

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

$Title="";

if(isset($_POST['save'])){

 $Title=$_POST['Title'];

 if(empty($Title)){

   $fileError['Title']="Plase input your name!";
 }
 

if (count($fileError)==0) {

 $insert="INSERT INTO `footer`( `Copy`) VALUES ('".$Title."') ";
 $resul=$db->insert($insert);
 header('Location:listfooter.php');

}




}

?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Add User</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" accept-charset="utf-8">
      
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Title</label>
              <input type="text" class="form-control" id="inputWarning" name="Title" value="<?= $Title;?>" id="Title">
              <span class="error"><?= show_error($fileError,"Title"); ?></span>
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



