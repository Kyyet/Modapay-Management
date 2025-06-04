<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModaPay - Inventory</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/modaliventory.css">
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
                <a href="recentOrder.php" class="menu-item">
                    <i class="fas fa-receipt"></i>
                    <span>Recent Order</span>
                </a>
                <a href="financial.php" class="menu-item">
                    <i class="fas fa-chart-line"></i> 
                    <span>Financial Statements</span>
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
                <div class="product-card highlight-outline">
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
                        <button class="action-button primary-action detail-btn" data-id="67342HGJ32" data-name="Grey Plain T-Shirt Tee" data-price="139000" data-original="159000" data-stock="23" data-image="image/T-Shirt.jpg">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="78945KLM21" data-name="Sweet Pants Vintage" data-price="199000" data-original="229000" data-stock="8" data-image="https://via.placeholder.com/150x150">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="32145BFD98" data-name="Brown Floral Dress" data-price="199000" data-original="259000" data-stock="27" data-image="https://via.placeholder.com/150x150">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="56743OGT45" data-name="Old Green T-Shirt Oversize" data-price="149000" data-original="179000" data-stock="19" data-image="https://via.placeholder.com/150x150">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="90876MPG12" data-name="Material Pants Grey" data-price="189000" data-original="229000" data-stock="34" data-image="https://via.placeholder.com/150x150">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="23456BPS78" data-name="Black dress with pink skirt" data-price="289000" data-original="349000" data-stock="45" data-image="https://via.placeholder.com/150x150">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
                
                <!-- Product 7 -->
                <div class="product-card">
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
                        <button class="action-button primary-action detail-btn" data-id="12378BDR34" data-name="Black Dress" data-price="349000" data-original="399000" data-stock="21" data-image="https://via.placeholder.com/150x150">Detail Product</button>
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
                        <button class="action-button primary-action detail-btn" data-id="45632BTS90" data-name="Black T-Shirt Regular" data-price="139000" data-original="159000" data-stock="22" data-image="https://via.placeholder.com/150x150">Detail Product</button>
                        <button class="action-button secondary-action">Edit</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal-overlay" id="productDetailModal">
        <div class="modal-container">
            <button class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="modal-body">
                <div class="modal-product-image">
                    <img id="modalProductImage" src="image/T-Shirt.jpg" alt="Product Image">
                </div>
                
                <div class="modal-product-info">
                    <!-- Product name and ID moved above price -->
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalProductName">Grey Plain T-Shirt Tee</h2>
                        <div class="product-id" id="modalProductId">ID Product: 67342HGJ32</div>
                    </div>
                    
                    <!-- Only showing current price, original price removed -->
                    <div class="modal-price">
                        <div class="modal-current-price" id="modalCurrentPrice">IDR 139.000</div>
                    </div>
                    
                    <div class="modal-stock">
                        <div class="stock-label">Available Stock</div>
                        <div class="size-options">
                            <div class="size-option active" data-stock="12">M</div>
                            <div class="size-option" data-stock="20">L</div>
                            <div class="size-option" data-stock="17">XL</div>
                        </div>
                        <div id="modalStockCount">Stock: 12</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product Edit Modal -->
    <div class="modal-overlay" id="productEditModal">
        <div class="modal-container">
            <button class="modal-close" id="closeEditModal">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="edit-form-container">
                <div class="product-image-container">
                    <div class="upload-image-box">
                        <img id="editModalProductImage" src="image/T-Shirt.jpg" alt="Product Image">
                        <div class="camera-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
                
                <div class="product-form">
                    <form id="editProductForm">
                        <div class="form-group">
                            <label for="editProductName">Produk Name</label>
                            <input type="text" id="editProductName" name="productName" class="form-control" value="Grey Plain T-Shirt Tee">
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductId">ID Product</label>
                            <input type="text" id="editProductId" name="productId" class="form-control" value="67342HGJ32" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductPrice">Harga Product</label>
                            <div class="price-input-wrapper">
                                <span class="currency-prefix">IDR</span>
                                <input type="number" id="editProductPrice" name="productPrice" class="form-control" value="139000">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Stock</label>
                            <div class="size-stock-grid">
                                <div class="size-item">
                                    <label for="stockS">S :</label>
                                    <input type="number" id="stockS" name="stockS" class="form-control size-input" min="0" value="5">
                                </div>
                                <div class="size-item">
                                    <label for="stockM">M :</label>
                                    <input type="number" id="stockM" name="stockM" class="form-control size-input" min="0" value="12">
                                </div>
                                <div class="size-item">
                                    <label for="stockL">L :</label>
                                    <input type="number" id="stockL" name="stockL" class="form-control size-input" min="0" value="20">
                                </div>
                                <div class="size-item">
                                    <label for="stockXL">XL :</label>
                                    <input type="number" id="stockXL" name="stockXL" class="form-control size-input" min="0" value="17">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="editProductCategory">Category</label>
                            <div class="select-container">
                                <select id="editProductCategory" name="productCategory" class="form-control">
                                    <option value="Men T-Shirt" selected>Men T-Shirt</option>
                                    <option value="Women T-Shirt">Women T-Shirt</option>
                                    <option value="Pants">Pants</option>
                                    <option value="Dress">Dress</option>
                                </select>
                                <div class="select-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn-done" id="btnSaveProduct">Done</button>
                    </form>
                </div>
            </div>
        </div>
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

        // Format price with thousand separator
        function formatPrice(price) {
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Open the detail modal
        function openDetailModal(productData) {
            const defaultProduct = {
                name: "Grey Plain T-Shirt Tee",
                id: "67342HGJ32",
                price: 139000,
                stock: 23,
                image: "image/T-Shirt.jpg"
            };

            const product = productData || defaultProduct;

            // Update modal content
            document.getElementById('modalProductName').textContent = product.name;
            document.getElementById('modalProductId').textContent = 'ID Product: ' + product.id;
            document.getElementById('modalCurrentPrice').textContent = 'IDR ' + formatPrice(product.price);
            
            const activeSizeOption = document.querySelector('.size-option.active');
            if (activeSizeOption) {
                document.getElementById('modalStockCount').textContent = 'Stock: ' + activeSizeOption.dataset.stock;
            } else {
                document.getElementById('modalStockCount').textContent = 'Stock: ' + product.stock;
            }
            
            document.getElementById('modalProductImage').src = product.image;
            document.getElementById('modalProductImage').alt = product.name;
            
            // Show modal
            const modal = document.getElementById('productDetailModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Close the detail modal
        function closeDetailModal() {
            const modal = document.getElementById('productDetailModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; // Enable scrolling again
        }

        // Open the edit modal
        function openEditModal(productData) {
            const defaultProduct = {
                name: "Grey Plain T-Shirt Tee",
                id: "67342HGJ32",
                price: 139000,
                stockS: 5,
                stockM: 12, 
                stockL: 20,
                stockXL: 17,
                category: "Men T-Shirt",
                image: "image/T-Shirt.jpg"
            };

            const product = productData || defaultProduct;

            document.getElementById('editProductName').value = product.name;
            document.getElementById('editProductId').value = product.id;
            document.getElementById('editProductPrice').value = product.price;
            document.getElementById('stockS').value = product.stockS;
            document.getElementById('stockM').value = product.stockM;
            document.getElementById('stockL').value = product.stockL;
            document.getElementById('stockXL').value = product.stockXL;
            document.getElementById('editProductCategory').value = product.category;
            document.getElementById('editModalProductImage').src = product.image;
            document.getElementById('editModalProductImage').alt = product.name;

            // Show modal
            const modal = document.getElementById('productEditModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Function to close the edit modal
        function closeEditModal() {
            const modal = document.getElementById('productEditModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; // Enable scrolling again
        }

        // Initialize event listeners when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Update time immediately and set interval
            updateTime();
            setInterval(updateTime, 1000);
            
            // Menu activation
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
            
            // Detail Modal Event Listeners
            const detailCloseBtn = document.getElementById('closeModal');
            if (detailCloseBtn) {
                detailCloseBtn.addEventListener('click', closeDetailModal);
            }

            const detailModal = document.getElementById('productDetailModal');
            if (detailModal) {
                detailModal.addEventListener('click', function(e) {
                    if (e.target === detailModal) {
                        closeDetailModal();
                    }
                });
            }

            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    
                    this.classList.add('active');
                    
                    const stockCount = this.dataset.stock;
                    document.getElementById('modalStockCount').textContent = 'Stock: ' + stockCount;
                });
            });

            const detailBtns = document.querySelectorAll('.detail-btn');
            detailBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const productData = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        price: parseInt(this.dataset.price),
                        stock: parseInt(this.dataset.stock),
                        image: this.dataset.image
                    };
                    openDetailModal(productData);
                });
            });

            // Edit Modal Event Listeners
            const editCloseBtn = document.getElementById('closeEditModal');
            if (editCloseBtn) {
                editCloseBtn.addEventListener('click', closeEditModal);
            }

            const saveBtn = document.getElementById('btnSaveProduct');
            if (saveBtn) {
                saveBtn.addEventListener('click', function() {
                    
                    alert('Product updated successfully!');
                    closeEditModal();
                });
            }

            const editModal = document.getElementById('productEditModal');
            if (editModal) {
                editModal.addEventListener('click', function(e) {
                    if (e.target === editModal) {
                        closeEditModal();
                    }
                });
            }

            const cameraOverlay = document.querySelector('.camera-overlay');
            if (cameraOverlay) {
                cameraOverlay.addEventListener('click', function() {
                    
                    alert('Image upload functionality would be implemented here');
                });
            }

            const editButtons = document.querySelectorAll('.action-button.secondary-action');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    
                    const productCard = this.closest('.product-card');
                    const detailBtn = productCard.querySelector('.detail-btn');
                    
                    const productData = {
                        id: detailBtn.dataset.id,
                        name: detailBtn.dataset.name,
                        price: parseInt(detailBtn.dataset.price),
                        stockS: 5, 
                        stockM: 12,
                        stockL: 20,
                        stockXL: 17,
                        category: "Men T-Shirt", 
                        image: detailBtn.dataset.image
                    };
                    
                    openEditModal(productData);
                });
            });
        });
   </script>
</body>
</html>