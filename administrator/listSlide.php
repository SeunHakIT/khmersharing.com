<?php ob_start();?>
<?php 
 include './config/sission.php';
 Session::checkSession();
 
?>
<?php 
require_once("header.php");

?>
<?php $db=new Database(); ?>

<?php  

    if(isset($_GET['d'])){
      $get_id=$_GET['d'];
      $delect="DELETE from slide where id='".$get_id."' ";

      $result=$db->delete($delect);

      header('location:listSlide.php');
    }

?>

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <h1 class="page-header">List Slide</h1>
          <a href="addslide.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add New Slide</b></a>&nbsp;&nbsp;
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Data Slide
             </div>
             <!-- /.panel-heading -->
             <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Alt</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $list_slide="SELECT * FROM slide";
                      $result=$db->select($list_slide);

                      if($result)
                        while ($row=$result->fetch_assoc()) { ?>
                           <tr class="odd gradeX">
                             <td><?php echo $row['slidename']; ?></td>
                             <td><?php echo $row['description']; ?></td>
                              <td class="image">

                                <img src="./images/<?php echo $row['picture']; ?>" ; ?>
                            </td>
                                <td><?php echo $row['atl'];?></td>
                             <td><?php echo $row['created_at']; ?></td>
                           
                             <td class="center">
                                 <a href="updateslidt.php?u=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-edit"></i></a>||

                                 <a href="listSlide.php?d=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-trash"></i></a>


                             </td>


                             <?php  }  ?>
                         </tbody>
                     </table>
                     <!-- /.table-responsive -->

                 </div>
                 <!-- /.panel-body -->
             </div>
             <!-- /.panel -->
         </div>
         <!-- /.col-lg-12 -->
     </div>
 </div>
 <!-- /.container-fluid -->



 <!-- /#wrapper -->

 <?php
 require_once("footer.php");
 ?>