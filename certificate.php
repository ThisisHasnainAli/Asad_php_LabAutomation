<?php
include("includes/db.php");
session_start();

if (!isset($_GET['product_id'])) {
    echo "Invalid access";
    exit();
}

$product_id = $_GET['product_id'];
$res = mysqli_query($con, "SELECT * FROM product_testing WHERE product_id='$product_id'");
$row = mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Approval</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    body {
      background: #eaeaea;
      font-family: 'Times New Roman', serif;
    }

    .certificate-container {
      /* background: #fff url('https://i.ibb.co/4m8pbWk/certificate-bg.png') center no-repeat; */
      background-size: cover;
      border: 15px solid #d4af37;
      border-radius: 20px;
      padding: 60px;
      margin: 40px auto;
      width: 80%;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      animation: fadeIn 1.5s ease-in-out;
      position: relative;
    }

    .certificate-header {
      text-align: center;
      color: #d4af37;
      font-size: 3rem;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 3px;
      animation: zoomIn 1.2s ease;
    }

    .certificate-subheader {
      text-align: center;
      font-size: 1.3rem;
      margin-bottom: 20px;
      color: #555;
      animation: fadeInUp 1.8s ease;
    }

    .certificate-body {
      text-align: center;
      font-size: 1.2rem;
      color: #222;
      margin-top: 30px;
      animation: fadeIn 2s ease;
    }

    .certificate-body h3 {
      color: #0d6efd;
      font-weight: bold;
      font-size: 1.6rem;
      text-transform: uppercase;
    }

    .approval-text {
      color: green;
      font-weight: bold;
      font-size: 1.3rem;
    }

    .certificate-footer {
      margin-top: 60px;
      text-align: center;
    }

    .signature {
      margin-top: 50px;
      border-top: 2px solid #000;
      width: 250px;
      margin-left: auto;
      margin-right: auto;
      padding-top: 8px;
      font-weight: bold;
    }

    .print-btn {
      display: inline-block;
      margin-top: 40px;
      border-radius: 30px;
      padding: 10px 25px;
      font-size: 1.1rem;
      animation: pulse 2s infinite;
    }

    /* Watermark */
    .watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.07;
      font-size: 8rem;
      font-weight: bold;
      color: #d4af37;
      pointer-events: none;
      user-select: none;
    }

    /* Animations */
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    @keyframes zoomIn {
      from {transform: scale(0.6); opacity: 0;}
      to {transform: scale(1); opacity: 1;}
    }
    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }
    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(13,110,253,0.6); }
      70% { box-shadow: 0 0 0 15px rgba(13,110,253,0); }
      100% { box-shadow: 0 0 0 0 rgba(13,110,253,0); }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="certificate-container">
      <div class="watermark">APPROVED</div>

      <i data-feather="award" width="70" height="70" class="d-block mx-auto text-warning mb-3"></i>
      <h1 class="certificate-header">Certificate of Approval</h1>
      <p class="certificate-subheader">This certifies the successful testing and approval of the product</p>

      <div class="certificate-body">
        <h3><?php echo $row['product_name']; ?> (<?php echo $row['product_code']; ?>)</h3>
        <p><strong>Manufacturing No:</strong> <?php echo $row['manufacture_num']; ?></p>
        <p class="approval-text">✅ Has successfully passed the testing and is APPROVED</p>
      </div>

      <div class="certificate-footer">
        <div class="signature">Authorized Signatory</div>
        <p class="mt-3">Date: <?php echo date("d-m-Y"); ?></p>
      </div>

      <div class="text-center">
        <button onclick="window.print()" class="btn btn-primary print-btn">
          <i data-feather="printer"></i> Print Certificate
        </button>
      </div>
    </div>
  </div>

  <script>
    feather.replace();
  </script>
</body>
</html>
