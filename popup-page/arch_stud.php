<?php
    include '../config.php';
    $arch_id = $_GET['archive'];
    $date = date("Y-m-d");
    $sql5 = "UPDATE student_tbl SET status = 'Archived' WHERE student_id = '$arch_id'";
            $run3 = mysqli_query($conn, $sql5);   

    if($run3){
        $sql3 = "UPDATE report_tbl SET status = 'Archived' WHERE student_id = '$arch_id'";
             $run = mysqli_query($conn, $sql3);  
                if($run){
                        echo "<script>window.location.href='../student_list.php';
                            alert('Archived Successfully')
                            </script>";
                 }
       }
       else{
          echo "<script>window.location.href='../student_list.php';
                  alert('Failed to archive')
                 </script>";
       }

?>  