



<?php
    require 'config.php';
    //require 'header.php';
   
    session_start();
    $btn = $_POST['btn2'];
    if (isset($btn)) {

        
        $s_id = $_POST['s_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        // $city = $_POST['city'];
        // $barangay = $_POST['barangay'];
        // $zip = $_POST['zip'];
        // $address = $barangay . ", " . $city . ", " . $zip;
        $bdate = $_POST['bdate'];
        $course = $_POST['course'];
        $gender = $_POST['gender'];
        $type = $_POST['other'];
        $year = $_POST['year'];
        $query="insert into student_tbl(student_id, student_fname, student_mname, student_lname, student_year, student_bdate, student_gender, student_course, type, status) values ('$s_id','$fname','$mname', '$lname', '$year', '$bdate', '$gender', '$course', '$type', 'Active')";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if ($result) {
        echo "<script>window.location.href='add_student.php';
                  alert('Student Successfully Added')
                 </script>";
    }
    else{
        header('location: add_student.php');
    }
    }
    else{
        header('location: add_student.php');
    }
    


?>