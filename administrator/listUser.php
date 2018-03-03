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

<?php require_once("sibar.php");?>




<?php 
//delect
if(isset($_GET['d'])){
  $get_id=$_GET['d'];

  $delet="DELETE FROM `users` WHERE `id`='".$get_id."' ";
  $result=$db->delete($delet);
  header('Location:listUser.php');
  
}

?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">

      <h1 class="page-header">List User</h1>
      <a href="addUser.php" class="new"><b><i class="glyphicon glyphicon-plus-sign"></i> Add new User</b></a>&nbsp;&nbsp;
    </div>
    <!-- /.row -->

  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
         <h4>User Data</h4>
       </div>
       <!-- /.panel-heading -->
       <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Name</th>
              <th>Username</th>
              <th>Create At(s)</th> 
              <th>Action</th>

            </tr>
          </thead>
          <tbody>

            <?php 
            $list_user="SELECT * FROM users order by id desc";
            $result=$db->select($list_user);

            if($result)
              while ($row=$result->fetch_assoc()) { ?>
               <tr class="odd gradeX">
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['username']; ?></td>
                 <td><?php echo $row['cdate']; ?></td>
                 <!--  <td><?php echo $row['cdate'];?></td> -->
                 <td class="center">
                   <a href="update_user.php?u=<?php echo $row['id'];?>" title=""><i class="glyphicon glyphicon-edit"></i></a>||

                   <a href="listUser.php?d=<?php echo $row['id'];?>" title=""><i class="glyphicon glyphicon-trash"></i></a>


                 </td>


                 <?php  }  ?>

               </tr>

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