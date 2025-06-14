<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $pers_number = $_POST["pers_number"];
    $buckle = $_POST["buckle"];
    $department = $_POST["department"];
    $designation = $_POST["designation"];
    $nic = $_POST["nic"];
    $city = $_POST["city"];
    $employment_status = $_POST["employment_status"];
    $serial_number = $_POST["serial_number"];
    $payroll_section = $_POST["payroll_section"];
    $basic_pay = $_POST["basic_pay"];
    $house_rent_allowance = $_POST["house_rent_allowance"];

    $stmt = $conn->prepare("UPDATE users SET name=?, pers_number=?, buckle=?, department=?, designation=?, nic=?, city=?, employment_status=?, serial_number=?, payroll_section=?, basic_pay=?, house_rent_allowance=? WHERE id=?");
    $stmt->bind_param("ssssssssssssi", $name, $pers_number, $buckle, $department, $designation, $nic, $city, $employment_status, $serial_number, $payroll_section, $basic_pay, $house_rent_allowance, $id);
    
    if ($stmt->execute()) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user.";
    }

    $stmt->close();
    $conn->close();
}
?>
