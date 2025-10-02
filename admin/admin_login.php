<?php
@session_start();
include ("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Lab Automation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome for icons to make it more attractive -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Same Enhanced CSS for full attractiveness: Blue-white theme, animations, gradients (identical to user login) */
        :root {
            --primary-blue: #1a56db;
            --secondary-blue: #3b82f6;
            --accent-orange: #f59e0b;
            --dark-blue: #1e3a8a;
            --light-gray: #f8fafc;
            --medium-gray: #e2e8f0;
            --dark-gray: #4b5563;
            --white: #ffffff;
            --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 10px 25px rgba(0, 0, 0, 0.1);
            --shadow-heavy: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        body {
            background: linear-gradient(135deg, var(--light-gray) 0%, #e0e7ff 100%); /* Attractive blue-tinted gradient background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Navbar Enhancements: Make it always visible, no hiding on mobile, sticky top (applies to admin_nav.php) */
        .navbar {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)) !important;
            box-shadow: var(--shadow-medium);
            position: sticky !important;
            top: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--white) !important;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--accent-orange) !important;
            transform: scale(1.05);
        }

        .navbar-nav .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
            padding: 10px 15px !important;
        }

        .navbar-nav .nav-link:hover {
            color: var(--accent-orange) !important;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent-orange);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 80%;
        }

        /* Prevent navbar collapse/hiding on mobile: Always show links horizontally or stacked visibly */
        .navbar-collapse {
            display: block !important; /* Force always visible */
        }

        @media (max-width: 991.98px) {
            .navbar-collapse .navbar-nav {
                text-align: center;
                background: rgba(255, 255, 255, 0.1); /* Semi-transparent bg for mobile */
                border-radius: 10px;
                margin-top: 10px;
                padding: 10px;
            }

            .navbar-nav .nav-link {
                display: block;
                margin: 5px 0 !important;
                width: 100%;
            }

            /* Ensure no hiding: Override Bootstrap collapse */
            .navbar-toggler {
                display: none !important; /* Hide the toggle button entirely */
            }
        }

        /* Login Section - Full Attractive Design with Animations (Admin-themed) */
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeInBackground 1.5s ease-out;
        }

        @keyframes fadeInBackground {
            from {
                opacity: 0;
                background: var(--light-gray);
            }
            to {
                opacity: 1;
                background: linear-gradient(135deg, var(--light-gray) 0%, #e0e7ff 100%);
            }
        }

        .login-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow-heavy);
            border: none;
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            animation: cardSlideUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transition: all 0.3s ease;
            position: relative;
        }

        @keyframes cardSlideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(26, 86, 219, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: var(--white);
            text-align: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .login-card:hover .card-header::before {
            opacity: 1;
            animation: shine 1.5s ease-in-out;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .card-header i {
            font-size: 3rem;
            margin-bottom: 10px;
            opacity: 0.9;
            animation: iconPulse 2s infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            color: var(--dark-blue);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid var(--medium-gray);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            background: var(--white);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(26, 86, 219, 0.25);
            transform: scale(1.02);
            background: #f8faff; /* Light blue tint on focus */
        }

        .input-group-text {
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 10px 0 0 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-light);
            color: var(--white);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
            transform: translateY(-2px) scale(1.02);
            box-shadow: var(--shadow-medium);
        }

        /* Forgot Password Link (Optional attractive addition, no functionality change) */
        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--secondary-blue);
            text-decoration: underline;
        }

        /* Responsive Adjustments for Full Mobile Friendliness */
        @media (max-width: 576px) {
            .login-container {
                padding: 10px;
            }

            .login-card {
                margin: 10px;
                border-radius: 15px;
            }

            .card-body {
                padding: 20px;
            }

            .form-control {
                padding: 10px 12px;
                font-size: 0.95rem;
            }

            .btn-primary {
                padding: 10px 20px;
                font-size: 1rem;
            }

            .card-header h3 {
                font-size: 1.5rem;
            }

            .card-header i {
                font-size: 2.5rem;
            }

            /* Navbar on very small screens: Stack links vertically without hiding */
            .navbar-nav {
                flex-direction: column !important;
            }

            .navbar-nav .nav-link {
                margin: 2px 0 !important;
                padding: 8px 10px !important;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    <?php
       
    ?>

    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <i class="fas fa-user-shield"></i> <!-- Admin-specific icon -->
                <h3>Admin Login</h3>
                <p class="mb-0 opacity-75">Secure Access to Lab Automation Admin</p>
            </div>
            <div class="card-body">
                <form action="admin_login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">
                        <i class="fas fa-sign-in-alt me-2"></i>Admin Login
                    </button>
                </form>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $login_query = "SELECT * FROM admin WHERE email='$user_email' AND admin_pass='$user_password'";
        $run_login = mysqli_query($con, $login_query);
        $user_data = mysqli_fetch_assoc($run_login);
        
        if ($run_login && mysqli_num_rows($run_login) == 0) { // Fixed minor check for accuracy (no functional change)
            echo "<script>alert('Password and email not correct! Try again')</script>";
        } else {
            $_SESSION['email'] = $user_email;
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    ?>

</body>
</html>
