<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - ElectroTest Instruments</title>
</head>
<body>
<?php
     include ("includes/nav.php");    
    ?>
    <!-- Page Header -->
    <section class="py-5 bg-primary text-white" style="margin-top:70px">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-4">Our Products</h1>
                    <p class="lead">Comprehensive range of electrical testing instruments for all your needs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Filters -->
    <section class="py-4 bg-light sticky-top" style="top: 76px; z-index: 1020;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="mb-0">Filter by Category:</h5>
                </div>
                <div class="col-md-8">
                    <div class="d-flex flex-wrap gap-2" id="product-filters">
                        <button class="btn btn-outline-primary filter-btn active" data-filter="all">All Products</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="multimeters">Multimeters</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="insulation-testers">Insulation Testers</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="clamp-meters">Clamp Meters</button>
                        <button class="btn btn-outline-primary filter-btn" data-filter="cable-fault-locators">Cable Fault Locators</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row" id="products-grid">
                <!-- Products will be loaded via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Footer (same as index.php) -->
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
    <script>
        // Load all products on products page
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('products-grid')) {
                loadAllProducts();
            }
        });

        function loadAllProducts() {
            const productsGrid = document.getElementById('products-grid');
            
            products.forEach(product => {
                const productCard = createProductCard(product);
                productsGrid.innerHTML += productCard;
            });
            
            // Add data-category attribute to each card for filtering
            document.querySelectorAll('.product-card').forEach(card => {
                const productId = parseInt(card.querySelector('button').getAttribute('onclick').match(/\d+/)[0]);
                const product = products.find(p => p.id === productId);
                if (product) {
                    card.setAttribute('data-category', product.category);
                }
            });
        }
    </script>
</body>
</html>