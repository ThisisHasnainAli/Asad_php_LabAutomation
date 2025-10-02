<?php
include("includes/db.php");
session_start();
if ($_SESSION == null){
    echo "<script>alert('You have to login first '); window.location='user_login.php';</script>";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Product for Testing | ElectroTest Instruments</title>
</head>
<body>
  <!-- Navbar -->
  <?php include("includes/nav.php"); ?>

  <!-- Product Testing Form Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center" style="padding-top: 80px;">
        <div class="col-lg-8">
          <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
              <h3 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Product Testing Form</h3>
            </div>
            <div class="card-body p-4">
              <!-- yahan enctype="multipart/form-data" zaroori hai file upload ke liye -->
              <form action="product_testing.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label class="form-label fw-bold">Product Name</label>
                  <input type="text" class="form-control form-control-lg" name="product_name" placeholder="Enter product name">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold">Product Code</label>
                  <input type="text" class="form-control form-control-lg" name="product_code" placeholder="Enter product code">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold">Manufacturing Number</label>
                  <input type="text" class="form-control form-control-lg" name="manufacture_num" placeholder="Enter manufacturing number">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold">Other Details</label>
                  <textarea class="form-control form-control-lg" name="details" rows="3" placeholder="Enter additional product details"></textarea>
                </div>

                <!-- yahan naya field: Product Image -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Upload Product Image</label>
                  <input type="file" class="form-control form-control-lg" name="product_image" accept="image/*">
                </div>

                <!-- yahan naya field: CPRI Documentation -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Upload CPRI Documentation</label>
                  <input type="file" class="form-control form-control-lg" name="cpri_doc" accept=".pdf,.doc,.docx">
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-primary btn-lg" name="insert_product">
                    <i class="fas fa-paper-plane me-2"></i>Submit for Testing
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Info Card -->
          <div class="alert alert-info mt-4 shadow-sm rounded-3">
            <i class="fas fa-info-circle me-2"></i>
            After submission, our testing team will review your product and update the status in <a href="testing_details.php" class="alert-link">Testing Details</a>.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include("includes/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['insert_product'])){
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $manufacture_num = $_POST['manufacture_num'];
    $details = $_POST['details'];
    $status = 1;
    $user_id = $_SESSION['user_id'];

    // image file
    $image_name = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];
    $image_path = "uploads/images/" . $image_name;

    // cpri doc file
    $doc_name = $_FILES['cpri_doc']['name'];
    $doc_tmp = $_FILES['cpri_doc']['tmp_name'];
    $doc_path = "uploads/docs/" . $doc_name;

    if ($product_name == '' OR $product_code == '' OR $manufacture_num == '' OR $details == '' OR $image_name == '' OR $doc_name == '') {
        echo "<script>alert('Please input values for all fields!');</script>";
        exit();
    }

    // move uploaded files
    move_uploaded_file($image_tmp, $image_path);
    move_uploaded_file($doc_tmp, $doc_path);

    $insert_product = "INSERT INTO product_testing 
        (user_id, product_name, product_code, manufacture_num, details, product_image, cpri_doc, status) 
        VALUES ('$user_id','$product_name', '$product_code', '$manufacture_num', '$details', '$image_path', '$doc_path', '$status')";
    
    $run_product = mysqli_query($con, $insert_product);
    if($run_product){
        echo "<script>alert('Product Added Successfully');</script>";
        echo "<script>window.open('product_testing.php','_self')</script>";
    } else {
        echo "<script>alert('Product Not Added Successfully');</script>";
    }
}
?>
