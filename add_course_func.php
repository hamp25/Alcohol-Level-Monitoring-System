<?php
    require 'config.php';
    //require 'header.php';
   
    session_start();
    $btn = $_POST['subtn'];
    if (isset($btn)) {

        
        $course = $_POST['course'];
        $college = $_POST['college'];
        date_default_timezone_set('Asia/Singapore');
        $date = date('d-m-y h:i:s');
        $query="insert into course_tbl(course_name,college,date_add) values ('$course','$college','$date')";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if ($result) {
        header('location: add_course.php');
    }
    else{
        header('location: add_course.php');
    }
    }
    else{
        header('location: add_course.php');
    }
    


?>