<?php
require 'config.php';
session_start();
$msg = "";
$btn = $_POST['btn2'];

if (isset($btn)) {
                $s_id = $_POST['s_id'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $city = $_POST['city'];
                $barangay = $_POST['barangay'];
                $zip = $_POST['zip'];
                $age = $_POST['age'];
                $course = $_POST['course'];
                $gender = $_POST['gender'];
                date_default_timezone_set('Asia/Singapore');
                $date = $_POST['date'];
                $pic = $_FILES["image"]["name"];
                $target_dir = "image/";
                    if($pic !== ""){
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $extensions_arr = array("jpg","jpeg","png","gif");
                    }
                    if(in_array($imageFileType,$extensions_arr)){
                        $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                        $image = "data::image/" . ";base64," . $image_base64;
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$pic)){   
                $sql3 = "insert into student_tbl(student_id, student_fname, student_mname, student_lname, student_img) values ('$_id','$fname','$mname', '$lname', '$pic')";

                $res = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
                if($res){
                    header('location: add_student.php');
                     $msg = "<b>&#10004;Student Added successfully</b>"; 
                }
                else{
                    header('location: add_student.php');
                    $msg = "Error uploading";
                    
                }
        }
    }       
            else{
                header('location: add_student.php');
                $msg = "Please choose a file";
            }
        }           

        ?>
