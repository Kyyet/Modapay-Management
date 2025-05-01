<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Inventory</title>
    <link rel="stylesheet" href="style/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <img src="https://via.placeholder.com/150x50" alt="ModaPay Logo">
            </div>

            <div class="datetime">
                <div id="current-date"></div>
                <span id="current-time"></span>
            </div>

            <div class="menu-title">Main Menu</div>

            <nav class="menu">
                <a href="dashboard.php" class="menu-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="iventory.php" class="menu-item active">
                    <i class="fas fa-box"></i>
                    <span>Inventory</span>
                </a>
                <a href="promo.php" class="menu-item">
                    <i class="fas fa-tag"></i>
                    <span>Promo</span>
                </a>
                <a href="employment.php" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Employment</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="top-header">
                <div class="top-header-left">
                    <div class="table-info">
                        <div class="table-title">Inventory</div>
                        <div class="table-detail">Inventory store detail</div>
                    </div>
                </div>
                
                <div class="header-actions">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search items">
                    </div>
                    <button class="icon-button">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="icon-button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </header>
            
            <!-- Categories -->
            <div class="featured-categories">
                <div class="featured-category primary">
                    <h3>Best Seller Product</h3>
                    <div class="category-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
                
                <div class="featured-category">
                    <span class="available-tag">Available</span>
                    <h3>T-Shirt</h3>
                    <div class="category-items">50 items</div>
                    <div class="category-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
                
                <div class="featured-category">
                    <span class="available-tag">Available</span>
                    <h3>Pants</h3>
                    <div class="category-items">23 items</div>
                    <div class="category-icon">
                        <i class="fas fa-socks"></i>
                    </div>
                </div>
                
                <div class="featured-category">
                    <span class="available-tag">Available</span>
                    <h3>T-Shirt</h3>
                    <div class="category-items">19 items</div>
                    <div class="category-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                </div>
            </div>
            
            <!-- Product -->
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="image/T-Shirt.jpg" alt="Grey T-Shirt">
                    </div>
                    <div class="product-name">Grey plain T-Shirt Tee</div>
                    <div class="product-price">
                        <div class="current-price">IDR 139.000</div>
                        <div class="original-price">IDR 159.000</div>
                    </div>
                    <div class="product-stock">Stock: 23</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Sweet Pants">
                    </div>
                    <div class="product-name">Sweet Pants Vintage</div>
                    <div class="product-price">
                        <div class="current-price">IDR 199.000</div>
                        <div class="original-price">IDR 229.000</div>
                    </div>
                    <div class="product-stock">Stock: 8</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Brown Floral Dress">
                    </div>
                    <div class="product-name">Brown Floral Dress</div>
                    <div class="product-price">
                        <div class="current-price">IDR 199.000</div>
                        <div class="original-price">IDR 259.000</div>
                    </div>
                    <div class="product-stock">Stock: 27</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Old Green T-Shirt">
                    </div>
                    <div class="product-name">Old Green T-Shirt Oversize</div>
                    <div class="product-price">
                        <div class="current-price">IDR 149.000</div>
                        <div class="original-price">IDR 179.000</div>
                    </div>
                    <div class="product-stock">Stock: 19</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 5 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Material Pants">
                    </div>
                    <div class="product-name">Material Pants Grey</div>
                    <div class="product-price">
                        <div class="current-price">IDR 189.000</div>
                        <div class="original-price">IDR 229.000</div>
                    </div>
                    <div class="product-stock">Stock: 34</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 6 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Black dress with pink skirt">
                    </div>
                    <div class="product-name">Black dress with pink skirt</div>
                    <div class="product-price">
                        <div class="current-price">IDR 289.000</div>
                        <div class="original-price">IDR 349.000</div>
                    </div>
                    <div class="product-stock">Stock: 45</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 7 -->
                <div class="product-card highlight-outline">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Black Dress">
                    </div>
                    <div class="product-name">Black Dress</div>
                    <div class="product-price">
                        <div class="current-price">IDR 349.000</div>
                        <div class="original-price">IDR 399.000</div>
                    </div>
                    <div class="product-stock">Stock: 21</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 8 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/150x150" alt="Black T-Shirt">
                    </div>
                    <div class="product-name">Black T-Shirt Regular</div>
                    <div class="product-price">
                        <div class="current-price">IDR 139.000</div>
                        <div class="original-price">IDR 159.000</div>
                    </div>
                    <div class="product-stock">Stock: 22</div>
                    <div class="product-actions">
                        <button class="action-button primary-action">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Timer
        function updateTime() {
            const now = new Date();

            const options = { day: '2-digit', month: 'short', year: 'numeric' };
            const dateString = now.toLocaleDateString('en-GB', options);
            const timeString = now.toLocaleTimeString('en-GB');

            document.getElementById('current-date').innerText = dateString;
            document.getElementById('current-time').innerText = timeString;
        }

        setInterval(updateTime, 1000);
        updateTime();

        // Menu activate
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(function(item) {
                const href = item.getAttribute('href');
                if (href === currentPath || currentPath.endsWith(href)) {
                    menuItems.forEach(function(menu) {
                        menu.classList.remove('active');
                    });
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>