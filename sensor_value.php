<?php 
include "config.php";
$ard = "SELECT * FROM arduino_tbl ORDER BY id DESC LIMIT 1";
$result = $conn->query($ard);
$results = mysqli_num_rows($result);
                      if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){
                          echo $row['BAC'];
                        }
                      }
                      ?>