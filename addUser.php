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
$name="";
$username="";
$password="";
if(isset($_POST['save'])){
 $name=$_POST['name'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 if(empty($name)){

   $fileError['name']="Plase input your name!";
 }
 if (empty($password)) {
  $fileError["password"]="Plase input your Password!";
}
if (empty($username)) {
 $fileError['username']="Plase input your username!";
}

if (count($fileError)==0) {

 $insert="INSERT INTO `users`( `name`, `username`, `password`) VALUES ('".$name."','".$username."','".$password."') ";
 $resul=$db->insert($insert);
 header('Location:listUser.php');

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
            <div class="form-group has-success">

              <label class="control-label" for="inputSuccess">Name</label>
              <input type="text" class="form-control" id="inputSuccess" name="name" value="<?php echo $name;?>" id="name">
              <span class="error"><?= show_error($fileError,"name"); ?></span>
            </div>
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Username</label>
              <input type="text" class="form-control" id="inputWarning" name="username" value="<?= $username;?>" id="username">
              <span class="error"><?= show_error($fileError,"username"); ?></span>
            </div>
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Password</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

              <span class="error"><?= show_error($fileError,"password" ); ?></span>
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



