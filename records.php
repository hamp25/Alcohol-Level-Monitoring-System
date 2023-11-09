<?php 

include "config.php";

session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {


$ard = "SELECT * FROM arduino_tbl ORDER BY id DESC LIMIT 1";
$result = $conn->query($ard);
$results = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="refresh" content="5">
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
  <link rel="stylesheet" type="text/css" href="assets/css/style2.css">
  
  
</head>
<body onload="table()">

 <div class="bodo">
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/CU-Logo-Web.png" alt="">
        <span class="d-none d-lg-block">AlcoholMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


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
        <a class="nav-link collapsed" href="student_list.php">
          <i class="bi bi-card-list"></i>
          <span>Student List</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="records.php">
          <i class="bi bi-card-list"></i>
          <span>Records</span>
        </a>
      </li>
            <li class="nav-item">
        <a class="nav-link collapsed" href="pass_archive.php">
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
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">Record Page</h5>

                  <form class="row g-3 needs-validation"  id="formpg" action="report.php" method="post" novalidate>
                    <div class="col-md-3" id="formpg">
                      <input type="number" class="form-control" id="formpg" name="bac" value="<?php 
                      include 'sensor_value.php';
                      ?>" min="0.00" max="1.00" step=".01" required>
                      
                      <div class="invalid-feedback">
                        <b>Missing/Invalid input</b>
                      </div>
                    </div>
                    <!-- <div class="col-12">
                    <button class="btn" name="btn" type="button">GET BAC</button>
                  </div> -->
                  <div class="col-md-5">
                    <input type="number" class="form-control" onkeyup='saveValue(this);' id="idnum" name="s_id" placeholder="Enter ID Number" min="2000000" required>
                    <div class="invalid-feedback">
                        <b>Missing/Invalid input</b>
                      </div>
                  </div>
                  <div class="col-12">
                  <input type="submit" class="button" name="subtn" value="Submit">
                </div>
                  </form>
              </div>

            </div>
                
                   
          </div>
          
          </div>
</div>
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
  

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
$("button").on("click", function(){
$('#formpg').load(' #formpg')
alert('Reloaded')
});
</script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
   // set the value to this input
        document.getElementById("idnum").value = getSavedValue("idnum");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
    </script>
</body>

</html>
<?php

}else{

     header("Location: login.php");

}
?>