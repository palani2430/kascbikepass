<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "finaldb";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all fields are set
if (
    isset($_POST['student_name'], $_POST['reg_no'], $_POST['vehicle_no'],
          $_POST['vehicle_type'], $_POST['dl_no'], $_POST['rc_book_no'])
) {
    $studentName = $_POST['student_name'];
    $regNo = $_POST['reg_no'];
    $vehicleNo = $_POST['vehicle_no'];
    $vehicleType = $_POST['vehicle_type'];
    $dlNo = $_POST['dl_no'];
    $rcBookNo = $_POST['rc_book_no'];

    // Insert into database
    $sql = "INSERT INTO vehicle_passes (student_name, reg_no, vehicle_no, vehicle_type, dl_no, rc_book_no)
            VALUES ('$studentName', '$regNo', '$vehicleNo', '$vehicleType', '$dlNo', '$rcBookNo')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='text-align:center; color:green;'>✅ Form submitted successfully!</h2>";
    } else {
        echo "<h2 style='text-align:center; color:red;'>❌ Error:</h2><p>" . $conn->error . "</p>";
    }
} else {
    echo "<h2 style='text-align:center; color:red;'>❌ Missing value in the form submission!</h2>";
}

$conn->close();
?>
