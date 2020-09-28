<?php
include_once("connection.php");
?>

<?php

if (isset($_POST['save'])) {
    session_start();
    $title = $_POST['title'];
    $type = $_POST['type'];
    $link = $_POST['link'];



    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $file_ext = explode('.', $file_name);
    $fileActualExt = strtolower(end($file_ext));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($fileActualExt, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        $filePath = "assets/img/portfolio/" . $file_name;
        move_uploaded_file($file_tmp, $filePath);
    }

    $sql = "INSERT INTO projects(`image`,`title`,`type`,`link`) VALUES('$filePath','$title','$type','$link')";
    mysqli_query($con, $sql);
    $_SESSION['message'] = "project has been saved";
    $_SESSION['msg_type'] = "success";
    header("location: dashboard.php");
}


if (isset($_GET['delete'])) {
    session_start();
    $id = $_GET['delete'];
    $sql = "DELETE FROM `projects` WHERE `projects`.`id` = $id";
    mysqli_query($con, $sql);
    $_SESSION['message'] = "¨Project has been Deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: dashboard.php");
}



?>