<?php
session_start();
require_once "Database.php";
if (isset($_POST['save'])) {
    $save = $_POST['save'];
    switch ($save) {
        case "category":
            unset($_POST['save']);
            $query = "SELECT * FROM category WHERE name ='" . $_POST['name'] . "'";
            if ($database->num_rows($query) > 0) {
                echo "<div class='alert alert-danger'>Category already exist!</div>";
            } else {
                if ($database->insert("category", $_POST)) {
                    echo "<div class='alert alert-success'>Category has been created!</div>";
                }
            }
            break;
        case "video":
            unset($_POST['save']);
            $_POST['cby']=$_SESSION['id'];
            $sourcePath = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $rand = rand(1, 9999);
            $file_name = $rand . $file_name;
            $_POST['image']=$file_name;
            $targetPath = "../resources/uploads/" . $file_name;
            move_uploaded_file($sourcePath, $targetPath);
            if (!empty($_POST['main'])) {
                unset($_POST['category']);
                if($database->insert('sub_videos', $_POST)){
                    echo "<div class='alert alert-success'>Video has been created!</div>";
                }else{
                    echo "<div class='alert alert-danger'>Oops something went wrong, please try again.</div>";
                }
            } else {
                unset($_POST['main']);
				
                if($database->insert('videos', $_POST)){
                    echo "<div class='alert alert-success'>Video has been created!</div>";
                }else{
                    echo "<div class='alert alert-danger'>Oops something went wrong, please try again.</div>";
                }
            }
            break;
        case "user":
            break;
        case "about":
            break;
        default:
            break;
    }
}
?>