<?php ob_start();?>
<?php 
 include './config/sission.php';
 Session::checkSession();
 
?>

<?php
require_once("header.php");

?>
<?php ob_start();?>
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
$cat_name="";
$description="";
$id="";

if(isset($_POST['save'])){
    $id=$_POST['id'];
    $cat_name=$_POST['cat_name'];
   
    $update="UPDATE `footer` SET `id`='".$id."',`Copy`='".$cat_name."' WHERE id='".$id."' " ;
    $resul=$db->update($update);
    header("Location: listfooter.php?msg=".urlencode('Data Updated successfully.'));
    

}






?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category User</h1>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <form role="form" action="" method="post" accept-charset="utf-8">
                        <?php 

                        if(isset($_GET['u'])){
                            $get_id=$_GET['u'];
                            $select="select * from footer where id='".$get_id."' ";

                            $resul=$db->select($select);
                            if($resul)
                                while ($row=$resul->fetch_assoc()) {  ?>

                                   <div class="form-group has-success">
                                    <input type="hidden" class="form-control" id="inputSuccess" name="id" value="<?php echo $row['id']; ?> ">
                                    <label class="control-label" for="inputSuccess">Foter </label>
                                    <input type="text" class="form-control" id="inputSuccess" name="cat_name" value="<?php echo $row['Copy']; ?> ">
                                    <span class="error"><?= show_error($fileError,"cat_name"); ?></span>
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
            include 'footer.php';
            ?>

