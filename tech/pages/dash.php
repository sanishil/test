<?php
include "../api/connect.php";

$sql = "SELECT COUNT(*) AS total_teachers FROM teacher"; 
$result = $con->query($sql);
$total_teachers = 0;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_teachers = $row['total_teachers'];
}

$sql1 = "SELECT COUNT(*) AS total_dept FROM dept"; 
$result1 = $con->query($sql1); // Corrected from $sql to $sql1
$total_dept = 0;

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $total_dept = $row1['total_dept'];
}

$sql2 = "SELECT COUNT(*) AS total_std FROM student"; 
$result2 = $con->query($sql2); // Corrected from $sql to $sql1
$total_std = 0;

if ($result2->num_rows > 0) {
    $row1 = $result2->fetch_assoc();
    $total_std = $row1['total_std'];
}

$con->close();

?>
<div class="container-fluid">
    <div class="row" style="padding-top: 20px;">
       <div class="col-lg-4 mb-3">
          <div class="card shadow-sm bg-info" style="height: 200px; border-radius: 10px;">
             <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-users"></i> Total Register Students</h5>
                <h3 class=""><?php echo $total_std; ?></h3>
             </div>
          </div>
       </div>
       <div class="col-lg-4 mb-3">
          <div class="card shadow-sm bg-warning" style="height: 200px; border-radius: 10px;">
             <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-users-gear"></i> Total Teachers</h5>
                <h3 class=""><?php echo $total_teachers; ?></h3>
             </div>
          </div>
       </div>
       <div class="col-lg-4 mb-3">
          <div class="card shadow-sm bg-danger" style="height: 200px; border-radius: 10px;">
             <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-building"></i> Total Departments</h5>
                <h3 class=""><?php echo $total_dept; ?></h3>
             </div>
          </div>
       </div>
    </div>
    
 </div>