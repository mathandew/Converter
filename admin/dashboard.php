<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user_name']; ?></span>
          </a><!-- End Profile Iamge Icon -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php if ($_SESSION['user_name'] === 'admin'): ?>
        <li class="nav-item">
          <button class="nav-link collapsed" id="openAddUserModal">
            <i class="bi bi-person"></i>
            <span>Add User</span>
          </button>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="view_users.php">
            <i class="bi bi-card-list"></i>
            <span>View Users</span>
          </a>
        </li>
      <?php endif; ?>




      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div id="addUserModal" style="display:none;">
          <form class="form-control p-4" id="addUserForm">
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Personal Number</label>
                <input class="form-control" type="text" name="pers_number" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Buckle</label>
                <input class="form-control" type="text" name="buckle" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Department</label>
                <input class="form-control" type="text" name="department" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Designation</label>
                <input class="form-control" type="text" name="designation" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">NIC</label>
                <input class="form-control" type="text" name="nic" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">City</label>
                <input class="form-control" type="text" name="city" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Employment Status</label>
                <input class="form-control" type="text" name="employment_status" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Serial Number</label>
                <input class="form-control" type="number" name="serial_number">
              </div>
              <div class="col-md-6">
                <label class="form-label">Payroll Section</label>
                <input class="form-control" type="text" name="payroll_section">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Month</label>
                <input class="form-control" type="text" name="month">
              </div>
              <div class="col-md-6">
                <label class="form-label">NTN</label>
                <input class="form-control" type="text" name="ntn">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">GPF Number</label>
                <input class="form-control" type="text" name="gpf_number">
              </div>
              <div class="col-md-6">
                <label class="form-label">Old Number</label>
                <input class="form-control" type="text" name="old_number">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Date of Birth</label>
                <input class="form-control" type="date" name="date_of_birth" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">LFP Quota</label>
                <input class="form-control" type="number" name="lfp_quota" value="0">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Bank Name</label>
                <input class="form-control" type="text" name="bank_name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Bank Account Number</label>
                <input class="form-control" type="text" name="bank_account_number">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Service Duration</label>
                <input class="form-control" type="text" name="service_duration">
              </div>
              <div class="col-md-6">
                <label class="form-label">GPF Interest Applied</label>
                <select class="form-control" name="gpf_interest_applied">
                  <option value="Yes">Yes</option>
                  <option value="No" selected>No</option>
                </select>
              </div>
            </div>

            <h5 class="text-primary mt-3">Salary and Allowances</h5>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Basic Pay</label>
                <input class="form-control" type="number" step="0.01" name="basic_pay">
              </div>
              <div class="col-md-6">
                <label class="form-label">House Rent Allowance</label>
                <input class="form-control" type="number" step="0.01" name="house_rent_allowance">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Conveyance Allowance</label>
                <input class="form-control" type="number" step="0.01" name="conveyance_allowance">
              </div>
              <div class="col-md-6">
                <label class="form-label">Medical Allowance</label>
                <input class="form-control" type="number" step="0.01" name="medical_allowance">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Washing Allowances</label>
                <input class="form-control" type="number" step="0.01" name="health_professional_allowance">
              </div>
              <div class="col-md-6">
                <label class="form-label">Adhoc Relief 2023</label>
                <input class="form-control" type="number" step="0.01" name="adhoc_relief_2023">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Adhoc Relief 2024</label>
                <input class="form-control" type="number" step="0.01" name="adhoc_relief_2024">
              </div>
              <div class="col-md-6">
                <label class="form-label">Adhoc Relief 15 Percent</label>
                <input class="form-control" type="number" step="0.01" name="adhoc_relief_15_percent">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Differential Allowance</label>
                <input class="form-control" type="number" step="0.01" name="differential_allowance">
              </div>
              <div class="col-md-6">
                <label class="form-label">Gross Pay</label>
                <input class="form-control" type="number" step="0.01" name="gross_pay">
              </div>
            </div>

            <h5 class="text-danger mt-3">Deductions</h5>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Income Tax Payable</label>
                <input class="form-control" type="number" step="0.01" name="it_payable">
              </div>
              <div class="col-md-6">
                <label class="form-label">Total Deductions</label>
                <input class="form-control" type="number" step="0.01" name="total_deductions">
              </div>
            </div>

            <h5 class="text-success mt-3">Final Pay</h5>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Total Payable</label>
                <input class="form-control" type="number" step="0.01" name="total_payable">
              </div>
            </div>

            <button class="btn btn-primary w-100" type="submit">Add User</button>
          </form>


        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>




  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function () {
      $("#openAddUserModal").click(function () {
        $("#addUserModal").show();
      });

      $("#addUserForm").submit(function (e) {
        e.preventDefault();
        $.ajax({
          url: "add_user_ajax.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (response) {
            alert(response);
            $("#addUserModal").hide();
            location.reload();
          }
        });
      });
    });
  </script>

</body>

</html>