<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ElectroTest Instruments</title>
</head>
<body>
    <?php
     include ("includes/nav.php");    
    ?>


    <!-- Page Header -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                <h1 class="display-4" style="padding-top: 40px;">About Us</h1>
                    <p class="lead">Leading provider of electrical testing solutions since 2008</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Story -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Our Story</h2>
                    <p>Founded in 2008, ElectroTest Instruments has grown from a small startup to a trusted provider of electrical testing equipment for industries worldwide. Our mission is to deliver precision instruments that ensure safety, reliability, and efficiency in electrical systems.</p>
                    <p>With over 15 years of experience, we've built a reputation for quality products, exceptional customer service, and technical expertise that our clients rely on.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Our Team" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section-title">Certifications & Standards</h2>
                    <p>Our products meet the highest industry standards and certifications</p>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-md-3 mb-4">
                    <i class="fas fa-certificate fa-3x text-primary mb-3"></i>
                    <h5>ISO 9001:2015</h5>
                    <p>Quality Management System</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                    <h5>IEC 61010</h5>
                    <p>Safety Requirements</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-bolt fa-3x text-primary mb-3"></i>
                    <h5>CAT III / CAT IV</h5>
                    <p>Measurement Category Ratings</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="fas fa-globe fa-3x text-primary mb-3"></i>
                    <h5>CE Mark</h5>
                    <p>European Conformity</p>
                </div>
            </div>
        </div>
    </section>

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
    <!-- Footer (same as index.php) -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        // Contact form handling
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>