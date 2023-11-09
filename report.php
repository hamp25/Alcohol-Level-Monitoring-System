<?php
    include "config.php";
    $btn = $_POST['subtn'];
    $msg = " ";      
    if (isset($btn)) {

        
        $bac = $_POST['bac'];
        $s_id = $_POST['s_id'];
        $date = date("Y-m-d h:i:s");
        $sql_id = "SELECT * FROM student_tbl WHERE student_id='$s_id'";
        $res_id = mysqli_query($conn,$sql_id) or die(mysqli_error($conn));
        if(mysqli_num_rows($res_id) > 0){  
        $query="INSERT INTO report_tbl(bac, student_id, student_fname, student_lname, date_input) VALUES ('$bac', '$s_id', (SELECT student_fname FROM student_tbl WHERE student_id = '$s_id'), (SELECT student_lname FROM student_tbl WHERE student_id = '$s_id'), '$date')";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        
            if ($result) {
                 echo "<script>window.location.href='records.php';
                  alert('Recorded');
                 </script>";
            }
            else{
                header('location: records.php');
                $msg = " ";
            }
            }
        else{
            echo "<script>window.location.href='records.php';
                  alert('Student ID not found');
            </script>";
            
        }
    }
    else{
        header('location: records.php');
        $msg = " ";
    }
    


?>
