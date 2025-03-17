<?php 
include "../tech/api/connect.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Read and decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($data['op']) && $data['op'] == "insert") {
    
    // Escape input data to prevent SQL Injection
    $std_id = mysqli_real_escape_string($con, $data['std_id']);
    $tu_roll = mysqli_real_escape_string($con, $data['tu_roll']);
    $title = mysqli_real_escape_string($con, $data['title']);
    $name = mysqli_real_escape_string($con, $data['name']);
    $sem = mysqli_real_escape_string($con, $data['sem']);
    $std_dept = mysqli_real_escape_string($con, $data['std_dept']);
    $course = mysqli_real_escape_string($con, $data['course']);
    $subjects = mysqli_real_escape_string($con, $data['subjects']);
    $code = mysqli_real_escape_string($con, $data['code']);
    $page_type = mysqli_real_escape_string($con, $data['page_type']);
    $section = isset($data['section']) ? mysqli_real_escape_string($con, $data['section']) : ""; // Allow blank value
    $dos = mysqli_real_escape_string($con, $data['dos']);
    $f_dept = mysqli_real_escape_string($con, $data['f_dept']);
    $f_name = mysqli_real_escape_string($con, $data['f_name']);
    $f_designation = mysqli_real_escape_string($con, $data['f_designation']);

    // Check if all required fields are provided (excluding section)
    if (!empty($std_id) && !empty($tu_roll) && !empty($title) && !empty($name) && 
        !empty($sem) && !empty($std_dept) && !empty($course) && !empty($subjects) &&
        !empty($code) && !empty($page_type) && !empty($dos) &&
        !empty($f_dept) && !empty($f_name) && !empty($f_designation)) {
        
        // SQL Query to insert data into the students table
        $query = "INSERT INTO student (std_id, tu_roll, title, name, sem, std_dept, course, subjects, code, page_type, section, dos, f_dept, f_name, f_designation) 
                  VALUES ('$std_id', '$tu_roll', '$title', '$name', '$sem', '$std_dept', '$course', '$subjects', '$code', '$page_type', '$section', '$dos', '$f_dept', '$f_name', '$f_designation')";

        if (mysqli_query($con, $query)) {
            echo json_encode(["status" => "success", "message" => "Data added successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "SQL Error: " . mysqli_error($con)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "All required fields must be provided"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid Request"]);
}

mysqli_close($con);
?>
