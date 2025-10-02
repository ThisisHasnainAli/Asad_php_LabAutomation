<?php
include("includes/db.php");
session_start();
if ($_SESSION == null){
    echo "<script>alert('You have to login first'); window.location='user_login.php';</script>";
    exit(); 
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Update logic
if(isset($_POST['update_profile'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$user_id'";
    if(mysqli_query($con, $update)){
        echo "<script>alert('Profile Updated Successfully'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile | ElectroTest Instruments</title>
</head>
<body>
  <!-- Navbar -->
  <?php include("includes/nav.php"); ?>

  <!-- Profile Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3">
              <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i>User Profile</h3>
            </div>
            <div class="card-body p-4">
              <form method="POST" action="profile.php">
                <div class="mb-3">
                  <label class="form-label fw-bold">Full Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Address</label>
                  <textarea class="form-control" name="address" rows="3"><?php echo $user['address']; ?></textarea>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary" name="update_profile">
                    <i class="fas fa-save me-2"></i>Update Profile
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Info -->
          <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i> You can update your personal details anytime from here.
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include("includes/footer.php"); ?>
</body>
</html>
