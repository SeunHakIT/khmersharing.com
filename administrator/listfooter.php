<?php ob_start();?>
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

  $delet="DELETE FROM `footer` WHERE `id`='".$get_id."' ";
  $result=$db->delete($delet);
  echo "<div class='alert alert-success'> has been created! Delect</div>";
  header("Location: listfooter.php?msg=".urlencode('Data Updated successfully.'));

  
}

?>
<?php require_once("sibar.php");?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">List Footer</h1>
                <a href="foter.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new Footer</b></a>&nbsp;&nbsp;
                
            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Date Footer
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Copy Right</th>
                                   
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                               $list_category="SELECT * FROM footer";
                               $result=$db->select($list_category);

                               if($result)
                                while ($row=$result->fetch_assoc()) { ?>
                                 <tr class="odd gradeX">
                                   <td><?php echo $row['Copy']; ?></td>
                                 
                                   <td class="center">
                                       <a href="footerup.php?u=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-edit"></i></a>||

                                       <a href="listfooter.php?d=<?php echo $row['id']; ?>" title=""><i class="glyphicon glyphicon-trash"></i></a>


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