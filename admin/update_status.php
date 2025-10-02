<?php
include('db.php');
session_start();

if (!isset($_GET['product_id']) || !isset($_GET['status'])) {
    header("Location: new_approval.php");
    exit();
}

$product_id = $_GET['product_id'];
$status = $_GET['status'];

// update product status
$update = "UPDATE product_testing SET status='$status' WHERE product_id='$product_id'";
$run_update = mysqli_query($con, $update);

// get user_id to send notification
$get_user = mysqli_query($con, "SELECT user_id, product_name FROM product_testing WHERE product_id='$product_id'");
$row = mysqli_fetch_assoc($get_user);
$user_id = $row['user_id'];
$product_name = $row['product_name'];

// message banani hai
if ($status == 2) {
    $msg = "Your product '$product_name' has been APPROVED. Download your certificate.";
} else {
    $msg = "Your product '$product_name' has been REJECTED.";
}

// escape karein taake quotes ki wajah se SQL error na aaye
$msg = mysqli_real_escape_string($con, $msg);

mysqli_query($con, "INSERT INTO notifications (user_id, product_id, message) VALUES ('$user_id','$product_id','$msg')");

echo "<script>alert('Status updated successfully'); window.location='new_approvals.php';</script>";
?>
