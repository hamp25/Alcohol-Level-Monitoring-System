<?php
$sql = "SELECT * FROM report_tbl DESC LIMIT 6";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) { 
	while($row = mysqli_fetch_array($result)) {
		    $s_id = $row['student_id'];
    $s_fname = $row['student_fname'];
    $s_lname = $row['student_lname'];
    $bac = $row['bac'];
    $date = $row['date_input'];

}
}
?>

