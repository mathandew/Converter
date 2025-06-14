<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $pers_number = $_POST['pers_number'];
    $buckle = $_POST['buckle'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $nic = $_POST['nic'];
    $city = $_POST['city'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gpf_interest_applied = $_POST['gpf_interest_applied'];
    $employment_status = $_POST['employment_status'];
    $serial_number = $_POST['serial_number'];
    $payroll_section = $_POST['payroll_section'];
    $month = $_POST['month'];
    $ntn = $_POST['ntn'];
    $gpf_number = $_POST['gpf_number'];
    $old_number = $_POST['old_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $lfp_quota = $_POST['lfp_quota'];
    $bank_name = $_POST['bank_name'];
    $bank_account_number = $_POST['bank_account_number'];
    $service_duration = $_POST['service_duration'];
    $basic_pay = $_POST['basic_pay'];
    $house_rent_allowance = $_POST['house_rent_allowance'];
    $conveyance_allowance = $_POST['conveyance_allowance'];
    $medical_allowance = $_POST['medical_allowance'];
    $health_professional_allowance = $_POST['health_professional_allowance'];
    $adhoc_relief_2023 = $_POST['adhoc_relief_2023'];
    $adhoc_relief_2024 = $_POST['adhoc_relief_2024'];
    $adhoc_relief_15_percent = $_POST['adhoc_relief_15_percent'];
    $differential_allowance = $_POST['differential_allowance'];
    $gross_pay = $_POST['gross_pay'];
    $total_payable = $_POST['total_payable'];

    $query = "INSERT INTO users 
    (name, pers_number, buckle, department, designation, nic, city, gpf_interest_applied, employment_status, serial_number, payroll_section, month, ntn, gpf_number, old_number, date_of_birth, lfp_quota, bank_name, bank_account_number, service_duration, basic_pay, house_rent_allowance, conveyance_allowance, medical_allowance, health_professional_allowance, adhoc_relief_2023, adhoc_relief_2024, adhoc_relief_15_percent, differential_allowance, gross_pay, total_payable) 
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "sssssssssssssssssssssssssssssss",
        $name,
        $pers_number,
        $buckle,
        $department,
        $designation,
        $nic,
        $city,
        $gpf_interest_applied,
        $employment_status,
        $serial_number,
        $payroll_section,
        $month,
        $ntn,
        $gpf_number,
        $old_number,
        $date_of_birth,
        $lfp_quota,
        $bank_name,
        $bank_account_number,
        $service_duration,
        $basic_pay,
        $house_rent_allowance,
        $conveyance_allowance,
        $medical_allowance,
        $health_professional_allowance,
        $adhoc_relief_2023,
        $adhoc_relief_2024,
        $adhoc_relief_15_percent,
        $differential_allowance,
        $gross_pay,
        $total_payable
    );

    if ($stmt->execute()) {
        echo "User added successfully";
    } else {
        echo "Error adding user: " . $stmt->error;
    }

}
?>