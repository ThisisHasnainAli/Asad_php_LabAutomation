<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroTest Instruments - Professional Electrical Testing Equipment</title>
</head>
<body>
<?php
     include ("includes/nav.php");    
    ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Precision Electrical Testing Instruments</h1>
                    <p class="lead mb-4">Professional-grade tools for accurate measurements, safety compliance, and reliable performance in demanding industrial environments.</p>
                    <div class="d-flex gap-3">
                        <a href="products.php" class="btn btn-primary btn-lg">Shop Products</a>
                        <a href="#contact" class="btn btn-outline-light btn-lg">Get Quote</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="imges.png" 
                         alt="Electrical Testing Equipment" class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col text-center">
                    <h2 class="section-title">Featured Products</h2>
                    <p class="section-subtitle">Industry-leading instruments trusted by professionals worldwide</p>
                </div>
            </div>
            
            <div class="row" id="featured-products">
                <!-- Products will be loaded via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col text-center">
                    <h2 class="section-title">Product Categories</h2>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="category-card text-center p-4">
                        <i class="fas fa-tachometer-alt fa-3x mb-3"></i>
                        <h4>Multimeters</h4>
                        <p>Digital and analog multimeters for precise electrical measurements</p>
                        <a href="products.php?category=multimeters" class="btn btn-sm btn-outline-primary">Explore</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-card text-center p-4">
                        <i class="fas fa-plug fa-3x mb-3"></i>
                        <h4>Insulation Testers</h4>
                        <p>High-voltage testers for insulation resistance and dielectric strength</p>
                        <a href="products.php?category=insulation-testers" class="btn btn-sm btn-outline-primary">Explore</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-card text-center p-4">
                        <i class="fas fa-bolt fa-3x mb-3"></i>
                        <h4>Clamp Meters</h4>
                        <p>Current measurement without breaking the circuit</p>
                        <a href="products.php?category=clamp-meters" class="btn btn-sm btn-outline-primary">Explore</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-card text-center p-4">
                        <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                        <h4>Cable Fault Locators</h4>
                        <p>Precise identification of faults in underground cables</p>
                        <a href="products.php?category=cable-fault-locators" class="btn btn-sm btn-outline-primary">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Indicators -->
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <h3 class="counter" data-target="15000">0</h3>
                    <p>Products Sold</p>
                </div>
                <div class="col-md-3">
                    <h3 class="counter" data-target="2500">0</h3>
                    <p>Happy Customers</p>
                </div>
                <div class="col-md-3">
                    <h3 class="counter" data-target="15">0</h3>
                    <p>Years Experience</p>
                </div>
                <div class="col-md-3">
                    <h3 class="counter" data-target="50">0</h3>
                    <p>Countries Served</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>ElectroTest Instruments</h5>
                    <p>Providing high-quality electrical testing equipment since 2008. Trusted by industry professionals worldwide.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="solutions.php">Solutions</a></li>
                        <li><a href="support.php">Support</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="Register.php">Register</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Industrial Park, Tech City</li>
                        <li><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope me-2"></i> info@electrotest.com</li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Newsletter</h5>
                    <p>Subscribe to get updates on new products and industry insights.</p>
                    <form id="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 ElectroTest Instruments. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>