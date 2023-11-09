<?php
    include 'config.php';
    $edit_id = $_GET['edit'];
    $sql3 = "SELECT * FROM student_tbl WHERE student_id = '$edit_id'";
    $run = mysqli_query($conn, $sql3);
    while($row = mysqli_fetch_assoc($run)){
    $s_id = $row['student_id'];
    $s_fname = $row['student_fname'];
    $s_mname = $row['student_mname'];
    $s_lname = $row['student_lname'];
    $s_course = $row['student_course'];
    $s_gen = $row['student_gender'];
    $s_year = $row['student_year'];
    $s_bdate = $row['student_bdate'];
    $today = date("Y-m-d");
    $cal = date_diff(date_create($s_bdate), date_create($today));
    $s_age = $cal->format('%y');
    $s_city = $row['student_city'];
    $s_barangay = $row['student_barangay'];
    $s_zip = $row['student_zip'];
    $s_type = $row['type'];



    
}   
if(isset($_POST['btn2'])){
        $update_id = $_GET['edit_form'];
        $s_id = $_POST['s_id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $zip = $_POST['zip'];
        $address = $barangay . ", " . $city . ", " . $zip;
        $s_bdate = $_POST['bdate'];
        $s_course = $_POST['s_course'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $type = $_POST['other'];

    $sql4 = "UPDATE student_tbl SET student_id = '$s_id', student_fname = '$fname', student_mname = '$mname', student_lname = '$lname', student_course = '$s_course', student_gender = '$gender', student_year = '$year', student_bdate = '$s_bdate', type = '$type' WHERE student_id = '$update_id'" ;
    $row = mysqli_query($conn, $sql4);

    if($row){
        echo "<script>window.location.href='student_list.php';
                  alert('Information Update Successfully')
                 </script>";
       }
       else{
          echo "<script>window.location.href='student_list.php';
                  alert('No changes')
                 </script>";
       }
}

?>  
<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CU-AMS | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/CU-Logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

 
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/CU-Logo-Web.png" alt="">
        <span class="d-none d-lg-block">AlcoholMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/CU-Logo.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['admin_name']; ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
              <span>Main Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="add_student.php">
          <i class="bi bi-person"></i>
          <span>Add Student</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="add_course.php">
          <i class="ri ri-add-fill"></i>
          <span>Add Course</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link " href="student_list.php">
          <i class="bi bi-card-list"></i>
          <span>Student List</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="records.php">
          <i class="bi bi-card-list"></i>
          <span>Records</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="archive.php">
          <i class="bi bi-card-list"></i>
          <span>Archive</span>
        </a>
      </li>
      

    </ul>

  </aside>

  <main id="main" class="main">
<section class="section">
  <div class="row">
    <div class="col-lg-6">
</div>
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit ID Number <?php echo $s_id?></h5>
<div class="popup">
                <div class="popup-content">
                    
                  <a href="student_list.php"><i class="ri ri-close-circle-line close ex" style="float:right;"></i></a>
                  <br>
                  <form class="row g-3 "  action="edit_view_student.php?edit_form=<?php echo $s_id?>" method="post" novalidate>
                    
                  <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" class="form-control" name="fname" id="validationCustom01" value="<?php echo $s_fname?>" >
                  
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Middle name</label>
                  <input type="text" class="form-control" name="mname"  id="validationCustom02" value="<?php echo $s_mname?>" >
                  
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" class="form-control" name="lname" id="validationCustom02" value="<?php echo $s_lname?>" >
                  
                </div>
                <!-- <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">City</label>
                  <input type="text" class="form-control" name="city" value="<?php echo $s_city?>"   id="validationCustom03" >
                  
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">Barangay</label>
                  <select class="form-select" name="barangay"  id="validationCustom04" va>
                    <option name="barangay" selected  value="<?php echo $s_barangay?>"><?php echo $s_barangay?></option>
                    <option name="barangay">Barangay 1</option>
                    <option name="barangay">Barangay 2</option>
                    <option name="barangay">Barangay 3</option>
                    <option name="barangay">Barangay 4</option>
                    <option name="barangay">Barangay 5</option>
                  </select>
                  
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Zip</label>
                  <input type="number" class="form-control" name="zip" value="<?php echo $s_zip?>"  id="validationCustom05" >
                  
                </div> -->
                  <div class="col-md-5">
                  <label for="validationCustom01" class="form-label">Course</label>
                  <select class="form-select" name="s_course"   id="validationCustom01" >
                    <option name="s_course" selected value="<?php echo $s_course?>"><?php echo $s_course?></option>
                    <?php
                    $sql2 = "SELECT * FROM course_tbl";
                    $quer = mysqli_query($conn, $sql2);
                    while($row = mysqli_fetch_assoc($quer)){
                    $s_course = $row['course_name'];
                    echo "<option value='$s_course'>$s_course</option>";
                    }
                    ?>
                  </select>
                  
                </div>
                <div class="col-md-3">
                  <label for="validationCustom01" class="form-label">Year</label>
                  <select class="form-select" name="year" id="validationCustom01" >
                    <option name="year" selected value="<?php echo $s_year?>"><?php echo $s_year?></option>
                    <option name="year">First Year</option>
                    <option name="year">Second Year</option>
                    <option name="year">Third Year</option>
                    <option name="year">Fourth Year</option>
                    <option name="year">Fifth Year</option>
                  </select>
                  
                </div>
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="validationCustom01" >
                    <option name="gender" selected  value="<?php echo $s_gen?>"><?php echo $s_gen?></option>
                    <option name="gender">Male</option>
                    <option name="gender">Female</option>
                  </select>
                  
                </div>
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">ID Number</label>
                  <input type="number" class="form-control" value="<?php echo $s_id?>" name="s_id" id="validationCustom01" value="" >
                 
                </div>
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Birthdate</label>
                  <input type="date" class="form-control" name="bdate" value="<?php echo $s_bdate?>" id="validationCustom01" value="" >
                  
                </div>
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Type:</label>
                  <select class="form-select" name="other" id="validationCustom01" >
                    <option name="other" selected  value="<?php echo $s_type?>"><?php echo $s_type?></option>
                    <option name="other">Student</option>
                    <option name="other">Employee</option>
                    <option name="other">Visitor</option>
                  </select>
                  
                </div>  
                <div class="col-12">
                  <button class="btn btn-primary" name="btn2" type="submit" >Update</button>
                </div>
                </form>

                  
</div>
</div>
</section>
  </main>

  
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CU-AMS</span></strong>. All Rights Reserved
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script type="text/javascript" src="my_script.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>
<?php

}else{

     header("Location: login.php");

}
?>
