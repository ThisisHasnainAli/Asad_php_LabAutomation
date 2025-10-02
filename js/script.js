// Product data
const products = [
    {
        id: 1,
        name: "Digital Multimeter Pro",
        category: "multimeters",
        price: 299,
        image: "https://images.unsplash.com/photo-1581094794329-c8112a89af24?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "True RMS, 1000V AC/DC, Auto-ranging",
        featured: true
    },
    {
        id: 2,
        name: "Insulation Resistance Tester",
        category: "insulation-testers",
        price: 899,
        image: "https://images.unsplash.com/photo-1581094792967-cb7c3ab8c715?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "Up to 10kV, PI/DAR measurements",
        featured: true
    },
    {
        id: 3,
        name: "AC/DC Clamp Meter",
        category: "clamp-meters",
        price: 459,
        image: "https://images.unsplash.com/photo-1581094794329-c8112a89af24?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "1000A AC/DC, True RMS, Inrush current",
        featured: true
    },
    {
        id: 4,
        name: "Cable Fault Locator",
        category: "cable-fault-locators",
        price: 2499,
        image: "https://images.unsplash.com/photo-1581094792967-cb7c3ab8c715?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "TDR method, Up to 20km range",
        featured: true
    },
    {
        id: 5,
        name: "Portable Multimeter",
        category: "multimeters",
        price: 159,
        image: "https://images.unsplash.com/photo-1581094794329-c8112a89af24?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "Basic functions, CAT III 600V",
        featured: false
    },
    {
        id: 6,
        name: "High Voltage Insulation Tester",
        category: "insulation-testers",
        price: 1299,
        image: "https://images.unsplash.com/photo-1581094792967-cb7c3ab8c715?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        specs: "Up to 15kV, Programmable tests",
        featured: false
    }
];

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Load featured products on homepage
    if (document.getElementById('featured-products')) {
        loadFeaturedProducts();
    }
    
    // Initialize counters
    if (document.querySelector('.counter')) {
        initCounters();
    }
    
    // Newsletter form submission
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', handleNewsletterSubmit);
    }
    
    // Product filter functionality
    if (document.getElementById('product-filters')) {
        initProductFilters();
    }
});

// Load featured products
function loadFeaturedProducts() {
    const featuredContainer = document.getElementById('featured-products');
    const featuredProducts = products.filter(product => product.featured);
    
    featuredProducts.forEach(product => {
        const productCard = createProductCard(product);
        featuredContainer.innerHTML += productCard;
    });
}

// Create product card HTML
function createProductCard(product) {
    return `
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="product-card">
                <img src="${product.image}" alt="${product.name}" class="product-image">
                <div class="product-card-body">
                    <h5 class="product-title">${product.name}</h5>
                    <p class="product-specs">${product.specs}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$${product.price}</span>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2" onclick="viewProduct(${product.id})">Details</button>
                            <button class="btn btn-sm btn-primary" onclick="addToQuote(${product.id})">Quote</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

// Initialize animated counters
function initCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.innerText = Math.ceil(current);
                setTimeout(updateCounter, 20);
            } else {
                counter.innerText = target;
            }
        };
        
        // Start counter when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(counter);
    });
}

// Handle newsletter subscription
function handleNewsletterSubmit(e) {
    e.preventDefault();
    const email = e.target.querySelector('input[type="email"]').value;
    
    // In a real application, you would send this to a server
    alert(`Thank you for subscribing with ${email}! You'll receive our updates soon.`);
    e.target.reset();
}

// View product details
function viewProduct(productId) {
    const product = products.find(p => p.id === productId);
    if (product) {
        // In a real application, this would navigate to a product detail page
        alert(`Viewing details for: ${product.name}`);
    }
}

// Add product to quote
function addToQuote(productId) {
    const product = products.find(p => p.id === productId);
    if (product) {
        // In a real application, this would add to a quote cart
        showToast(`${product.name} added to quote request`);
    }
}

// Show toast notification
function showToast(message) {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = 'toast align-items-center text-white bg-primary border-0 position-fixed';
    toast.style.zIndex = '9999';
    toast.style.top = '20px';
    toast.style.right = '20px';
    
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Initialize and show toast
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();
    
    // Remove toast from DOM after it's hidden
    toast.addEventListener('hidden.bs.toast', () => {
        document.body.removeChild(toast);
    });
}

// Initialize product filters
function initProductFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter products
            const category = this.getAttribute('data-filter');
            filterProducts(category);
        });
    });
}

// Filter products by category
function filterProducts(category) {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}