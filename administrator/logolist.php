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
      $delect="DELETE from logos where id='".$get_id."' ";

      $result=$db->delete($delect);

      header('location:logolist.php');
    }

?>

<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <h1 class="page-header">List Logo</h1>
          <a href="addlogo.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add New Slide</b></a>&nbsp;&nbsp;
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Data Lgogs
             </div>
             <!-- /.panel-heading -->
             <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Site Title</th>
                            <th>Description</th>
                            <th>Picture</th>
                              <th>Favicon</th>
                            <th>Alt</th>
                       
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $list_slide="SELECT * FROM logos";
                      $result=$db->select($list_slide);

                      if($result)
                        while ($row=$result->fetch_assoc()) { ?>
                           <tr class="odd gradeX">
                             <td><?php echo $row['name']; ?></td>
                             <td><?php echo $row['description']; ?></td>
                              <td class="image">

                                <img src="./images/<?php echo $row['picture']; ?>" ; ?>
                            </td>
                                  <td class="image">

                                <img src="./images/<?php echo $row['favi']; ?>" ; ?>
                            </td>
                                <td><?php echo $row['alt'];?></td>
                           
                           
                             <td class="center">
                                 <a href="updatelogo.php?u=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-edit"></i></a>||

                                 <a href="logolist.php?d=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-trash"></i></a>


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