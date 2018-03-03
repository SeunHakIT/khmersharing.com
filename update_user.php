<?php
ob_start();

?>
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
$fileError="";
$name="";
$username="";
$id="";

if(isset($_POST['save'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
     $password=$_POST['password'];
    $update="UPDATE `users` SET `id`='".$id."',`name`='".$name."',`username`='".$username."',`password`='".$password."' WHERE id='".$id."' " ;
    $resul=$db->update($update);
      header("Location: listUser.php?msg=".urlencode('Data Updated successfully.'));
    

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
                        <?php 

                        if(isset($_GET['u'])){
                            $get_id=$_GET['u'];
                            $select="select * from users where id='".$get_id."' ";

                            $resul=$db->select($select);
                            if($resul)
                                while ($row=$resul->fetch_assoc()) {  ?>

                                   <div class="form-group has-success">
                                    <input type="hidden" class="form-control" id="inputSuccess" name="id" value="<?php echo $row['id']; ?> ">
                                    <label class="control-label" for="inputSuccess">Name</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="name" value="<?php echo $row['name']; ?> ">
                                    <span class="error"><?= show_error($fileError,"name"); ?></span>
                                </div>
                                <div class="form-group has-warning">
                                    <label class="control-label" for="inputWarning">Username</label>
                                    <input type="text" class="form-control" id="inputWarning" name="username"value="<?php echo $row['username']; ?>" >
                                    <span class="error"><?= show_error($fileError,"username"); ?></span>
                                </div>
                                     <div class="form-group has-warning">
                                    <label class="control-label" for="inputWarning">Password</label>
                                    <input type="text" class="form-control" id="inputWarning" name="password"value="<?php echo $row['password']; ?>" >
                                    <span class="error"><?= show_error($fileError,"password"); ?></span>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">Save</button>

                                <?php  }  ?>
                                <?php }?>




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

