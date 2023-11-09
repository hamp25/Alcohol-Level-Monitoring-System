<div class="popup2">
  <div class="popup-content2">
            <div class="card-body">
              <h5 class="card-title">Clean Students</h5>
              <i class="ri ri-close-circle-line close2 ex"></i>
              <?php
$sql = "SELECT * FROM student_tbl";
$result = $conn->query($sql);?>
              <table class="table table-hover popup-content2">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th></th>
                  </tr>
                </thead>
                <?php
if (mysqli_num_rows($result) > 0) { ?>
  
<?php  while($row = mysqli_fetch_array($result)) { 
  
    $s_id = $row['student_id'];
    $s_fname = $row['student_fname'];
    $s_mname = $row['student_mname'];
    $s_lname = $row['student_lname'];
    $s_course = $row['student_course'];
    $s_year = $row['student_year'];
    $s_bdate = $row['student_bdate'];
    $today = date("Y-m-d");
    $cal = date_diff(date_create($s_bdate), date_create($today));
    $s_age = $cal->format('%y');
    $s_address = $row["student_city"] . " " . $row["student_barangay"] . " " . $row["student_zip"];
    
 
  ?>
                <tbody>
                  <tr>
                    <td><?php echo $s_id;?></td>
                    <td><?php echo $s_fname . " " . $s_mname . " " . $s_lname;?></td>
                    <td><?php echo $s_course;?></td>
                    <td><?php echo $s_year;?></td>
                    <td><?php echo $s_age;?></td>
                    <td><?php echo $s_address;?></td>
                  </tr>
                  <?php  
          }
        }

        else{
          echo "0 results";
      
          }
          ?>
                </tbody>
              </table>

            </div>
          </div>