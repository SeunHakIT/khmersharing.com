<?php 
include './config/sission.php';
Session::init();
?>
<?php ob_start();?>
<?php include './config/Database.php'; ?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="./vendor/bootstrap/css/stylelogin.css" rel="stylesheet">
  <link rel="shortcut icon" href="./images/favicon-2.png">
</head>
<body>
  <div class="container">
    <section id="content">
      <?php
      $db = new Database();

      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $username = mysqli_real_escape_string($db->link, $username);
        $password = mysqli_real_escape_string($db->link, $password);

        $query = "SELECT * FROM users WHERE username='$username' 
        and password='$password'";
        $result = $db->select($query);
        if ($result != false) {
          $value = $result->fetch_assoc(); 
          Session::set("login", true);
          Session::set("username", $value['username']);
          Session::set("userId", $value['id']);
         
          header("Location: index.php");
       //echo "<script>window.location = 'index.php';</script>";
          } else { echo "<span style='color:red;font-size:18px;'>Username 
          or Password Not Matched !!</span>";}
        }
        ?>

        <form action="login.php" method="post">
          <h1>Admin Login</h1>
          <div>
           <input type="text" placeholder="Username" required="1" 
           name="username" />
         </div>
         <div>
           <input type="password" placeholder="Password" required="1" 
           name="password" />
         </div>
         <div>
           <input type="submit" value="Log in" />
         </div>
       </form><!-- form -->



     </section><!-- content -->
   </div><!-- container -->
 </body>
 </html>