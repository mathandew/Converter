<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "registration_system";

$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($sql);
$conn->select_db($database);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    pers_number VARCHAR(20) UNIQUE NOT NULL,
    buckle VARCHAR(20) UNIQUE NOT NULL,
    department VARCHAR(255) NOT NULL,
    designation VARCHAR(255) NOT NULL,
    nic VARCHAR(20) UNIQUE NOT NULL,
    city VARCHAR(100) NOT NULL,
    password VARCHAR(255) DEFAULT NULL,
    gpf_interest_applied ENUM('Yes', 'No') DEFAULT 'No',
    employment_status VARCHAR(50) NOT NULL,
    serial_number INT,
    payroll_section VARCHAR(10),
    month VARCHAR(20),
    ntn VARCHAR(50) DEFAULT NULL,
    gpf_number VARCHAR(50) DEFAULT NULL,
    old_number VARCHAR(50) DEFAULT NULL,
    date_of_birth DATE NOT NULL,
    lfp_quota INT DEFAULT 0,
    bank_name VARCHAR(255),
    bank_account_number VARCHAR(50),
    service_duration VARCHAR(50),

    
    basic_pay DECIMAL(10,2),
    house_rent_allowance DECIMAL(10,2),
    conveyance_allowance DECIMAL(10,2),
    medical_allowance DECIMAL(10,2),
    health_professional_allowance DECIMAL(10,2),
    adhoc_relief_2023 DECIMAL(10,2),
    adhoc_relief_2024 DECIMAL(10,2),
    adhoc_relief_15_percent DECIMAL(10,2),
    differential_allowance DECIMAL(10,2),
    gross_pay DECIMAL(10,2),

    
    it_payable DECIMAL(10,2),
    tax DECIMAL(10,2),
    gpf_balance DECIMAL(10,2),
    subrc DECIMAL(10,2),
    benevolent_fund DECIMAL(10,2),
    group_insurance DECIMAL(10,2),
    total_deductions DECIMAL(10,2),

    
    total_payable DECIMAL(10,2)
)";
$conn->query($sql);


$admin_password = password_hash("admin", PASSWORD_DEFAULT);
$sql = "INSERT IGNORE INTO users (id, name, nic, city, department, password) VALUES
        (1, 'admin', 'admin', 'Admin City', 'Administration', '$admin_password')";
$conn->query($sql);

?>

