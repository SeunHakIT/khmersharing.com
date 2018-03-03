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
$db=new Database();
?>

<?php 
//delect
if(isset($_GET['d'])){
  $get_id=$_GET['d'];

  $delet="DELETE FROM `category` WHERE `id`='".$get_id."' ";
  $result=$db->delete($delet);
  echo "<div class='alert alert-success'> has been created! Delect</div>";
  header("Location: listCategory.php?msg=".urlencode('Data Updated successfully.'));

  
}

?>
<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">List Category</h1>
                <a href="addcategory.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new Category</b></a>&nbsp;&nbsp;
                
            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Category
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                               $list_category="SELECT * FROM category";
                               $result=$db->select($list_category);

                               if($result)
                                while ($row=$result->fetch_assoc()) { ?>
                                 <tr class="odd gradeX">
                                   <td><?php echo $row['name']; ?></td>
                                   <td><?php echo $row['description']; ?></td>
                                   <td><?php echo $row['created_at']; ?></td>
                                   <td class="center">
                                       <a href="categoryup.php?u=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-edit"></i></a>||

                                       <a href="listCategory.php?d=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-trash"></i></a>


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
               <!--modal category add new-->

           </div>
       </div>
       <!-- /.container-fluid -->



       <!-- /#wrapper -->

       <?php
       require_once("footer.php");
       ?>