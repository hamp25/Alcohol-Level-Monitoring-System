<div class=" popup3">
  <div class="popup-content3">
            <div class="card-body">
              <h5 class="card-title">Students with record</h5>
              <i class="ri ri-close-circle-line close3 ex"></i>
              <?php
$sql = "SELECT * FROM report_tbl";
$result = $conn->query($sql);?>
              <table class="table table-hover popup-content3">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">BAC</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <?php
if (mysqli_num_rows($result) > 0) { ?>
  
<?php  while($row = mysqli_fetch_array($result)) { 
  
    $s_id = $row['student_id'];
    $s_fname = $row['student_fname'];
    $s_lname = $row['student_lname'];
    $bac = $row['bac'];
    $date = $row['date_input'];
 
  ?>
                <tbody>
                  <tr>
                    <td><?php echo $s_id;?></td>
                    <td><?php echo $s_fname . " " . $s_lname;?></td>
                    <td><?php echo $bac . "%";?></td>
                    <td><?php echo $date;?></td>
                    <td><a href="popup-page/archive_rec.php?archive=<?php echo $s_id?>">Archive</a></td>
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