<?php
    include '../config.php';
    $arch_id = $_GET['archive'];
    $date = date("Y-m-d");
    $sql3 = "INSERT INTO archive_report_tbl(student_id, student_fname, student_lname, bac, date_input)
     SELECT * FROM report_tbl WHERE student_id = '$arch_id'";
    $run = mysqli_query($conn, $sql3);  

    if($run){
        $sql4 = "DELETE FROM report_tbl WHERE student_id = '$arch_id'";
                 $run2 = mysqli_query($conn, $sql4); 
                 if($run2){
                    $sql5 = "UPDATE student_tbl SET status = 'Archived' WHERE student_id = '$arch_id'";
                    $run3 = mysqli_query($conn, $sql5);  
                    if($run3){
                        echo "<script>window.location.href='../records.php';
                            alert('Archived Successfully')
                            </script>";
                    }

               }  
       }
       else{
          echo "<script>window.location.href='records.php';
                  alert('Failed to archive')
                 </script>";
       }

?>  