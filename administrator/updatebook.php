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
<?php $db=new Database(); ?>

<!--insert Data-->
<?php
$bookname="";
$description="";
$error=[];
$file="";
$url="";
$id="";

if(isset($_POST['save'])){

  $bookname=$_POST['bookname'];
  $description=$_POST['description'];
  $Url=$_POST['Url'];
  $id=$_POST['id'];
  $file=$_POST['file_old'];


  if(!empty($_FILES['file']['name'])) {
    $file= date('d-m-Y-His').str_replace(" ", "", basename($_FILES["file"]["name"]));
    move_uploaded_file($_FILES["file"]["tmp_name"], "./images/".$file);

  }

  $update="UPDATE `books` SET bookname='".$bookname."',picture='".$file."',descrition='".$description."',url='".$url."' where id='".$id."'";
  $resul=$db->update($update);
  header('location:books.php');



}
?>
<!--endinsert Data-->

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">New Books</h1>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <form role="form" action="" method="post" enctype="multipart/form-data">

            <?php 
            if(isset($_GET['u'])){
              $get_id_cat=$_GET['u'];


              $select="Select * from books where id='".$get_id_cat."' ";

              $result=$db->select($select);

              if($result){
                while ($row=$result->fetch_assoc()) {?>


                  <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Book Name</label>
                    <input type="text" class="form-control" id="inputSuccess" name="slide_tile" value="<?php echo $row['bookname']; ?>">

                    <input type="hidden" class="form-control" id="inputSuccess" name="id" value="<?php echo $row['id'];?>">
                    <span class="error"><?= show_error($error,"id"); ?></span>
                  </div>
                         <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Description</label>
                    <input type="text" class="form-control" id="inputWarning" name="description" value="<?php echo $row['descrition']; ?>">
                    <span class="error"><?= show_error($error,"description"); ?></span>
                  </div>
                  
                  <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Url</label>
                    <input type="text" class="form-control" id="inputSuccess" name="url" value="<?php echo $row['url']; ?>">
                    <span class="error"><?= show_error($error,"url"); ?></span>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="inputWarning">Picture</label>
                    <input type="file" name="file" value="<?php echo $row['picture'] ;?>">
                    <input type="hidden" name="file_old" value="<?php echo($row['picture']); ?>"><label class="img"><img width="10%" src="./images/<?php echo $row['picture']; ?>"/></label>
                  </div>
                             <!-- Select Basic -->
                  <div class="form-group">
                   <div class="form-group has-warning">Category</div>
                   <select id="select" name="Category" class="form-control" value="<?php echo $vdCat; ?>">

                    <option disabled >--Category--</option>
                    <?php var_dump($up['category']) ;?>
                    <?php 
                    $get_category="select * from category";
                    $resul=$db->select($get_category);

                    if($resul){
                      while ($row=$resul->fetch_assoc()) { ?>
                        <option 
                        <?php if($up['category']==$row['cat_id']){?>
                          selected='selected'
                          <?php } ?>

                          value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?>
                          <?php } ?>
                          <?php } ?> 
                        </option>
                      </select>

                      <span class="error"><?= show_error($caterror,"Category"); ?></span>

                    </div>
           


      
                  <!-- Form Name -->

                  <?php } ?>
                  <?php } ?>
                  <?php } ?>



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