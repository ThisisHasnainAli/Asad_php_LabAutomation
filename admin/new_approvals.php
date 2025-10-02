<?php 
include ('db.php');
@session_start();
if ($_SESSION == null){
  echo "<script> window.location='admin_login.php';</script>";
  exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Approvals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
     
     include("dashboard_nav.php");
         ?>

<div class="container mt-5">
  <h2 class="mb-4">Products Pending Approval</h2>

  <?php
  // fetch only pending products
  $select_product = "SELECT * FROM product_testing WHERE status = '1'";
  $run_product = mysqli_query($con, $select_product);
  ?>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Code</th>
        <th>Manufacturing Number</th>
        <th>Image</th>
        <th>CPRI Doc</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($run_product)) { 
          $product_id = $row['product_id'];
          $product_name = $row['product_name'];
          $product_code = $row['product_code'];
          $manufacture_num = $row['manufacture_num'];
          $status = $row['status'];
          $product_image = $row['product_image'];
          $cpri_doc = $row['cpri_doc'];
      ?>
      <tr>
        <td><?php echo $product_id; ?></td>
        <td><?php echo $product_name; ?></td>
        <td><?php echo $product_code; ?></td>
        <td><?php echo $manufacture_num; ?></td>
        <td>
          <?php if($product_image != '') { ?>
            <img src="<?php echo $product_image; ?>" alt="Product Image" width="80">
          <?php } ?>
        </td>
        <td>
          <?php if($cpri_doc != '') { ?>
            <a href="<?php echo $cpri_doc; ?>" target="_blank" class="btn btn-sm btn-info">View Doc</a>
          <?php } ?>
        </td>
        <td>
          <?php
          echo ($status == 1 ? 'Pending' : ($status == 2 ? 'Testing Success' : ($status == 3 ? 'Testing Failed' : $status)));
          ?>
        </td>
        <td>
          <a href="update_status.php?product_id=<?php echo $product_id; ?>&status=2" class="btn btn-success btn-sm">Approve</a>
          <a href="update_status.php?product_id=<?php echo $product_id; ?>&status=3" class="btn btn-danger btn-sm">Reject</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
