<?php
include("../includes/db.php");

// Total Products
$totalUsers = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM user"))['count'];
$total_pending = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM product_testing WHERE status='1'"))['count'];
$total_approved = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM product_testing WHERE status='2'"))['count'];
$total_rejected = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM product_testing WHERE status='3'"))['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - ElectroTest Instruments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Enhanced Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #343a40 0%, #212529 100%);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .sidebar:hover {
            box-shadow: 4px 0 25px rgba(0, 123, 255, 0.3);
        }

        .sidebar .nav-link {
            color: #adb5bd;
            padding: 12px 20px;
            border-radius: 0 15px 15px 0;
            margin: 5px 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .sidebar .nav-link:hover::before {
            left: 100%;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #495057, #007bff);
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .sidebar h5 {
            background: linear-gradient(135deg, #007bff, #0056b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            to {
                text-shadow: 0 0 20px rgba(0, 123, 255, 0.8);
            }
        }

        /* Main Content Enhancements */
        main {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .h2 {
            background: linear-gradient(135deg, #007bff, #0056b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Stats Cards Animations */
        .card {
            border: none;
            border-radius: 15px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #28a745, #ffc107, #fd7e14);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card.border-left-primary {
            border-left: 5px solid #007bff;
        }

        .card.border-left-success {
            border-left: 5px solid #28a745;
        }

        .card.border-left-info {
            border-left: 5px solid #17a2b8;
        }

        .card.border-left-warning {
            border-left: 5px solid #ffc107;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
        }

        .text-primary,
        .text-success,
        .text-info,
        .text-warning {
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .card:hover .text-primary {
            color: #0056b3;
        }

        .card:hover .text-success {
            color: #1e7e34;
        }

        .card:hover .text-info {
            color: #117a8b;
        }

        .card:hover .text-warning {
            color: #e0a800;
        }

        .h5 {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .fas.fa-2x {
            transition: transform 0.3s ease;
        }

        .card:hover .fas.fa-2x {
            transform: rotate(360deg) scale(1.1);
        }

        /* Table Enhancements */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table {
            margin-bottom: 0;
            background: white;
        }

        .table th {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            padding: 15px;
            font-weight: bold;
        }

        .table td {
            padding: 15px;
            transition: all 0.3s ease;
            border-color: rgba(0, 0, 0, 0.05);
        }

        .table tbody tr {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .table tbody tr:nth-child(1) {
            animation-delay: 0.1s;
        }

        .table tbody tr:nth-child(2) {
            animation-delay: 0.2s;
        }

        .table tbody tr:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table tbody tr:hover {
            background: linear-gradient(90deg, rgba(0, 123, 255, 0.1), transparent);
            transform: scale(1.01);
        }

        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: bold;
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-3px);
            }
        }

        .btn-sm {
            border-radius: 20px;
            padding: 6px 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 123, 255, 0.4);
        }

        /* Quick Actions */
        .d-grid .btn {
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-weight: bold;
        }

        .d-grid .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .d-grid .btn:hover::after {
            width: 300px;
            height: 300px;
        }

        .d-grid .btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            border: none;
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
            border: none;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            border: none;
            color: #212529;
        }

        /* Mobile Toggle Button */
        .btn-link i {
            transition: transform 0.3s ease;
        }

        .btn-link:hover i {
            transform: rotate(90deg);
        }

        /* General Enhancements */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .shadow {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        }

        .card-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: none;
            border-radius: 10px 10px 0 0;
        }

        .font-weight-bold {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar d-md-block collapse">
                <div class="position-sticky pt-3">
                    <h5 class="text-white px-3">Admin Panel</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="new_approvals.php">
                                <i class="fas fa-box me-2"></i> New Approvals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="message.php">
                                <i class="fas fa-file-invoice me-2"></i> Message
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">
                                <i class="fas fa-users me-2"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="successful_test.php">
                                <i class="fas fa-chart-bar me-2"></i> Successful Approvals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-cog me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <button class="btn btn-link d-md-none" type="button" data-bs-toggle="collapse"
                        data-bs-target=".sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $totalUsers; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-box fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">

                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Pending Products
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $total_pending; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Approved Products
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $total_approved; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-life-ring fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Rejected Products
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $total_rejected; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>