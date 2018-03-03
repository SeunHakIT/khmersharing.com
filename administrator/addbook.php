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
$bookname="";
$description="";
$error=[];
$file="";
$url="";


if(isset($_POST['save'])){
  $bookname=$_POST['bookname'];
  $description=$_POST['description'];
  $url=$_POST['url'];

  if(empty($bookname)){
    $error['bookname']="Plase input slide title !!!";
  }elseif (empty($description)) {
   $error['description']="Plase input Slide Description !!!";
 }
 elseif (empty($url)) {
   $error['description']="Plase input Slide Description !!!";
 }
 
 elseif (count($error)==0) {

  $file= date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
  move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);

   
  $slide_insert=("INSERT INTO `books`(`bookname`, `picture`, `descrition`, `url`) VALUES ('".$bookname."','".$file."','".$description."','".$url."')");
  $resul=$db->insert($slide_insert);
   header('location:books.php');


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
              <label class="control-label" for="inputSuccess">Book Title</label>
              <input type="text" class="form-control" id="inputSuccess" name="bookname" value="<?php echo $bookname; ?>">
              <span class="error"><?= show_error($error,"bookname"); ?></span>
            </div>
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
            <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Description</label>
              <input type="text" class="form-control" id="inputWarning" name="description" value="<?php echo $description; ?>">
              <span class="error"><?= show_error($error,"description"); ?></span>
            </div>

         <div class="form-group has-warning">
              <label class="control-label" for="inputWarning">Url</label>
              <input type="text" class="form-control" id="inputWarning" name="url" value="<?php echo $url; ?>">
              <span class="error"><?= show_error($error,"url"); ?></span>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputWarning">Picture</label>
              <input type="file" name="file" id="file" value="<?php echo $file; ?>">
            </div>
 

            <!-- Select Basic -->

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">Save</button>
<?php var_dump($_POST); ?>

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