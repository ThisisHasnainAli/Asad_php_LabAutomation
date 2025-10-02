<?php
include("includes/db.php");
session_start();
if ($_SESSION == null){
    echo "<script>alert('You have to login first'); window.location='user_login.php';</script>";
    exit(); 
}
$user_id = $_SESSION['user_id'];

$result = mysqli_query($con, "SELECT * FROM notifications WHERE user_id='$user_id' ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notifications</title>
  <style>
    body {
      background: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .notification-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      margin-bottom: 15px;
      transition: 0.3s ease-in-out;
    }
    .notification-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    }
    .notification-header {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 20px;
      margin-top: 130px;
      color: #333;
      text-align: center;
    }
    .btn-primary {
      border-radius: 30px;
      padding: 6px 15px;
    }
    .icon {
      margin-right: 10px;
      color: #0d6efd;
    }
    .empty-state {
      text-align: center;
      margin-top: 50px;
      color: #888;
    }
    .empty-state i {
      font-size: 60px;
      color: #ddd;
    }
  </style>
</head>
<body>
  <?php
  include ("includes/nav.php");
  ?>
  <div class="container mt-5">
    <h2 class="notification-header"><i data-feather="bell"></i> Your Notifications</h2>

    <?php if(mysqli_num_rows($result) > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card notification-card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <i data-feather="bell" class="icon"></i>
              <?php echo $row['message']; ?>
              <br>
              <small class="text-muted">📅 <?php echo date("d M, Y h:i A", strtotime($row['created_at'])); ?></small>
            </div>
            <?php if (strpos($row['message'], 'APPROVED') !== false) { ?>
              <a href="certificate.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-sm btn-primary">
                <i data-feather="download"></i> Download
              </a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="empty-state">
        <i data-feather="inbox"></i>
        <p>No notifications yet.</p>
      </div>
    <?php } ?>
  </div>

  <script>
    feather.replace();
  </script>
</body>
</html>
